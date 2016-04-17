<div id="home" class="container">
<?php


    print('<ul>');
    foreach($lockedAchievementList as $row){
        include "achievement-view.php";
    }
    print('</ul>');
    
    print('<ul>');
    foreach($unlockedAchievementList as $row){
        include "achievement-view.php";
    }
    print('</ul>');

?>
</div>
