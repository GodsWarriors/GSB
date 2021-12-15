<?php
function MoisLettres($NumMois) {
    $leMois="";
    switch($NumMois) {
        case 1:
            $leMois="Janvier";
        case 2:
            $leMois="Février";
        case 3:
            $leMois="Mars"; 
        case 4:
             $leMois="Avril";
        case 5:
             $leMois="Mai";
        case 6:
             $leMois="Juin";
        case 7:
             $leMois="Juillet";
        case 8:
             $leMois="Août";
        case 9:
             $leMois="Septembre";
        case 10:
             $leMois="Octobre";
        case 11:
             $leMois="Novembre";
        case 12:
             $leMois="Décembre";
    }  
    return $leMois;  

    
}
?>