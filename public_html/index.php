<!DOCTYPE html>
<html>
	<head>
	
		<title>Official Portland Admirals Website</title>
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Yantramanav:900|Roboto" rel="stylesheet">
		<link rel="shortcut icon" href="Admirals Secondary.jpg">
        
        <link rel="stylesheet" href="css/template.css" type="text/css">
        <link rel="stylesheet" href="homepage.css" type="text/css">
        <link rel="stylesheet" href="js/unslider-master/dist/css/unslider.css" type="text/css">
        <link rel="stylesheet" href="js/unslider-master/dist/css/unslider-dots.css" type="text/css">
	
	</head>

    
    
	<body>

        

        
        <?php
        include 'php/header.php';
        ?>
        
        <div id="site-content" class="wide-layout container">
            <div class='wrapper'>
                <div id='homepage-body'>
                        <div class="my-slider">
                            <ul>
                                <li><div class='slide'><div class='imgcontainer'><img src='https://s27.postimg.org/71fjxjlgj/Three_Jer.jpg'></div><div class='textcontainer'>Admirals unveil new third jersey designs, courtesy of mdubz. <a href='news/article.php?id=2'>Read More...</a></div></div></li>
                                <li><div class='slide'><div class='imgcontainer'><img src='https://res.cloudinary.com/teepublic/image/private/s--UNkyg-is--/t_Resized%20Artwork/c_fit,w_470/c_crop,g_north_west,h_626,w_470,x_0,y_0/g_north_west,u_upload:v1462829013:production:blanks:cau9y2yr6rnvk9qkrf1h,x_-395,y_-325/b_rgb:eeeeee/c_limit,f_jpg,h_630,q_90,w_630/v1487696619/production/designs/1249045_1.jpg'></div><div class='textcontainer'>Admirals launch merch store - fan apparel available through teepublic.com <a href='news/article.php?id=6'>Read More...</a></div></div></li>
                                <li><div class='slide'><div class='imgcontainer'><img src='http://i.imgur.com/Xga6tpz.png'></div><div class='textcontainer'><a href='http://theshl.b1.jcink.com/index.php'>Join the Simulation Hockey League!</a></div></div></li>
                            </ul>
                        </div><div>
                    
                    <?php
                        
                        $link = mysqli_connect("xxxxxxx", "xxxxxxx","xxxxxxx","xxxxxxx");
                    
                        if(mysqli_connect_error()) {

                            echo "There was an error connecting to the database."; 
                            
                        } else {
                            
                            $query = "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 5";

                            if($result = mysqli_query($link, $query)){
                                echo "<div class='content-wrapper-left'>";
                                while ($row = mysqli_fetch_array($result)){
                                    echo "<div class='articlelist'><div class='date'><img class='articlelogo' src='img/admiralslogo.png'><br>".$row['date']."</div><div class='title'><a href='news/article.php?id=".$row['id']."'>".$row['title']."</div></a><div class='secondary'><div class='preview'>".$row['preview']."</div></div><a href='news/article.php?id=".$row['id']."'><div class='readmore'>Read More</div></a></div>";
                                }
                                echo "</div>";

                            }

                        }
                    ?>
                    <div class='content-wrapper-right'><a class="twitter-timeline" data-width="400" data-height="600" data-dnt="true" data-link-color="#FCB616" href="https://twitter.com/AdmiralsSHL">Tweets by AdmiralsSHL</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script></div></div>
                </div>
            </div>
        </div>
        <?php
            include 'php/footer.php';
        ?>
        <!-- There'll be a load of other stuff here -->
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="js/unslider-master/src/js/unslider.js"></script> <!-- but with the right path! -->
        	<script>
		jQuery(document).ready(function($) {
			$('.my-slider').unslider({
                autoplay: true, delay: 7000, keys: false, animateHeight: true
            });
		});
	</script>
	</body>	
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
    <script src="js/megamenu.js" type="text/javascript"></script>
</html>