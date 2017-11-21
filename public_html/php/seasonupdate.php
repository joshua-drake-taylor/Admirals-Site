<?php
        
    $seasonScoring = file_get_contents("http://www.shlstuff.wtgbear.com/RegSeason/S".$_GET['s']."/SHL-ProTeamScoring.html");

    $seasonScoring = explode('</thead>', $seasonScoring);

    $statTable1 = $seasonScoring[25];
    $statTable2 = $seasonScoring[26];
    $goalieTable = $seasonScoring[27];

    $goalieTable = explode('<tbody>', $goalieTable);
    $goalieTable = $goalieTable[0];

    $goalieTable = str_replace('<tr>', '', $goalieTable);
    $goalieTable = str_replace('</tr>', '', $goalieTable);
    $goalieTable = str_replace('<td>', ' ', $goalieTable);
    $goalieTable = str_replace('</td>', '', $goalieTable);
    $goalieTable = str_replace('<b>', '', $goalieTable);
    $goalieTable = str_replace('</b>', '', $goalieTable);
    $goalieTable = str_replace('  ', ' ', $goalieTable);
    $goalieTable = explode(' ', $goalieTable);

    array_shift($goalieTable);


    while(strlen($goalieTable[0])){
        $i=0;
        $j=0;
        $individual = array();

        while (strlen($goalieTable[$i]) > 1) {
            $i++;
        }

        while($j < 21+$i) {
            array_push($individual, array_shift($goalieTable));
            $j++;
        }

        if (strlen($individual[0]) > 2){

            $link = mysqli_connect("xxxxxxx", "xxxxxxx","xxxxxxx","xxxxxxx");

            if(mysqli_connect_error()) {

                echo "There was an error connecting to the database.";

            }
            

            $season = $_GET['s'];
            //if ($i == 2){
                $goalie = $individual[0];
                $gp = $individual[2];
                $w = $individual[3];
                $l = $individual[4];
                $otl = $individual[5];
                $svp = $individual[6];
                $gaa = $individual[7];
                $mp = $individual[8];
                $so = $individual [10];
                $ga = $individual[11];
                $sa = $individual[12];
                $a = $individual[14];
                $pim = $individual[9];
                $en = $individual[15];
                $ps = round(str_replace('%', '', $individual[16]) / 100 * $individual[17]);
                $pa = $individual[17];
                $st = $individual[18];
                $bu = $individual[19];
                $s1 = $individual[20];
                $s2 = $individual[21];
                $s3 = $individual[22];
            /*} else {
                $goalie = $individual[0];
                $gp = $individual[3];
                $w = $individual[4];
                $l = $individual[5];
                $otl = $individual[6];
                $svp = $individual[7];
                $gaa = $individual[8];
                $mp = $individual[9];
                $so = $individual [11];
                $ga = $individual[12];
                $sa = $individual[13];
                $a = $individual[15];
                $pim = $individual[10];
                $en = $individual[16];
                $ps = round(str_replace('%', '', $individual[17]) / 100 * $individual[18]);
                $pa = $individual[18];
                $st = $individual[19];
                $bu = $individual[20];
                $s1 = $individual[21];
                $s2 = $individual[22];
                $s3 = $individual[23];
            }*/
            
            $query = "UPDATE `goalies`
                SET `gp`='$gp', `w`='$w',`l`='$l', `otl`='$otl', `svp`='$svp', `gaa`='$gaa', `mp`='$mp', `so`='$so', `ga`='$ga', `sa`='$sa', `a`='$a', `pim`='$pim', `en`='$en', `ps`='$ps', `pa`='$pa', `st`='$st', `bu`='$bu', `s1`='$s1', `s2`='$s2', `s3`='$s3'
                WHERE fName='$goalie' AND season='$season'";
            
            mysqli_query($link, $query);
            
        }
    }


    $statTable2 = str_replace('</table><table class="basictablesorter STHSScoring_GoaliesTable"><thead><tr><th class="STHSW200">Goalie Name</th><th class="STHSW25">GP</th><th class="STHSW25">W</th><th class="STHSW25">L</th><th class="STHSW25">OTL</th><th class="STHSW50">PCT</th><th class="STHSW50">GAA</th><th class="STHSW50">MP</th><th class="STHSW25">PIM</th><th class="STHSW25">SO</th><th class="STHSW25">GA</th><th class="STHSW45">SA</th><th class="STHSW45">SAR</th><th class="STHSW25">A</th><th class="STHSW25">EG</th><th class="STHSW50">PS %</th><th class="STHSW25">PSA</th><th class="STHSW25">ST</th><th class="STHSW25">BG</th><th class="STHSW25">S1</th><th class="STHSW25">S2</th><th class="STHSW25">S3</th></tr>','', $statTable2);
    $statTable2 = str_replace('<tr>', '', $statTable2);
    $statTable2 = str_replace('</tr>', '', $statTable2);
    $statTable2 = str_replace('<td>', ' ', $statTable2);
    $statTable2 = str_replace('</td>', '', $statTable2);
    $statTable2 = str_replace('<b>', '', $statTable2);
    $statTable2 = str_replace('</b>', '', $statTable2);
    $statTable2 = str_replace('  ', ' ', $statTable2);
    $statTable2 = explode(' ', $statTable2);

    array_shift($statTable2);

    while(strlen($statTable2[0])){
        $i=0;
        $j=0;
        $individual = array();

        while (strlen($statTable2[$i]) > 1) {
            $i++;
        }

        while($j < 22+$i) {
            array_push($individual, array_shift($statTable2));
            $j++;
        }

        if (strlen($individual[0]) > 2){

            $link = mysqli_connect("xxxxxxx", "xxxxxxx","xxxxxxx","xxxxxxx");
            
            if(mysqli_connect_error()) {

                echo "There was an error connecting to the database.";

            }

            $season = $_GET['s'];
            if ($i == 2){
                $skater = $individual[0];
                $gW = $individual[3];
                $gT = $individual[4];
                $foW = round(str_replace('%', '', $individual[5]) / 100 * $individual[6]);
                $foT = $individual[6];
                $eN = $individual[9];
                $ht = $individual[10];
                $psG = $individual[12];
                $psS = $individual[13];
                $fW = $individual[14];
                $fL = $individual[15];
                $fD = $individual[16];
                $s1 = $individual[21];
                $s2 = $individual[22];
                $s3 = $individual[23];
            } else {
                $skater = $individual[0];
                $gW = $individual[4];
                $gT = $individual[5];
                $foW = round(str_replace('%', '', $individual[6]) / 100 * $individual[7]);
                $foT = $individual[7];
                $eN = $individual[10];
                $ht = $individual[11];
                $psG = $individual[13];
                $psS = $individual[14];
                $fW = $individual[15];
                $fL = $individual[16];
                $fD = $individual[17];
                $s1 = $individual[22];
                $s2 = $individual[23];
                $s3 = $individual[24];
            }
            
            $query = "UPDATE `skaters`
                SET `gW`='$gW', `gT`='$gT',`foW`='$foW', `foT`='$foT', `eN`='$eN',`ht`='$ht', `psG`='$psG', `psS`='$psS', `fW`='$fW', `fL`='$fL', `fD`='$fD', `s1`='$s1', `s2`='$s2', `s3`='$s3'
                WHERE fName='$skater' AND season='$season'";
            
            mysqli_query($link, $query);
            
        }
    }

    
    $statTable1 = str_replace('<tr>', '', $statTable1);
    $statTable1 = str_replace('</table><table class="basictablesorter STHSScoring_PlayersTable2"><thead><th class="STHSW200">Player Name</th><th class="STHSW10">F</th><th class="STHSW10">D</th><th class="STHSW25">GW</th><th class="STHSW25">GT</th><th class="STHSW55">FO %</th><th class="STHSW25">FOT</th><th class="STHSW25">GA</th><th class="STHSW25">TA</th><th class="STHSW25">EG</th><th class="STHSW25">HT</th><th class="STHSW25">P/20</th><th class="STHSW25">PSG</th><th class="STHSW25">PSS</th><th class="STHSW25">FW</th><th class="STHSW25">FL</th><th class="STHSW25">FT</th><th class="STHSW25">GS</th><th class="STHSW25">PS</th><th class="STHSW25">WG</th><th class="STHSW25">WP</th><th class="STHSW25">S1</th><th class="STHSW25">S2</th><th class="STHSW25">S3</th></tr>','', $statTable1);
    $statTable1 = str_replace('</tr>', '', $statTable1);
    $statTable1 = str_replace('<td>', ' ', $statTable1);
    $statTable1 = str_replace('</td>', '', $statTable1);
    $statTable1 = str_replace('<b>', '', $statTable1);
    $statTable1 = str_replace('</b>', '', $statTable1);
    $statTable1 = str_replace('  ', ' ', $statTable1);
    $statTable1 = explode(' ', $statTable1);

    array_shift($statTable1);
    
    while(strlen($statTable1[0])){
        $i=0;
        $j=0;
        $individual = array();

        while (strlen($statTable1[$i]) > 1) {
            $i++;
        }

        while($j < 27+$i) {
            array_push($individual, array_shift($statTable1));
            $j++;
        }

        if (strlen($individual[0]) > 2){

            $link = mysqli_connect("xxxxxxx", "xxxxxxx","xxxxxxx","xxxxxxx");
            
            if(mysqli_connect_error()) {

                echo "There was an error connecting to the database.";

            }

            $season = $_GET['s'];
            if ($i == 2){
                $skater = $individual[0];
                $gp = $individual[3];
                $g = $individual[4];
                $a = $individual[5];
                $p = $individual[6];
                $pm = $individual[7];
                $pim = $individual[8];
                $h = $individual[10];
                $htt = $individual[11];
                $s = $individual[12];
                $sb = $individual[16];
                $m = $individual[17];
                $ppG = $individual[19];
                $ppA = $individual[20];
                $ppS = $individual[22];
                $ppM = $individual[23];
                $pkG = $individual[24];
                $pkA = $individual[25];
                $pkS = $individual[27];
                $pkM = $individual[28];
            } else {
                $skater = $individual[0];
                $gp = $individual[4];
                $g = $individual[5];
                $a = $individual[6];
                $p = $individual[7];
                $pm = $individual[8];
                $pim = $individual[9];
                $h = $individual[11];
                $htt = $individual[12];
                $s = $individual[13];
                $sb = $individual[17];
                $m = $individual[18];
                $ppG = $individual[20];
                $ppA = $individual[21];
                $ppS = $individual[23];
                $ppM = $individual[24];
                $pkG = $individual[25];
                $pkA = $individual[26];
                $pkS = $individual[28];
                $pkM = $individual[29];
            }
            
            $query = "UPDATE `skaters`
                SET `gp`='$gp', `g`='$g', `a`='$a', `p`='$p', `pm`='$pm', `pim`='$pim', `h`='$h', `htt`='$htt', `s`='$s', `sb`='$sb', `m`='$m', `ppG`='$ppG', `ppA`='$ppA', `ppS`='$ppS', `ppM`='$ppM', `pkG`='$pkG', `pkA`='$pkA', `pkS`='$pkS', `pkM`='$pkM'
                WHERE fName='$skater' AND season='$season'";
            
            mysqli_query($link, $query);
        }
    }


    while(strlen($statTable1[0])){
        $i=0;
        $j=0;
        $individual = array();

        while (strlen($statTable1[$i]) > 1) {
            $i++;
        }

        while($j < 27+$i) {
            array_push($individual, array_shift($statTable1));
            $j++;
        }

        if (strlen($individual[0]) > 2){

            $link = mysqli_connect("xxxxxxx", "xxxxxxx","xxxxxxx","xxxxxxx");
            
            if(mysqli_connect_error()) {

                echo "There was an error connecting to the database.";

            }

            $season = $_GET['s'];
            if ($i == 2){
                $skater = $individual[0];
                $gp = $individual[3];
                $g = $individual[4];
                $a = $individual[5];
                $p = $individual[6];
                $pm = $individual[7];
                $pim = $individual[8];
                $h = $individual[10];
                $htt = $individual[11];
                $s = $individual[12];
                $sb = $individual[16];
                $m = $individual[17];
                $ppG = $individual[19];
                $ppA = $individual[20];
                $ppS = $individual[22];
                $ppM = $individual[23];
                $pkG = $individual[24];
                $pkA = $individual[25];
                $pkS = $individual[27];
                $pkM = $individual[28];
            } else {
                $skater = $individual[0];
                $gp = $individual[4];
                $g = $individual[5];
                $a = $individual[6];
                $p = $individual[7];
                $pm = $individual[8];
                $pim = $individual[9];
                $h = $individual[11];
                $htt = $individual[12];
                $s = $individual[13];
                $sb = $individual[17];
                $m = $individual[18];
                $ppG = $individual[20];
                $ppA = $individual[21];
                $ppS = $individual[23];
                $ppM = $individual[24];
                $pkG = $individual[25];
                $pkA = $individual[26];
                $pkS = $individual[28];
                $pkM = $individual[29];
            }
            
            $query = "UPDATE `skaters`
                SET `gp`='$gp', `g`='$g', `a`='$a', `p`='$p', `pm`='$pm', `pim`='$pim', `h`='$h', `htt`='$htt', `s`='$s', `sb`='$sb', `m`='$m', `ppG`='$ppG', `ppA`='$ppA', `ppS`='$ppS', `ppM`='$ppM', `pkG`='$pkG', `pkA`='$pkA', `pkS`='$pkS', `pkM`='$pkM'
                WHERE fName='$skater' AND season='$season'";
            
            mysqli_query($link, $query);
        }
    }

?>