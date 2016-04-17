<?php
    //sql call
    $result = array();
    $result['a']['1'] = "a";
    $result['a']['2'] = "b";
    $result['a']['3'] = "c";

    $result['b']['1'] = "a";
    $result['b']['2'] = "b";
    $result['b']['3'] = "c";
    
    $result['c']['1'] = "a";
    $result['c']['2'] = "b";
    $result['c']['3'] = "c";

    foreach($result as $row){
        include "achievement.php";
    }
?>