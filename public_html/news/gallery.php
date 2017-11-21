<!DOCTYPE html>
<html>
	<head>
	
		<title>Official Portland Admirals Website</title>
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Yantramanav:900|Roboto|Anton" rel="stylesheet">
		<link rel="shortcut icon" href="/Admirals Secondary.jpg">
        
        <link rel="stylesheet" href="../css/template.css" type="text/css">
        <link rel="stylesheet" href="gallery.css" type="text/css">
        <script type="text/javascript" src="http://slideshow.triptracker.net/slide.js"></script>
        <script type="text/javascript">
            var viewer = new PhotoViewer();
            viewer.add('../img/admiralslogo.png');
            viewer.add('../img/Admirals Secondary.jpg');
            viewer.add('../img/secondarydark.jpg');
            viewer.add('https://s27.postimg.org/71fjxjlgj/Three_Jer.jpg');
        </script>
        
	</head>

    
    
	<body>

        
        <?php
            include '../php/header2.php';
        ?>
        
        <div id="site-content" class="wide-layout container">
            <div class='wrapper'>
                <div id='gallery-body'>
                    <a href="javascript:void(viewer.show(0))"><img src='../img/admiralslogo.png'></a>
                    
                    <a href="javascript:void(viewer.show(1))"><img src='../img/Admirals Secondary.jpg'></a>
                    
                    <a href="javascript:void(viewer.show(2))"><img src='../img/secondarydark.jpg'></a>
                    
                    <a href="javascript:void(viewer.show(3))"><img src='https://s27.postimg.org/71fjxjlgj/Three_Jer.jpg'></a>
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