<!DOCTYPE html>
<html>
	<head>
	
		<title>Official Portland Admirals Website | Roster</title>
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Yantramanav:900|Roboto|Anton" rel="stylesheet">
		<link rel="shortcut icon" href="../Admirals Secondary.jpg">
        
        <link rel="stylesheet" href="../css/template.css" type="text/css">
        <link rel="stylesheet" href="roster.css" type="text/css">
	
	</head>

    
    
	<body>        
        <?php
            include '../php/header2.php';
        ?>
        
        <div id="site-content" class="wide-layout container">
            <div class='wrapper'>
                <div id="roster-title">Roster</div>
                <div class='content-wrapper-left'>
                    <div class="table-wrapper">

                        <div class="table-title">Forwards</div>

                        <table id="roster-table" cellspacing="0">
                        <tr>
                            <th>Player</th>
                            <th>#</th>
                            <th>Pos</th>
                            <th>Sh</th>
                            <th>Ht</th>
                            <th>Wt</th>
                            <th>Born</th>
                            <th>Birthplace</th>
                        </tr>
                        <?php 

                            $link = mysqli_connect("xxxxxxx", "xxxxxxx","xxxxxxx","xxxxxxx");
                            
                        if(mysqli_connect_error()) {

                            echo "There was an error connecting to the database.";

                        }


                        $query = "SELECT * FROM `roster` WHERE `active` = '1' AND `position` = 'rw' OR `active` = '1' AND `position` = 'c' OR `active` = '1' AND `position` = 'lw' ORDER BY `lastname` ASC";

                        if($result = mysqli_query($link, $query)) {

                            while ($row = mysqli_fetch_array($result)) {

                                $heightfeet = (int)($row['height'] / 12);
                                $heightinches = $row['height'] % 12;

                                echo "<tr>";
                                echo "<td><a href='../players/player.php?f=".urlencode($row['firstname'])."&l=".urlencode($row['lastname'])."' class='playerlink'>".$row['firstname']." ".$row['lastname']." ".$row['captain']."</a></td>";
                                    echo "<td>".$row['jerseynumber']."</td>";
                                    echo "<td>".$row['position']."</td>";
                                    echo "<td>".$row['handedness']."</td>";
                                    echo "<td>".$heightfeet."'".$heightinches.'"'."</td>";
                                    echo "<td>".$row['weight']."</td>";
                                    echo "<td>".date('M j', strtotime($row['birthdate']))."</td>";
                                    echo "<td>".$row['birthplace']."</td>";
                                echo "</tr>";
                            }
                        }



                        ?></table>
                    </div>

                    <div class="table-wrapper">

                    <div class="table-title">Defensemen</div>

                    <table id="roster-table" cellspacing="0">
                    <tr>
                        <th>Player</th>
                        <th>#</th>
                        <th>Pos</th>
                        <th>Sh</th>
                        <th>Ht</th>
                        <th>Wt</th>
                        <th>Born</th>
                        <th>Birthplace</th>
                    </tr>
                    <?php 

                $link = mysqli_connect("xxxxxxx", "xxxxxxx","xxxxxxx","xxxxxxx");
                        
                    if(mysqli_connect_error()) {

                        echo "There was an error connecting to the database.";

                    }


                    $query = "SELECT * FROM `roster` WHERE `active` = '1' AND `position` = 'd' ORDER BY `lastname` ASC";

                    if($result = mysqli_query($link, $query)) {

                        while ($row = mysqli_fetch_array($result)) {

                            $heightfeet = (int)($row['height'] / 12);
                            $heightinches = $row['height'] % 12;

                            echo "<tr>";
                                echo "<td><a href='../players/player.php?f=".urlencode($row['firstname'])."&l=".urlencode($row['lastname'])."' class='playerlink'>".$row['firstname']." ".$row['lastname']." ".$row['captain']."</a></td>";
                                echo "<td>".$row['jerseynumber']."</td>";
                                echo "<td>".$row['position']."</td>";
                                echo "<td>".$row['handedness']."</td>";
                                echo "<td>".$heightfeet."'".$heightinches.'"'."</td>";
                                echo "<td>".$row['weight']."</td>";
                                echo "<td>".date('M j', strtotime($row['birthdate']))."</td>";
                                echo "<td>".$row['birthplace']."</td>";
                            echo "</tr>";
                        }
                    }



                    ?>
                        </table>
                    </div>

                    <div class="table-wrapper">

                        <div class="table-title">Goalies</div>

                        <table id="roster-table" cellspacing="0">
                        <tr>
                            <th>Player</th>
                            <th>#</th>
                            <th>Ht</th>
                            <th>Wt</th>
                            <th>Born</th>
                            <th>Birthplace</th>
                        </tr>
                        <?php 

                        $link = mysqli_connect("xxxxxxx", "xxxxxxx","xxxxxxx","xxxxxxx");
                            
                        if(mysqli_connect_error()) {

                            echo "There was an error connecting to the database.";

                        }


                        $query = "SELECT * FROM `roster` WHERE `active` = '1' AND `position` = 'g' ORDER BY `lastname` ASC";

                        if($result = mysqli_query($link, $query)) {

                            while ($row = mysqli_fetch_array($result)) {

                                $heightfeet = (int)($row['height'] / 12);
                                $heightinches = $row['height'] % 12;

                                echo "<tr>";
                                    echo "<td><a href='../players/player.php?f=".urlencode($row['firstname'])."&l=".urlencode($row['lastname'])."' class='playerlink'>".$row['firstname']." ".$row['lastname']."</a></td>";
                                    echo "<td>".$row['jerseynumber']."</td>";
                                    echo "<td>".$heightfeet."'".$heightinches.'"'."</td>";
                                    echo "<td>".$row['weight']."</td>";
                                    echo "<td>".date('M j', strtotime($row['birthdate']))."</td>";
                                    echo "<td>".$row['birthplace']."</td>";
                                echo "</tr>";
                            }
                        }



                        ?>
                        </table>
                    </div>
                </div>
                <div class='content-wrapper-right'>
                    <div class='leaderboard'>
                        <div class='leaderboard-title'>Leaderboard</div>
                    <?php
                    $link = mysqli_connect("xxxxxxx", "xxxxxxx","xxxxxxx","xxxxxxx");
                        
                        if(mysqli_connect_error()) {

                            echo "There was an error connecting to the database.";

                        }


                        $query = "SELECT * FROM `skaters` WHERE `season` = '35' AND `team` = 'POR' ORDER BY `g` DESC LIMIT 1";

                        if($result = mysqli_query($link, $query)) {

                            while ($row = mysqli_fetch_array($result)) {
                                $fName = $row[fName];
                                $lName = $row[lName];
                                echo "<div class='entry'>";
                                echo "GOALS<br>";
                                echo "<div class='leadername'><a href='../players/player.php?f=".$row[fName]."&l=".$row[lName]."'>".$row[fName]." ".$row[lName]."</a></div>";
                                echo "<div class='total'><div class='totalnumber'>".$row[g]."</div>GOALS</div>";
                            }
                            
                            $query = "SELECT * FROM `roster` WHERE `firstname` = '$fName' AND `lastname` = '$lName'";
                            
                            if($result = mysqli_query($link, $query)) {
                                
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<br><div class='infoline'>#".$row[jerseynumber]." | POR | ".$row[position]."</div></div>";
                                }
                            }
                        }
                        
                        $query = "SELECT * FROM `skaters` WHERE `season` = '35' AND `team` = 'POR' ORDER BY `a` DESC LIMIT 1";

                        if($result = mysqli_query($link, $query)) {

                            while ($row = mysqli_fetch_array($result)) {
                                $fName = $row[fName];
                                $lName = $row[lName];
                                echo "<div class='entry'>";
                                echo "ASSISTS<br>";
                                echo "<div class='leadername'><a href='../players/player.php?f=".$row[fName]."&l=".$row[lName]."'>".$row[fName]." ".$row[lName]."</a></div>";
                                echo "<div class='total'><div class='totalnumber'>".$row[a]."</div>ASSISTS</div>";
                            }
                            
                            $query = "SELECT * FROM `roster` WHERE `firstname` = '$fName' AND `lastname` = '$lName'";
                            
                            if($result = mysqli_query($link, $query)) {
                                
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<br><div class='infoline'>#".$row[jerseynumber]." | POR | ".$row[position]."</div></div>";
                                }
                            }
                        }
                        
                        $query = "SELECT * FROM `skaters` WHERE `season` = '35' AND `team` = 'POR' ORDER BY `p` DESC LIMIT 1";

                        if($result = mysqli_query($link, $query)) {

                            while ($row = mysqli_fetch_array($result)) {
                                $fName = $row[fName];
                                $lName = $row[lName];
                                echo "<div class='entry'>";
                                echo "POINTS<br>";
                                echo "<div class='leadername'><a href='../players/player.php?f=".$row[fName]."&l=".$row[lName]."'>".$row[fName]." ".$row[lName]."</a></div>";
                                echo "<div class='total'><div class='totalnumber'>".$row[p]."</div>POINTS</div>";
                            }
                            
                            $query = "SELECT * FROM `roster` WHERE `firstname` = '$fName' AND `lastname` = '$lName'";
                            
                            if($result = mysqli_query($link, $query)) {
                                
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<br><div class='infoline'>#".$row[jerseynumber]." | POR | ".$row[position]."</div></div>";
                                }
                            }
                        }
                        
                        $query = "SELECT * FROM `goalies` WHERE `season` = '35' AND `team` = 'POR' ORDER BY `w` DESC LIMIT 1";

                        if($result = mysqli_query($link, $query)) {

                            while ($row = mysqli_fetch_array($result)) {
                                $fName = $row[fName];
                                $lName = $row[lName];
                                echo "<div class='entry' style='border-bottom:none; margin-bottom: 0px;'>";
                                echo "WINS<br>";
                                echo "<div class='leadername'><a href='../players/player.php?f=".$row[fName]."&l=".$row[lName]."'>".$row[fName]." ".$row[lName]."</a></div>";
                                echo "<div class='total'><div class='totalnumber'>".$row[w]."</div>WINS</div>";
                            }
                            
                            $query = "SELECT * FROM `roster` WHERE `firstname` = '$fName' AND `lastname` = '$lName'";
                            
                            if($result = mysqli_query($link, $query)) {
                                
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<br><div class='infoline'>#".$row[jerseynumber]." | POR | ".$row[position]."</div></div>";
                                }
                            }
                        }
                    ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <?php
            include '../php/footer2.php';
        ?>
	</body>	
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
    <script src="../js/megamenu.js" type="text/javascript"></script>
</html>