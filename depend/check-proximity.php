<?php
require "includes/dbcon.php";
require "model/AchievementModel.php";

$lat = $_POST['lat'];
$long = $_POST['long'];
    //Retrieve data from database
    $achievementModel = new AchievementModel(readDatabase());

    //Format data for display (eventModel.getCompleteEventArchive()
    $gpsAchievements = $achievementModel->scanProximity();
    //echo $rowNum = $unlockedAchievementList->fetchColumn();

    foreach($gpsAchievements as $row){
        $vec1 = pow(($row['trigger_latitude'] - $lat ),2);
        echo "Vec1" . $vec1 . "<br>";
        $vec2 = pow(($row['trigger_longitude'] - $long),2);
        echo "Vec2" . $vec2;

        $result = sqrt(($vec1 + $vec2));
        echo "The Result Is: " + $result;
        if($result <= 0.50){
          //echo "I FOUND SOMETHING!";

          $testUserId = 1;
          //echo $row['user_id'];
          echo "achievement id: " . $row['ach_id'];
        if(!empty($_POST)){
          $achievementModel->unlockAchievement($testUserId, ($row['ach_id']));
          echo "Achievement unlocked!";
        }
                                               
        }
    }
?>
