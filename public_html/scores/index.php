<!DOCTYPE html>
<html>
	<head>
	
		<title>Official Portland Admirals Website</title>
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Yantramanav:900|Roboto|Anton" rel="stylesheet">
		<link rel="shortcut icon" href="../Admirals Secondary.jpg">
        
        <link rel="stylesheet" href="../css/template.css" type="text/css">
        <link rel="stylesheet" href="scores.css" type="text/css">
        
	</head>

    
    
	<body>

        
        <?php
            include '../php/header2.php';
        ?>
        
        <div id="site-content" class="wide-layout container">
            <div class='wrapper'>
            <div id='scores-body'>
                
                <?php
                $_GET['s'] = 34;
                $_GET['g'] = 3;
                include '../php/gamedatafetch.php';
                 echo "<div class='games-preview'>
                        <div class='teamscores'>
                            <table>
                                <tr>
                                    <td>".$team1."</td>
                                    <td>".$goalsTotal1."</td>
                                </tr>
                                <tr>
                                    <td>".$team2."</td>
                                    <td>".$goalsTotal2."</td>
                                </tr>
                            </table>
                            FINAL
                        </div>
                    </div>";
                ?>

            </div>
        </div></div>
        <?php
            include '../php/footer2.php';
        ?>
	</body>	
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
    <script src="../js/megamenu.js" type="text/javascript"></script>
</html>