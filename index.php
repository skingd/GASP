<?php
    require "depend/includes/header.php";
    require "depend/includes/nav.php";
    require "depend/includes/dbcon.php";
    require "depend/model/AchievementModel.php";

    $user_id = 1;
    //Retrieve data from database
    $achievementModel = new AchievementModel(readDatabase());

    //Format data for display (eventModel.getCompleteEventArchive()
    $unlockedAchievementList = $achievementModel->getUnlockedAchievements($user_id);
    //echo $rowNum = $unlockedAchievementList->fetchColumn();
    
    require "depend/view/home.php";
    //require "depend/api/havenondemand/tests/test1.php";
    require "depend/includes/footer.php";
?>
