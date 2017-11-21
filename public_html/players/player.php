<!DOCTYPE html>
<html>
	<head>
	
		<title>Official Portland Admirals Website</title>
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Yantramanav:900|Roboto|Anton" rel="stylesheet">
		<link rel="shortcut icon" href="../Admirals Secondary.jpg">
        
        <link rel="stylesheet" href="../css/template.css" type="text/css">
        <link rel="stylesheet" href="player.css" type="text/css">
	
	</head>

    
    
	<body>

        
        <?php
            include '../php/header2.php';
        ?>
        
        <div id="site-content" class="wide-layout container">
            <div id="player-header">
                <div id="player-name"><?php
                    
                    $currentSeason = 35;

                    $link = mysqli_connect("xxxxxxx", "xxxxxxx","xxxxxxx","xxxxxxx");
                    
                    if(mysqli_connect_error()) {

                        echo "There was an error connecting to the database.";

                    }
                    $query = "SELECT * FROM `roster` WHERE `firstname` = '".mysqli_real_escape_string($link, $_GET['f'])."' AND `lastname` = '".mysqli_real_escape_string($link, $_GET['l'])."'";
                    if ($result = mysqli_query($link, $query)) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<div id='picture-container'><img src='../img/silhouette.png' id='player-picture'></div>";
                            echo $row['firstname']." ".$row['lastname']." | #".$row['jerseynumber'];
                            echo "</div>";
                            
                            echo "<div id='second-bar'>".$row['position']."  |  ".(int)($row['height'] / 12)."'".(int)($row['height'] % 12).'"  |  '.$row['weight']." lb  |  Age: ".(($currentSeason - $row['draftseason']) + 18)."  |  <img class='icon' src='../img/POR.png'> Portland Admirals";
                        }
                    }
                    ?></div>
                <div>
            <div id='player-body'><?php

                $link = mysqli_connect("xxxxxxx", "xxxxxxx","xxxxxxx","xxxxxxx");
                
                if(mysqli_connect_error()) {

                    echo "There was an error connecting to the database.";

                }
                
                $query = "SELECT * FROM `roster` WHERE `firstname` = '".mysqli_real_escape_string($link, $_GET['f'])."' AND `lastname` = '".mysqli_real_escape_string($link, $_GET['l'])."'";
                if ($result = mysqli_query($link, $query)) {
                    while ($row = mysqli_fetch_array($result)) {
                        $handedness = '';
                        if ($row['handedness'] == 'R'){
                            $handedness = 'Right';
                        } else {
                            $handedness = 'Left';
                        }
                        $shoot = '';
                        if ($row['position'] == 'G'){
                            $shoot = 'Catches';
                        } else {
                            $shoot = 'Shoots';
                        }
                        echo "<div class='wrapper profile'><div class='personal'><p><b>".$row['firstname']." ".$row['lastname']."</b></p>
                        <p><b>Born:</b> ".date('M j', strtotime($row['birthdate']))."</p>
                        <p><b>Birthplace:</b> ".$row['birthplace']."</p>
                        <p><b>".$shoot.":</b> ".$handedness."</p>
                        <p><b>Draft: </b>".$row['draft']."</div>";
                        
                        $position = $row['position'];
                        if ($position == 'G'){                            
                            $query = "SELECT * FROM `goalies` WHERE `fName` = '".mysqli_real_escape_string($link, $_GET['f'])."' AND `lName` = '".mysqli_real_escape_string($link, $_GET['l'])."' ORDER BY `season` DESC";
                            echo "<div class='top-table'><table class='stats' cellspacing='0'>
                                <thead>
                                    <th>Season</th>
                                    <th>GP</th>
                                    <th>GS</th>
                                    <th>W</th>
                                    <th>L</th>
                                    <th>OT</th>
                                    <th>SA</th>
                                    <th>GA</th>
                                    <th>GAA</th>
                                    <th>Sv%</th>
                                    <th>SO</th>
                                    <th>MIN</th>
                                    </thead>";
                            
                            if ($result = mysqli_query($link, $query)) {
                                    $gptot = 0;
                                    $wtot = 0;
                                    $ltot = 0;
                                    $oltot = 0;
                                    $mtot = 0;
                                    $sotot = 0;
                                    $gatot = 0;
                                    $satot = 0;
                                    $sttot = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        if ($row['season'] == $currentSeason){
                                            
                                            $svp = (float)(1 - $row['ga'] / $row['sa']);
                                            $gaa = (float)($row['ga'] / ($row['mp'] / 60));
                                            echo "<tr><td class='season'>".$row['season']."</td>
                                                <td>".$row['gp']."</td>
                                                <td>".$row['st']."</td>
                                                <td><b>".$row['w']."</b></td>
                                                <td>".$row['l']."</td>
                                                <td>".$row['otl']."</td>
                                                <td>".$row['sa']."</td>
                                                <td>".$row['ga']."</td>
                                                <td>".number_format($gaa,2)."</td>
                                                <td>".number_format($svp,3)."</td>
                                                <td>".$row['so']."</td>
                                                <td>".$row['mp']."</td>
                                                </tr>";
                                        }
                                        $gptot += $row['gp'];
                                        $wtot += $row['w'];
                                        $ltot += $row['l'];
                                        $oltot += $row['otl'];
                                        $mtot += $row['mp'];
                                        $sotot += $row['so'];
                                        $gatot += $row['ga'];
                                        $satot += $row['sa'];
                                        $sttot += $row['st'];
                                    }
                                $svptot = (float)(1 - $gatot / $satot);
                                $gaatot = (float)($gatot / ($mtot / 60));
                                echo "<tr class='career'><td>CAREER</td>
                                    <td>".$gptot."</td>
                                    <td>".$sttot."</td>
                                    <td><b>".$wtot."</b></td>
                                    <td>".$ltot."</td>
                                    <td>".$oltot."</td>
                                    <td>".$satot."</td>
                                    <td>".$gatot."</td>
                                    <td>".number_format($gaatot,2)."</td>
                                    <td>".number_format($svptot,3)."</td>
                                    <td>".$sotot."</td>
                                    <td>".$mtot."</td>
                                    </tr></table></div></div>";
                            }
                            
                        } else {
                            
                            $query = "SELECT * FROM `skaters` WHERE `fName` = '".mysqli_real_escape_string($link, $_GET['f'])."' AND `lName` = '".mysqli_real_escape_string($link, $_GET['l'])."' ORDER BY `season` DESC";
                            
                            echo "<div class='top-table'><table class='stats' cellspacing='0'>
                                <thead>
                                    <th>Season</th>
                                    <th>GP</th>
                                    <th>G</th>
                                    <th>A</th>
                                    <th>P</th>
                                    <th>+/-</th>
                                    <th>PIM</th>
                                    <th>PPG</th>
                                    <th>PPP</th>
                                    <th>SHG</th>
                                    <th>SHP</th>
                                    <th>GWG</th>
                                    <th>S</th>
                                    <th>S%</th>
                                    </thead>";
                            
                            if ($result = mysqli_query($link, $query)) {
                                $gptot = 0;
                                $gtot = 0;
                                $atot = 0;
                                $ptot = 0;
                                $pmtot = 0;
                                $pimtot = 0;
                                $ppGtot = 0;
                                $ppPtot = 0;
                                $pkGtot = 0;
                                $pkPtot = 0;
                                $gWtot = 0;
                                $stot = 0;
                                
                                while ($row = mysqli_fetch_array($result)) {                                           
                                    if ($row['season'] == $currentSeason){        
                                            $shotp = number_format((float)($row['g'] / $row['s']) * 100,2);
                                            $ppP = $row['ppG'] + $row['ppA'];
                                            $pkP = $row['pkG'] + $row['pkA'];
                                            echo "<tr><td class='season'>".$row['season']."</td>
                                                <td>".$row['gp']."</td>
                                                <td>".$row['g']."</td>
                                                <td>".$row['a']."</td>
                                                <td><b>".$row['p']."</b></td>
                                                <td>".$row['pm']."</td>
                                                <td>".$row['pim']."</td>
                                                <td>".$row['ppG']."</td>
                                                <td>".$ppP."</td>
                                                <td>".$row['pkG']."</td>
                                                <td>".$pkP."</td>
                                                <td>".$row['gW']."</td>
                                                <td>".$row['s']."</td>
                                                <td>".$shotp."</td>
                                                </tr>";
                                        }
                                    $gptot += $row['gp'];
                                    $gtot += $row['g'];
                                    $atot += $row['a'];
                                    $ptot += $row['p'];
                                    $pmtot += $row['pm'];
                                    $pimtot += $row['pim'];
                                    $ppGtot += $row['ppG'];
                                    $ppPtot += $row['ppG'];
                                    $ppPtot += $row['ppA'];
                                    $pkGtot += $row['pkG'];
                                    $pkPtot += $row['pkG'];
                                    $pkPtot += $row['pkA'];
                                    $gWtot += $row['gW'];
                                    $stot += $row['s'];
                                }
                                $shotptot = number_format((float)($gtot / $stot) * 100,2);
                                echo "<tr class='career'><td>CAREER</td>
                                    <td>".$gptot."</td>
                                    <td>".$gtot."</td>
                                    <td>".$atot."</td>
                                    <td>".$ptot."</td>
                                    <td>".$pmtot."</td>
                                    <td>".$pimtot."</td>
                                    <td>".$ppGtot."</td>
                                    <td>".$ppPtot."</td>
                                    <td>".$pkGtot."</td>
                                    <td>".$pkPtot."</td>
                                    <td>".$gWtot."</td>
                                    <td>".$stot."</td>
                                    <td>".$shotptot."</td>
                                    </tr></table></div></div>";
                            }
                        }
                        
                        echo "<div class='wrapper'>";
                        
                        echo "<div id='career-title'>".$row['firstname']." ".$row['lastname']." Career Stats</div>";
                        if ($position == 'G'){
                            echo "<table class='stats' cellspacing='0'>
                                <tr>
                                    <th>Team</th>
                                    <th>Sn</th>
                                    <th>GP</th>
                                    <th>W</th>
                                    <th>L</th>
                                    <th>OL</th>
                                    <th>S%</th>
                                    <th>GAA</th>
                                    <th>M</th>
                                    <th>SO</th>
                                    <th>GA</th>
                                    <th>SA</th>
                                    <th>A</th>
                                    <th>PIM</th>
                                    <th>EN</th>
                                    <th>PS</th>
                                    <th>PA</th>
                                    <th>ST</th>
                                    <th>BU</th>
                                    <th>S1</th>
                                    <th>S2</th>
                                    <th>S3</th>
                                </tr>";
                            
                            $query = "SELECT * FROM `goalies` WHERE `fName` = '".mysqli_real_escape_string($link, $_GET['f'])."' AND `lName` = '".mysqli_real_escape_string($link, $_GET['l'])."' ORDER BY `season` DESC";
                            
                            if ($result = mysqli_query($link, $query)) {
                                $gptot = 0;
                                $wtot = 0;
                                $ltot = 0;
                                $oltot = 0;
                                $mtot = 0;
                                $sotot = 0;
                                $gatot = 0;
                                $satot = 0;
                                $sttot = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>
                                            <td><img src='../img/".$row['team'].".png'></td>
                                            <td class='season'>".$row['season']."</td>
                                            <td>".$row['gp']."</td>
                                            <td class='mainstat'>".$row['w']."</td>
                                            <td>".$row['l']."</td>
                                            <td>".$row['otl']."</td>
                                            <td>".$row['svp']."</td>
                                            <td>".$row['gaa']."</td>
                                            <td>".$row['mp']."</td>
                                            <td>".$row['so']."</td>
                                            <td>".$row['ga']."</td>
                                            <td>".$row['sa']."</td>
                                            <td>".$row['a']."</td>
                                            <td>".$row['pim']."</td>
                                            <td>".$row['en']."</td>
                                            <td>".$row['ps']."</td>
                                            <td>".$row['pa']."</td>
                                            <td>".$row['st']."</td>
                                            <td>".$row['bu']."</td>
                                            <td>".$row['s1']."</td>
                                            <td>".$row['s2']."</td>
                                            <td>".$row['s2']."</td>
                                        </tr>";
                                    $sntot++;
                                    $gptot += $row['gp'];
                                    $wtot += $row['w'];
                                    $ltot += $row['l'];
                                    $oltot += $row['otl'];
                                    $mtot += $row['mp'];
                                    $sotot += $row['so'];
                                    $gatot += $row['ga'];
                                    $satot += $row['sa'];
                                    $atot += $row['a'];
                                    $pimtot += $row['pim'];
                                    $entot += $row['en'];
                                    $pstot += $row['ps'];
                                    $patot += $row['pa'];
                                    $sttot += $row['st'];
                                    $butot += $row['bu'];
                                    $s1tot += $row['s1'];
                                    $s2tot += $row['s2'];
                                    $s3tot += $row['s3'];
                                }
                            }
                            $svptot = (float)(1 - $gatot / $satot);
                            $gaatot = (float)($gatot / ($mtot / 60));
                            echo "<tr class='career'><td>CAREER</td>
                                    <td>".$sntot."</td>
                                    <td>".$gptot."</td>
                                    <td><b>".$wtot."</b></td>
                                    <td>".$ltot."</td>
                                    <td>".$oltot."</td>
                                    <td>".number_format($svptot,3)."</td>
                                    <td>".number_format($gaatot,2)."</td>
                                    <td>".$mtot."</td>
                                    <td>".$sotot."</td>
                                    <td>".$gatot."</td>
                                    <td>".$satot."</td>
                                    <td>".$atot."</td>
                                    <td>".$pimtot."</td>
                                    <td>".$entot."</td>
                                    <td>".$pstot."</td>
                                    <td>".$patot."</td>
                                    <td>".$sttot."</td>
                                    <td>".$butot."</td>
                                    <td>".$s1tot."</td>
                                    <td>".$s2tot."</td>
                                    <td>".$s3tot."</td>
                                    </tr>";
                            echo "</table>";
                        } else {                            
                            echo "<table class='stats skater' cellspacing='0'>
                                <tr>
                                    <th>Team</th>
                                    <th>Sn</th>
                                    <th>GP</th>
                                    <th>G</th>
                                    <th>A</th>
                                    <th>P</th>
                                    <th>S</th>
                                    <th>M</th>
                                    <th>+-</th>
                                    <th>PIM</th>
                                    <th>H</th>
                                    <th>HT</th>
                                    <th>SB</th>
                                    <th>PPG</th>
                                    <th>PPA</th>
                                    <th>PPS</th>
                                    <th>PPM</th>
                                    <th>PKG</th>
                                    <th>PKA</th>
                                    <th>PKS</th>
                                    <th>PKM</th>
                                    <th>GW</th>
                                    <th>GT</th>
                                    <th>FOW</th>
                                    <th>FOT</th>
                                    <th>FO%</th>
                                    <th>EN</th>
                                    <th>HT</th>
                                    <th>PSG</th>
                                    <th>PSS</th>
                                    <th>FW</th>
                                    <th>FL</th>
                                    <th>FD</th>
                                    <th>S1</th>
                                    <th>S2</th>
                                    <th>S3</th>
                                </tr>";
                            $sntot = 0;
                            $gptot = 0;
                            $gtot = 0;
                            $atot = 0;
                            $ptot = 0;
                            $stot = 0;
                            $mtot = 0;
                            $pmtot = 0;
                            $pimtot = 0;
                            $htot = 0;
                            $htttot = 0;
                            $sbtot = 0;
                            $ppGtot = 0;
                            $ppAtot = 0;
                            $ppStot = 0;
                            $ppMtot = 0;
                            $pkGtot = 0;
                            $pkAtot = 0;
                            $pkStot = 0;
                            $pkMtot = 0;
                            $gWtot = 0;
                            $gTtot = 0;
                            $foWtot = 0;
                            $foTtot = 0;
                            $eNtot = 0;
                            $httot = 0;
                            $psGtot = 0;
                            $psStot = 0;
                            $fWtot = 0;
                            $fLtot = 0;
                            $fDtot = 0;
                            $s1tot = 0;
                            $s2tot = 0;
                            $s3tot = 0;
                            
                            $query = "SELECT * FROM `skaters` WHERE `fName` = '".mysqli_real_escape_string($link, $_GET['f'])."' AND `lName` = '".mysqli_real_escape_string($link, $_GET['l'])."' ORDER BY `season` DESC";
                            
                            if ($result = mysqli_query($link, $query)) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $percentage = (float)($row['foW'] / $row['foT']);
                                    
                                    echo "<tr>
                                    <td><img src='../img/".$row['team'].".png'></td>
                                    <td class='season'>".$row['season']."</td>
                                    <td>".$row['gp']."</td>
                                    <td>".$row['g']."</td>
                                    <td>".$row['a']."</td>
                                    <td class='mainstat'>".$row['p']."</td>
                                    <td>".$row['s']."</td>
                                    <td>".$row['m']."</td>
                                    <td>".$row['pm']."</td>
                                    <td>".$row['pim']."</td>
                                    <td>".$row['h']."</td>
                                    <td>".$row['htt']."</td>
                                    <td>".$row['sb']."</td>
                                    <td>".$row['ppG']."</td>
                                    <td>".$row['ppA']."</td>
                                    <td>".$row['ppS']."</td>
                                    <td>".$row['ppM']."</td>
                                    <td>".$row['pkG']."</td>
                                    <td>".$row['pkA']."</td>
                                    <td>".$row['pkS']."</td>
                                    <td>".$row['pkM']."</td>
                                    <td>".$row['gW']."</td>
                                    <td>".$row['gT']."</td>
                                    <td>".$row['foW']."</td>
                                    <td>".$row['foT']."</td>
                                    <td>".number_format($percentage * 100, 2)."%</td>
                                    <td>".$row['eN']."</td>
                                    <td>".$row['ht']."</td>
                                    <td>".$row['psG']."</td>
                                    <td>".$row['psS']."</td>
                                    <td>".$row['fW']."</td>
                                    <td>".$row['fL']."</td>
                                    <td>".$row['fD']."</td>
                                    <td>".$row['s1']."</td>
                                    <td>".$row['s2']."</td>
                                    <td>".$row['s3']."</td>
                                    </tr>";
                                    
                                    $sntot++;
                                    $gptot += $row['gp'];
                                    $gtot += $row['g'];
                                    $atot += $row['a'];
                                    $ptot += $row['p'];
                                    $stot += $row['s'];
                                    $mtot += $row['m'];
                                    $pmtot += $row['pm'];
                                    $pimtot += $row['pim'];
                                    $htot += $row['h'];
                                    $htttot += $row['htt'];
                                    $sbtot += $row['sb'];
                                    $ppGtot += $row['ppG'];
                                    $ppAtot += $row['ppA'];
                                    $ppStot += $row['ppS'];
                                    $ppMtot += $row['ppM'];
                                    $pkGtot += $row['pkG'];
                                    $pkAtot += $row['pkA'];
                                    $pkStot += $row['pkS'];
                                    $pkMtot += $row['pkM'];
                                    $gWtot += $row['gW'];
                                    $gTtot += $row['gT'];
                                    $foWtot += $row['foW'];
                                    $foTtot += $row['foT'];
                                    $eNtot += $row['eN'];
                                    $httot += $row['ht'];
                                    $psGtot += $row['psG'];
                                    $psStot += $row['psS'];
                                    $fWtot += $row['fW'];
                                    $fLtot += $row['fL'];
                                    $fDtot += $row['fD'];
                                    $s1tot += $row['s1'];
                                    $s2tot += $row['s2'];
                                    $s3tot += $row['s3'];
                                }
                            }
                            
                            $percentagetot = (float)($foWtot / $foTtot);
                            echo "<tr class='career'>
                                <td>CAREER</td>
                                <td class='season'>".$sntot."</td>
                                <td>".$gptot."</td>
                                <td>".$gtot."</td>
                                <td>".$atot."</td>
                                <td class='mainstat'>".$ptot."</td>
                                <td>".$stot."</td>
                                <td>".$mtot."</td>
                                <td>".$pmtot."</td>
                                <td>".$pimtot."</td>
                                <td>".$htot."</td>
                                <td>".$htttot."</td>
                                <td>".$sbtot."</td>
                                <td>".$ppGtot."</td>
                                <td>".$ppAtot."</td>
                                <td>".$ppStot."</td>
                                <td>".$ppMtot."</td>
                                <td>".$pkGtot."</td>
                                <td>".$pkAtot."</td>
                                <td>".$pkStot."</td>
                                <td>".$pkMtot."</td>
                                <td>".$gWtot."</td>
                                <td>".$gTtot."</td>
                                <td>".$foWtot."</td>
                                <td>".$foTtot."</td>
                                <td>".number_format($percentagetot * 100, 2)."%</td>
                                <td>".$eNtot."</td>
                                <td>".$httot."</td>
                                <td>".$psGtot."</td>
                                <td>".$psStot."</td>
                                <td>".$fWtot."</td>
                                <td>".$fLtot."</td>
                                <td>".$fDtot."</td>
                                <td>".$s1tot."</td>
                                <td>".$s2tot."</td>
                                <td>".$s3tot."</td>
                                </tr>";
                            echo "</table>";
                        }
                    }
                }
                
                


                ?></div></div></div></div>
                </div>
            </div>
        <?php
            include '../php/footer2.php';
        ?>
	</body>	
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
    <script src="../js/megamenu.js" type="text/javascript"></script>
</html>