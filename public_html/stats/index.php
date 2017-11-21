<!DOCTYPE html>
<html>
	<head>
	
		<title>Official Portland Admirals Website</title>
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Yantramanav:900|Roboto|Anton" rel="stylesheet">
		<link rel="shortcut icon" href="../Admirals Secondary.jpg">
        
        <link rel="stylesheet" href="../css/template.css" type="text/css">
        <link rel="stylesheet" href="stats.css" type="text/css">
	
        <?php
            if(!isset($_GET['s'])){
                $_GET['s'] = 35;
            }
            if($_GET['s'] < 25){
                $_GET['s'] = 25;
            } else if ($_GET['s'] > 35){
                $_GET['s'] = 35;
            }
        ?>
        
        <?php
            include '../php/seasonupdate.php';
        ?>
        
	</head>

    
    
	<body>

        
        <?php
            include '../php/header2.php';
        ?>
        
        <div id="site-content" class="wide-layout container">
            <div class='wrapper'>
            <div id='stat-body'>
                
                <div id='season-title'><?php echo "S".$_GET[s];?></div>
                <form>
                    <select name="s" onchange="this.form.submit()" id="season-select">
                    <option selected disabled>Season:</option>
                    <option value="35">S35</option>
                    <option value="34">S34</option>
                    <option value="33">S33</option>
                    <option value="32">S32</option>
                    <option value="31">S31</option>
                    <option value="30">S30</option>
                    <option value="29">S29</option>
                    <option value="28">S28</option>
                    <option value="27">S27</option>
                    <option value="26">S26</option>
                    <option value="25">S25</option>
                </select>
            </form>
                <?php

                $link = mysqli_connect("xxxxxxx", "xxxxxxx","xxxxxxx","xxxxxxx");
                
                if(mysqli_connect_error()) {

                    echo "There was an error connecting to the database.";

                }
                
                
                            
                            
                $query = "SELECT * FROM `skaters` WHERE `season` = '".mysqli_real_escape_string($link, $_GET['s'])."' AND `team` = 'POR' ORDER BY `p` DESC";
                
                echo "<div class='column-container'><table class='stats skater' cellspacing='0'><tr><th>Player</th></tr>";
                if ($result = mysqli_query($link, $query)) {
                    while ($row = mysqli_fetch_array($result)) {
                    echo "<tr><td class='playername'><a href='../players/player.php?f=".urlencode($row['fName'])."&l=".urlencode($row['lName'])."'>".$row['fName']." ".$row['lName']."</a></td></tr>";
                    }
                }
                echo "</table></div>";
                
                echo "<div class='table-container'><table class='stats skater' cellspacing='0'>
                    <tr>
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
                            
                if ($result = mysqli_query($link, $query)) {
                    while ($row = mysqli_fetch_array($result)) {
                        $percentage = (float)($row['foW'] / $row['foT']);

                            echo "<tr>
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
                
                    }
                }
                
                echo "</table></div>";
                
                
                $query = "SELECT * FROM `goalies` WHERE `season` = '".mysqli_real_escape_string($link, $_GET['s'])."' AND `team` = 'POR' ORDER BY `w` DESC";
                                
                echo "<div class='column-container'><table class='stats' cellspacing='0'><tr><th>Player</th></tr>";
                if ($result = mysqli_query($link, $query)) {
                    while ($row = mysqli_fetch_array($result)) {
                    echo "<tr><td class='playername'><a href='../players/player.php?f=".urlencode($row['fName'])."&l=".urlencode($row['lName'])."'>".$row['fName']." ".$row['lName']."</a></td></tr>";
                    }
                }
                echo "</table></div>";
                echo "<div class='table-container'><table class='stats' cellspacing='0'>
                <tr>
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
                            
                            
                if ($result = mysqli_query($link, $query)) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>
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
                                
                    }
                    
                }
                echo "</table></div>";
                ?>
                </div>
            </div>
        </div></div>
        <?php
            include '../php/footer2.php';
        ?>
	</body>	
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
    <script src="../js/megamenu.js" type="text/javascript"></script>
</html>