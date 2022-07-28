<?php 

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};


function timeago($date) {
    $timestamp = strtotime($date);       
    
    $strTime = array("segundo", "minuto", "hora", "dia", "mes", "año");
    $length = array("60","60","24","30","12","10");

    $currentTime = time();
    if($currentTime >= $timestamp) {
                 $diff     = time()- $timestamp;
                 for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                 $diff = $diff / $length[$i];
                 }

                 $diff = round($diff);
                 return "hace " . $diff . " " . $strTime[$i] . "(s)";
    }
 }


?>