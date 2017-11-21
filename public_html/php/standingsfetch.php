<?php

    if($_GET['s']) {
        $standingsPage = file_get_contents("http://www.shlstuff.wtgbear.com/RegSeason/S".$_GET['s']."/SHL-ProStanding.html");
        
        $pageArray = explode('<h2 class="STHSStanding_H2Header">', $standingsPage);
        
        $standingsWest = explode('<tbody>', $pageArray[3]);
        $standingsEast = explode('<tbody>', $pageArray[4]);
        
        $standingsWest = explode('</tbody>', $standingsWest[1]);
        $standingsEast = explode('</tbody>', $standingsEast[1]);
        
        $standingsWest = explode('<tr>', $standingsWest[0]);
        $standingsEast = explode('<tr>', $standingsEast[0]);
        
        $west1 = $standingsWest[1];
        $west2 = $standingsWest[2];
        $west3 = $standingsWest[3];
        $west4 = $standingsWest[4];
        $west5 = $standingsWest[5];
        $west6 = $standingsWest[6];
        $west7 = $standingsWest[7];
        
        $west1 = explode('<td>', $west1);
        $west2 = explode('<td>', $west2);
        $west3 = explode('<td>', $west3);
        $west4 = explode('<td>', $west4);
        $west5 = explode('<td>', $west5);
        $west6 = explode('<td>', $west6);
        $west7 = explode('<td>', $west7);
        
        $east1 = $standingsEast[1];
        $east2 = $standingsEast[2];
        $east3 = $standingsEast[3];
        $east4 = $standingsEast[4];
        $east5 = $standingsEast[5];
        $east6 = $standingsEast[6];
        $east7 = $standingsEast[7];
        
        $east1 = explode('<td>', $east1);
        $east2 = explode('<td>', $east2);
        $east3 = explode('<td>', $east3);
        $east4 = explode('<td>', $east4);
        $east5 = explode('<td>', $east5);
        $east6 = explode('<td>', $east6);
        $east7 = explode('<td>', $east7);
        
        echo "<div class='conference-title'>Western Conference</div>";
        echo "<div class='column-container'><table class='standings' cellspacing='0'><thead><th colspan = '2'>Teams</th></thead>
        <tr><td>".$west1[2]."</tr>
        <tr><td>".$west2[2]."</tr>
        <tr><td>".$west3[2]."</tr>
        <tr><td class='elim'>".$west4[2]."</tr>
        <tr><td>".$west5[2]."</tr>
        <tr><td>".$west6[2]."</tr>
        <tr><td>".$west7[2]."</tr>
        </table></div>";
        
        echo "<div class='table-container'><table class='standings' cellspacing='0'>
        <thead>
        <th>GP</th>
        <th>W</th>
        <th>L</th>
        <th>OL</th>
        <th>PTS</th>
        <th>ROW</th>
        <th>GF</th>
        <th>GA</th>
        <th>DIFF</th>
        <th>HOME</th>
        <th>AWAY</th>
        <th>L10</th>
        <th>STRK</th>
        </thead>";
        for ($i = 1; $i <= 7; $i++){
            if ($i == 1){
                $index = $west1;
            } else if ($i == 2)  {
                $index = $west2;
            } else if ($i == 3)  {
                $index = $west3;
            } else if ($i == 4)  {
                $index = $west4;
            } else if ($i == 5)  {
                $index = $west5;
            } else if ($i == 6)  {
                $index = $west6;
            } else if ($i == 7)  {
                $index = $west7;
            }
            
            if($i == 4){
            echo "<tr>
                <td class='elim'>".$index[3]."
                <td class='elim'>".$index[4]."
                <td class='elim'>".$index[5]."
                <td class='elim'>".$index[6]."
                <td class='elim'>".$index[7]."
                <td class='elim'>".$index[8]."
                <td class='elim'>".$index[9]."
                <td class='elim'>".$index[10]."
                <td class='elim'>";
                if ($index[11] > 0) {
                    echo "<span class= 'positive'>".$index[11]."</span>";
                } else if ($index[11] < 0) {
                    echo "<span class='negative'>".$index[11]."</span>";
                } else {
                echo $index[11];
                }
                echo "<td class='elim'>".$index[13]."
                <td class='elim'>".$index[14]."
                <td class='elim'>".$index[15]."
                <td class='elim'>".$index[18]."</tr>";
            } else{
            echo "<tr>
                <td>".$index[3]."
                <td>".$index[4]."
                <td>".$index[5]."
                <td>".$index[6]."
                <td>".$index[7]."
                <td>".$index[8]."
                <td>".$index[9]."
                <td>".$index[10]."
                <td>";
                if ($index[11] > 0) {
                    echo "<span class= 'positive'>".$index[11]."</span>";
                } else if ($index[11] < 0) {
                    echo "<span class='negative'>".$index[11]."</span>";
                } else {
                echo $index[11];
                }
                echo "<td>".$index[13]."
                <td>".$index[14]."
                <td>".$index[15]."
                <td>".$index[18]."</tr>";
            }
        }
        echo "</table></div>";
                
        echo "<div class='conference-title'>Eastern Conference</div>";
        echo "<div class='column-container'><table class='standings' cellspacing='0'><thead><th colspan = '2'>Teams</th></thead>
        <tr><td>".$east1[2]."</tr>
        <tr><td>".$east2[2]."</tr>
        <tr><td>".$east3[2]."</tr>
        <tr><td class='elim'>".$east4[2]."</tr>
        <tr><td>".$east5[2]."</tr>
        <tr><td>".$east6[2]."</tr>
        <tr><td>".$east7[2]."</tr>
        </table></div>";
        
        echo "<div class='table-container'><table class='standings' cellspacing='0'>
        <thead>
        <th>GP</th>
        <th>W</th>
        <th>L</th>
        <th>OL</th>
        <th>PTS</th>
        <th>ROW</th>
        <th>GF</th>
        <th>GA</th>
        <th>DIFF</th>
        <th>HOME</th>
        <th>AWAY</th>
        <th>L10</th>
        <th>STRK</th>
        </thead>";
        for ($i = 1; $i <= 7; $i++){
            if ($i == 1){
                $index = $east1;
            } else if ($i == 2)  {
                $index = $east2;
            } else if ($i == 3)  {
                $index = $east3;
            } else if ($i == 4)  {
                $index = $east4;
            } else if ($i == 5)  {
                $index = $east5;
            } else if ($i == 6)  {
                $index = $east6;
            } else if ($i == 7)  {
                $index = $east7;
            }
            if($i == 4){
            echo "<tr>
                <td class='elim'>".$index[3]."
                <td class='elim'>".$index[4]."
                <td class='elim'>".$index[5]."
                <td class='elim'>".$index[6]."
                <td class='elim'>".$index[7]."
                <td class='elim'>".$index[8]."
                <td class='elim'>".$index[9]."
                <td class='elim'>".$index[10]."
                <td class='elim'>";
                if ($index[11] > 0) {
                    echo "<span class= 'positive'>".$index[11]."</span>";
                } else if ($index[11] < 0) {
                    echo "<span class='negative'>".$index[11]."</span>";
                } else {
                echo $index[11];
                }
                echo "<td class='elim'>".$index[13]."
                <td class='elim'>".$index[14]."
                <td class='elim'>".$index[15]."
                <td class='elim'>".$index[18]."</tr>";
            } else{
            echo "<tr>
                <td>".$index[3]."
                <td>".$index[4]."
                <td>".$index[5]."
                <td>".$index[6]."
                <td>".$index[7]."
                <td>".$index[8]."
                <td>".$index[9]."
                <td>".$index[10]."
                <td>";
                if ($index[11] > 0) {
                    echo "<span class= 'positive'>".$index[11]."</span>";
                } else if ($index[11] < 0) {
                    echo "<span class='negative'>".$index[11]."</span>";
                } else {
                echo $index[11];
                }
                echo "<td>".$index[13]."
                <td>".$index[14]."
                <td>".$index[15]."
                <td>".$index[18]."</tr>";
            }
        }
        echo "</table></div>";
    }

?>