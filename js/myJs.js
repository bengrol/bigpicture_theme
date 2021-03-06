$(function() {
    
    /* variables */
    var classExpanded = "col-md-offset-1 col-md-10 expanded";
    var classCollapsed = "col-md-offset-3 col-md-8 collapsed";
    var  site_content = $('.site-content');

    /* options pour toogle */
    var optResa =  {
        anim : "drop",
        direction : "up",
        speed : 500
    };
    var optMenu =  {
        anim : "blind",
        direction : "up",
        speed : "easeOutExpo"
    };
    var $widthSrceen =   $(window).width();
    var heightScreen = $(window).height();
    /* end variables */

    /* functions */
    
    // toogle fonction avec les options
    function toogleElement(el, opt){
        $(el).toggle(opt.anim,  {direction: opt.direction}, opt.speed );
    }
    /**
     *  retourne la date du jour
     * @returns {String}
     */
    function getCurrentDate(offset){

        var date = new Date();
        //
        // var d = date.getDate();
        // var day = (d < 10) ? '0' + d : d;
        // var m = date.getMonth() + 1;
        // var month = (m < 10) ? '0' + m : m;
        // var yy = date.getYear();
        // var year = (yy < 1000) ? yy + 1900 : yy;
        // var currDate = day + "." + month + "." + year;
        // return currDate;
        if(offset){

            date.setDate(date.getDate() +offset);
            return date.toLocaleDateString();
        }
        return date.toLocaleDateString();
    }

    function adapteScreen(){
        $widthSrceen =   $(window).width();
        allImages = $('#primary').find('img');
        $.each(allImages, function(index, el){
            $(el).css('width', $widthSrceen+15);
        });
    };
    function rotateEl(el){
        if($(el).hasClass('icone-rotate')){
            $(el).removeClass('icone-rotate');
        }else{
            $(el).addClass('icone-rotate');
        }
    };
    
    function removeIfram(){
        $('iframe.visite360').remove();
    }
    
    function collapseElement($self, $state){
        var menuIsExpanded = site_content.hasClass('expanded');
        if($widthSrceen<1150){
            classCollapsed = "col-md-offset-4 col-md-8 collapsed";
        }
        if($state === true ){
            if($self.hasClass('boxpulse')){
                $self.removeClass('boxpulse');
            }
            if($widthSrceen>1000 &&  menuIsExpanded ){
                site_content
                  .removeClass(classExpanded)
                  .addClass(classCollapsed, optMenu.speed);
              }
        }else{
            if(!$self.hasClass('boxpulse')){
                $self.addClass('boxpulse');
            }
            if($widthSrceen>1000 ){
                site_content
                  .addClass(classExpanded, optMenu.speed)
                  .removeClass(classCollapsed);
            }
        }           
    }

    /* End Functions */
    
    
    /* loader de la page */
    $('#loaderDiv').detach();
    
    /* animation header page des chambres & evenements ... */
    $( ".header-colipsable" ).on('click' , function(){
    var animationSpeed = 800;
    var $header = $(this);
    var $overlay = $header.children('.overlay');
    var $sectionCollipsable = $header.siblings('.sec-chambre');
    var state = $header.attr('data-state');

    if (state === 'active') {
      $header.attr('data-state' , 'inactive');
      $overlay.animate({
        opacity: 0.5,
        backgroundColor: 'rgb(0,0,0)'
       }, animationSpeed );

    }else{

       let main_fonce_bigpicture = "#4a3834";
       let vert_fonce_bigpicture =  "#7a8852";
       let rouge_pr_bigpicture = "#9d4924";
      
      $header.attr('data-state' , 'active');
      $overlay.animate({
        opacity: 1,
        backgroundColor: vert_fonce_bigpicture
      }, animationSpeed );
    };

    $sectionCollipsable.slideToggle( animationSpeed);

  });
  
    $(".resa-toogle").click(function(){
        toogleElement('.resa-container', optResa);
    });

    $('#resa-container-close').on('click', function (){
        toogleElement('.resa-container', optResa);
    });
  
    /* menu toogle */
    $('#menu-header').on('click', function(){
       toogleElement('#main-nav-container', optMenu);
       collapseElement($(this), $(this).hasClass('boxpulse'));

        rotateEl('span.glyphicon.glyphicon-chevron-up');

    });

    $('#tsdate').val(getCurrentDate());
    $('#tedate').val(getCurrentDate(3));

    $(window).on('resize', function(){
        adapteScreen();
    });
    
    adapteScreen();



    $('#content').css('min-height',  heightScreen*50/100);
    
    $('.visite360HD').on('click', function(){
       
        var $url =  $(this).attr('data-url');
        $(this)
                .append('<span id="closeIframe"><i class="fa fa-times  fa-3x"></i></span>')
                .append('<iframe align="top" scrolling="no"  class="wrapper visite360" src='+$url+'  name="" id="blockrandom">No Iframes</iframe>')
                //.append('</div>')
                ;

    });

    $('#closeIframe').on('click', function(event){
            removeIfram(); 
            return false;
    });

    $('.tripadvisor').siblings('div').css('display', 'none');
  
    $('.tripadvisor-container').on('click', function (){
        var $trip = $('.tripadvisor').siblings('div');    
        toogleElement($trip, optResa);
    });


    var displayContent =  $('.site-content.container').css("display");
    
    if(displayContent === 'block'){ // si le contenu est deployé 
        site_content.removeClass(classCollapsed).addClass(classExpanded);
        
        // verifier que le menu clignote 
        var menu = $('#menu-header');
        if( !menu.hasClass('boxpulse') ){
            menu.addClass('boxpulse');
        }
    
    }else{

    }

});
