<!DOCTYPE html>
<html>
	<head>
	
		<title>Official Portland Admirals Website</title>
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Yantramanav:900|Roboto|Anton" rel="stylesheet">
		<link rel="shortcut icon" href="../Admirals Secondary.jpg">
        
        <link rel="stylesheet" href="../css/template.css" type="text/css">
        <link rel="stylesheet" href="article.css" type="text/css">
	
	</head>

    
    
	<body>

        
        <?php
            include '../php/header2.php';
        ?>
        
        <div id="site-content" class="wide-layout container"><div class='wrapper'>
            <p><?php

                $link = mysqli_connect("xxxxxxx", "xxxxxxx","xxxxxxx","xxxxxxx");
                
                if(mysqli_connect_error()) {

                    echo "There was an error connecting to the database.";

                }
                
                $query = "SELECT id FROM articles";
                $articleid = "";
                $maxvalue = "";
                if ($result = mysqli_query($link, $query)) {
                    $values = array("");
                    while ($fetched = mysqli_fetch_array($result)) {
                        array_push($values, $fetched['id']);
                    }
                    $maxvalue = max($values);
                }
                
                if ($_GET['id'] > $maxvalue) {
                    echo "<p style='font-size:24px;'>Article not found</p>";
                } else {
                    
                    $articleid = $_GET['id'];
                    
                    $query = "SELECT * FROM `articles` ORDER BY `id` DESC";
                    
                    if($result = mysqli_query($link, $query)){
                        echo "<div class='content-wrapper-left'>";
                        while ($row = mysqli_fetch_array($result)){
                            if($_GET['id'] == $row['id']){
                                echo "<a href='article.php?id=".$row['id']."'><div class='current'>".$row['title']."</div></a>";
                            }
                            else{
                                echo "<a href='article.php?id=".$row['id']."'><div class='articlelist'>".$row['title']."</div></a>";
                            }
                        }
                        echo "</div>";
                        
                    }

                    $query = "SELECT * FROM `articles` WHERE id = '".mysqli_real_escape_string($link, $articleid)."'";

                    if($result = mysqli_query($link, $query)) {
                        
                        

                        while ($row = mysqli_fetch_array($result)) {
                            echo "<div class='content-wrapper-right'><div id='article-header'><div id='article-title'>".$row['title']."</div>";
                            
                            echo "<div id='article-sub'>".$row['preview']."</div>";

                            echo "<div id='article-author'>by ".$row['author']." / PortlandAdmirals.com </div>";

                            echo "<div id='article-date'>".$row['date']."</div></div>";

                            echo "<div id='article-body'>".$row['articlebody']."</div>";

                            $last = $articleid - 1;
                            $next = $articleid + 1;
                            
                            if ($last > 0){

                                echo "<a href='article.php?id=".$last."'><button id='lastbutton''>Older</button></a>";
                                
                            } else {

                                echo "<a href='#'><button id='lastbutton'>Older</button></a>";
                                
                                
                                
                            }
                            
                            if ($next <= $maxvalue){

                                echo "<a href='article.php?id=".$next."'><button id='nextbutton'>Newer</button></a></div>";
                                
                            } else{
                                echo "</div>";
                            }

                        }
                    }
                }


                ?></p>
        </div></div>
        <?php
            include '../php/footer2.php';
        ?>
	</body>	
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
    <script src="../js/megamenu.js" type="text/javascript"></script>
</html>