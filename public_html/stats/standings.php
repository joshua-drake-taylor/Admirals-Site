<!DOCTYPE html>
<html>
	<head>
	
		<title>Official Portland Admirals Website</title>
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Yantramanav:900|Roboto|Anton" rel="stylesheet">
		<link rel="shortcut icon" href="../Admirals Secondary.jpg">
        
        <link rel="stylesheet" href="../css/template.css" type="text/css">
        <link rel="stylesheet" href="standings.css" type="text/css">
	
        <?php
            if(!isset($_GET['s'])){
                $_GET['s'] = 35;
            }else if ($_GET['s'] < 28){
                $_GET['s'] = 28;
            }else if ($_GET['s'] > 35){
                $_GET['s'] = 35;
            }
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
                </select>
            </form>
                <?php
                include '../php/standingsfetch.php';
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