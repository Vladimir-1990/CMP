<!DOCTYPE HTML>
<html>
<head>
	<meta name="author" content="sabo-vladimir@hotmail.com" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/bjqs.css" rel="stylesheet" type="text/css" />
    <link href="css/anything_slider.css" rel="stylesheet" type="text/css" />
    <link href="css/theme_metalic.css" rel="stylesheet" />
    <link href="css/theme_metalic2.css" rel="stylesheet" />
    <link href="css/theme_metalic3.css" rel="stylesheet" />

    <script src="js/jquery.js"></script>
    <script src="js/bjqs-1.3.js"></script>
    <script src="js/anything_slider.js"></script>
    <script src="js/functions.js"></script>
    
	<title>Cinemadic web</title>
    
    <script class="secret-source">
    $(document).ready(function($) {
        $('#banner-slide').bjqs({
            height      : 852,
            width       : 1150,
            responsive  : true,
            automatic   : false
        });  
    });
    </script>
      
    <script>
	$(function(){
        $('.thumbs').anythingSlider({
    		theme           : 'metallic',
    		easing          : 'easeIn',
            expand          : false,
            buildNavigation : false,
            buildStartStop  : false,
            showMultiple    : 6,
            resizeContents  : false,
        });
    });
    </script>
    
    <script>
	$(function(){
        $('.featured_slider').anythingSlider({
    		theme           : 'metallic2',
    		easing          : 'easeIn',
            expand          : false,
            buildNavigation : false,
            buildStartStop  : false,
            showMultiple    : 2,
            resizeContents  : false,
        });
    });
    </script>
    
    <script>
	$(function(){
        $('.video_list').anythingSlider({
    		theme           : 'metallic3',
    		easing          : 'easeIn',
            expand          : false,
            buildNavigation : false,
            buildStartStop  : false,
            showMultiple    : 6,
            resizeContents  : false,
        });
    });
    </script>
</head>

<body>
    <div id="wrapper">
        <div id="container">
            <header>
                <div id="logo">
                    <a href="index.php"><img src="images/logo.png" alt="logo" /></a>
                </div>
                
                <nav>
                    <ul>
                        <li><a <?php if($page == 'now_showing') echo "class='active'"; ?> href="now_showing.php">Now Showing</a></li>
                        <li><a <?php if($page == 'cooming_soon') echo "class='active'"; ?> href="coming_soon.php">Coming Soon</a></li>
                        <li><a <?php if($page == 'gallery') echo "class='active'"; ?> href="gallery.php">Gallery</a></li>
                        <li><a <?php if($page == 'cmp') echo "class='active'"; ?> href="cmp_tv.php">CMP TV</a></li>
                        <li><a <?php if($page == 'about') echo "class='active'"; ?> href="about.php">About CMP</a></li>
                        <li><a <?php if($page == 'contact') echo "class='active'"; ?> href="contact.php">Contact Us</a></li>
                    </ul>
                </nav>
                
                <div id="header-social">
                    <ul>
                        <li><a href="#"><img src="images/twitter.png" alt="twitter" /></a></li>
                        <li><a href="#"><img src="images/facebook.png" alt="twitter" /></a></li>
                        <li><a href="#"><img src="images/youtube.png" alt="twitter" /></a></li>
                        <li><a href="#"><img src="images/instagram.png" alt="twitter" /></a></li>
                    </ul>
                </div>
            
            </header>