<?php
$lang = get_bloginfo('language');
$url = "https://via.eviivo.com/$lang/Puychene11120"
?>
<div class="resa-container" >
    <span class="glyphicon glyphicon-remove" id="resa-container-close"></span>
    <form name="formPicker" id="formPicker"
          action="<?=$url ?>"
          method="get" target="_blank">

     <input type="hidden" name="language" id="idLanguage" value="<?= getCurrentLang() ?>">


        <table border="0" cellpadding="3" cellspacing="3" align="center">
            <tbody>
                <tr>
                    <td id="resaMessageTd" align="center" colspan="2"></td>
                </tr>
                <tr>
                    <td height="20" width="150"><?php _e('Arrivee', 'bigpicture'); ?>:</td>
                    <td width="200">
                        <input style="width: 93.1818182468414px; background-color: white;"
                               type="text" readonly="" size="13"
                               id="tsdate" name="startDate"
                               onclick="displayDatePicker('startDate', false, 'dmy', '/');" >
                        
                    </td>
                </tr>
                <tr>
                    <td height="20" width="150"><?php _e('Arrivee', 'bigpicture'); ?>:</td>
                    <td width="200">
                        <input style="width: 93.1818182468414px; background-color: white;"
                               type="text" readonly="" size="13"
                               id="tedate" name="endDate"
                               onclick="displayDatePicker('endDate', false, 'dmy', '/');" >

                    </td>
                </tr>
<!--                <tr>-->
<!--                    <td>--><?php //_e('Nuits', 'bigpicture'); ?><!--:</td>-->
<!---->
<!---->
<!--                    <td>-->
<!--                        <select id="nbNight" name="nb_nuit">-->
<?php
//for ($i = 1; $i <= 30; $i++) {
//    echo '<option value="' . $i . '">' . $i . '</option>';
//}
//?>
<!--                        </select>-->
<!--                    </td>-->
<!---->
<!---->
<!---->
<!---->
<!--                </tr>-->
                <tr>
                    <td><?php _e('Nb personne', 'bigpicture'); ?>:</td>
                    <td>
                        <select id="nbPerson" name="adults1">
<?php
for ($i = 1; $i <= 10; $i++) {
    echo '<option value="' . $i . '">' . $i . '</option>';
}
?>
                        </select>
                    </td>
                </tr>
                <tr >
                    <td align="center" colspan="2"> <input id=""  type="submit" value="<?php _e('Reserver', 'bigpicture'); ?>"></td>
                </tr >
          
            </tbody></table>
    </form>
</div>
