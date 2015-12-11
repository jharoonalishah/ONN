<?php
define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
define('SRC', ROOT . DS . 'src');
define('PHP', SRC . DS . 'php');

require PHP . DS . 'classes' . DS . 'Import.php';

Import::classes('SimpleHtmlDOMNode');

// Annahar Begin:-----------------------------------------------------
$annahar_web = 'http://en.annahar.com/';
$html = file_get_html($annahar_web);
$latest_news = $html->find(".column3 ul");

$annahar = '';

foreach ($latest_news as $news){
   $annahar .= $news.'<br />';
}
// Annahar End:-------------------------------------------------------


// Aljazzera Begin:---------------------------------------------------
$aljazzera_web = 'http://www.aljazeera.com/';
$html = file_get_html($aljazzera_web);
$latest_news = $html->find(".blurb-wide");

$aljazzera = '';

foreach ($latest_news as $news){
   $aljazzera .= $news;
}
// Aljazzera End:-----------------------------------------------------

 // Asahi Begin:---------------------------------------------------
$asahi_web = 'http://www.asahi.com/english/list/';
$html = file_get_html($asahi_web);

$latest_news = $html->find(".SectionFst");

$asahi = '';

foreach ($latest_news as $news){
   $asahi .= $news;
}
// Asahi End:-----------------------------------------------------

// CNN Begin:---------------------------------------------------
$cnn_web = 'http://edition.cnn.com/';
$html = file_get_html($cnn_web);

$latest_news = $html->find(".zn__containers ul");

$cnn = '';

foreach ($latest_news as $news){
   $cnn .= $news;
   $cnn = str_replace("CNN Interview", "", $cnn);
   $cnn = str_replace("Top stories", "", $cnn);
   $cnn = strip_tags($cnn, "<article> <a> <h2>");
}
// CNN End:-----------------------------------------------------
?>

<html>
    <head>
        
        <title>ONN - One News Network</title>
        
        <style>
            body{
                font-size : 12px;
                color: #2b2b2b;
                padding: 0;
                margin: 0;
            }
            a{
                font-size: 16px;
            }
            #top{
                width: 100%;
                height: 300px;
                background-color: yellow;
                clear:both;
                display: none;
            }
            
            #annahar, #asahi, #cnn, #jazzera{
                width: 20%;
                height: 400px;
                padding: 10px;
                float: left;
            }
            #cnn a{
                color : #990033;
            }
            #asahi a{
                color : #2b2b2b;
            }
            #jazzera a{
                color : #c08f0c;
            }
            #top .url-list{
                width: 300px;
                height: 100%;
                float: left;
                background-color: green;
            }
            .clear-b{
                clear:both;
            }
            
            #bottom{
                width: 100%;
                height: 400px;
                background-color: #83aaaa;
                display: none;
            }
            
            img{
                border: 0;
                width: 100px;
            }
            ul{
                padding: 0;
                margin: 0;
            }
            ul li{
                list-style-type: none;
            }
            ul li a{
                font-size: 12px;
                color: #02c0f3;
            }
        </style>
    </head>
    
    <body>
        <div id="wrapper">
                        
            <!-- Add new urls -->
            <div id="top">
                <div class="url-list">
                    
                </div>
            </div>
            
            <!-- Annahar News section -->
            <div id="annahar"> 
                <img src="http://static.annahar.com/interface/english/images/logo.png" width="237" alt="" class=""/><p />
                 <?php echo $annahar;?>
            </div>
            
            <!-- Al-Jazeera News Section -->
            <div id="jazzera"> 
                <img src="http://www.aljazeera.com/mritems/images/site/AljazeeraLogo.gif" />
                <?php echo $aljazzera;?></div>
            
            <!-- Asahi News Section -->
            <div id="asahi"> 
            <img src="http://www.asahicom.jp/images/logo@2x.png" alt="asahi news" width="110" height="34"/>
                <?php echo $asahi;?>
            </div>
            
            <!-- CNN News Section -->
            <div id="cnn">
                <img src="http://edition.i.cdn.cnn.com/.a/1.224.2/assets/logo_cnn_badge_2up.png" width="70" height="70" />
                <?php echo $cnn;?>
            </div>
            
            
            <div class="clear-b"></div>
            
            <!-- Show parsed url -->
            <div id="bottom">
                
            </div>
        </div>
        
        <script type="text/javascript">
            var timer = setInterval(function(){refreshBrowser()}, 300000); // 5 min
            
            function refreshBrowser(){
                window.location.reload();
            }
        </script>
    </body>
</html>
