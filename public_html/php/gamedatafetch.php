<?php

    $gamePage = file_get_contents("http://www.shlstuff.wtgbear.com/RegSeason/S".$_GET['s']."/SHL-".$_GET['g'].".html");

    $team1 = explode('<title>', $gamePage);
    $team1 = explode('</title>', $team1['1']);
    $team1 = explode(' - ', $team1['0']);
    $team1 = explode(' vs ', $team1['2']);
    $team2 = $team1['1'];
    $team1 = $team1['0'];

    $goalsTotal1 = explode('"STHSGame_GoalsTotal">', $gamePage);
    $goalsTotal2 = explode('</td>', $goalsTotal1['2']);
    $goalsTotal2 = $goalsTotal2['0'];
    $goalsTotal1 = explode('</td>', $goalsTotal1['1']);
    $goalsTotal1 = $goalsTotal1['0'];

    $firstPeriodGoals = explode('GoalPeriod1">', $gamePage);
    $firstPeriodGoals = explode('</div>', $firstPeriodGoals['1']);
    $firstPeriodGoals = explode('<br />', $firstPeriodGoals['0']);
    array_pop($firstPeriodGoals);

    $secondPeriodGoals = explode('GoalPeriod2">', $gamePage);
    $secondPeriodGoals = explode('</div>', $secondPeriodGoals['1']);
    $secondPeriodGoals = explode('<br />', $secondPeriodGoals['0']);
    array_pop($secondPeriodGoals);

    $thirdPeriodGoals = explode('GoalPeriod3">', $gamePage);
    $thirdPeriodGoals = explode('</div>', $thirdPeriodGoals['1']);
    $thirdPeriodGoals = explode('<br />', $thirdPeriodGoals['0']);
    array_pop($thirdPeriodGoals);

    $j = 0;
    $k = 0;
    $team1GoalsFirst[0] = "None";
    while ($j < count($firstPeriodGoals)){
        if (strpos($firstPeriodGoals[$j], $team1) !== false){
            $team1GoalsFirst[$k] = $firstPeriodGoals[$j];
            $k++;
        }
        $j++;
    }

    $j = 0;
    $k = 0;
    $team1GoalsSecond[0] = "None";
    while ($j < count($secondPeriodGoals)){
        if (strpos($secondPeriodGoals[$j], $team1) !== false){
            $team1GoalsSecond[$k] = $secondPeriodGoals[$j];
            $k++;
        }
        $j++;
    }

    $j = 0;
    $k = 0;
    $team1GoalsThird[0] = "None";
    while ($j < count($thirdPeriodGoals)){
        if (strpos($thirdPeriodGoals[$j], $team1) !== false){
            $team1GoalsThird[$k] = $thirdPeriodGoals[$j];
            $k++;
        }
        $j++;
    }

    $j = 0;
    $k = 0;
    $team2GoalsFirst[0] = "None";
    while ($j < count($firstPeriodGoals)){
        if (strpos($firstPeriodGoals[$j], $team2) !== false){
            $team2GoalsFirst[$k] = $firstPeriodGoals[$j];
            $k++;
        }
        $j++;
    }

    $j = 0;
    $k = 0;
    $team2GoalsSecond[0] = "None";
    while ($j < count($secondPeriodGoals)){
        if (strpos($secondPeriodGoals[$j], $team2) !== false){
            $team2GoalsSecond[$k] = $secondPeriodGoals[$j];
            $k++;
        }
        $j++;
    }

    $j = 0;
    $k = 0;
    $team2GoalsThird[0] = "None";
    while ($j < count($thirdPeriodGoals)){
        if (strpos($thirdPeriodGoals[$j], $team2) !== false){
            $team2GoalsThird[$k] = $thirdPeriodGoals[$j];
            $k++;
        }
        $j++;
    }

    $goalie1 = explode('GoalerStats">', $gamePage);
    $goalie1 = explode('<br />', $goalie1['1']);
    $goalie1 = explode(', ', $goalie1['0']);
    $goalie1['0'] = explode(' (', $goalie1['0']);
    $goalie1['0'] = str_replace(') ','0',$goalie1['0']['0']);

    $goalie2 = explode('GoalerStats">', $gamePage);
    $goalie2 = explode('<br />', $goalie2['2']);
    $goalie2 = explode(', ', $goalie2['0']);
    $goalie2['0'] = explode(' (', $goalie2['0']);
    $goalie2['0'] = str_replace(') ','0',$goalie2['0']['0']);
?>