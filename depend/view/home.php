<div id="home" class="container">
<?php
    //sql call
    //$result = new AchievementModel(readDatabase())

    //$achievementArray = $result->getAchievements();

    //example achievements (pre-model example)
    $result = array('potato',
                    'apple',
                    'banana',
                    'horse',
                    'Canada',
                    'Java',
                    'PHP',
                    'sleep',
                    'happy',
                    'can',
                    'force');

    print('<ul>');
    foreach($result as $row){
        include "achievement.php";
    }
    print('</ul>');

?>
</div>
