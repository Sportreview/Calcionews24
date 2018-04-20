<?php

/*

Template Name: CheckJS

*/

?>

<?php 

$tag =  $_GET['tag'];
    $mobile =  $_GET['mobile'];

    if($mobile == 1 && $tag == "textlink"):
    //Textlink Bottom Mobile
    ?>

    <!-- Calcionews 300x250 - 2 adv -->
    <div class="4wNET">
        <script type="text/javascript">
            m3ads_system = "4WM";
            m3ads_partnernumber = 100987;
            m3ads_containerclass = "m3_container calcionews_300x250_2";
            m3ads_numberadverts = 2;
            m3ads_logoimagewidth = 120;
            m3ads_logoimageheight = 120;
            m3ads_cssurl = "http://static.4wmarketplace.com/publisher/css/ppnm/sportreview/calcionews_300x250_2.css";
            m3ads_subpartner = "calcionews24_art_bot_2_mobile";
            m3ads_customheader = 5;
        </script>
        <script type="text/javascript" src="//feed.4wnet.com/resources/scripts/jsAds-1.4.min.js"></script>
    </div>

    <?php

    endif;

    if($mobile == 0 && $tag == "textlink"):
    //Textlink Desktop
    ?>

    <!-- Calcionews 630x275 -->
    <div class="4wNET">
        <script type="text/javascript">
            m3ads_system = "4WM";
            m3ads_partnernumber = 100987;
            m3ads_containerclass = "m3_container calcionews_630x275";
            m3ads_numberadverts = 4;
            m3ads_logoimagewidth = 250;
            m3ads_logoimageheight = 188;
            m3ads_cssurl = "http://static.4wmarketplace.com/publisher/css/ppnm/sportreview/calcionews_630x275.css";
            m3ads_subpartner = "calcionews24_art_bot_4_desk";
            m3ads_customheader = 5;
        </script>
        <script type="text/javascript" src="//feed.4wnet.com/resources/scripts/jsAds-1.4.min.js"></script>
    </div>

    <?php
    endif;

    if($mobile == 1 && $tag == "mobiletopads"):
    //Textlink Top Mobile
    ?>

    <!-- Calcionews 320x100 -->
    <div class="4wNET">
        <script type="text/javascript">
            m3ads_system = "4WM";
            m3ads_partnernumber = 100987;
            m3ads_containerclass = "m3_container calcionews_320x100";
            m3ads_numberadverts = 1;
            m3ads_logoimagewidth = 70;
            m3ads_logoimageheight = 70;
            m3ads_cssurl = "http://static.4wmarketplace.com/publisher/css/ppnm/sportreview/calcionews_320x100.css";
            m3ads_subpartner = "calcionews24_art_top_1_mobile";
            m3ads_customheader = 5;
        </script>
        <script type="text/javascript" src="//feed.4wnet.com/resources/scripts/jsAds-1.4.min.js"></script>
    </div>

  <?php
    endif;

    if($mobile == 1 && $tag == "mobile_320_cn24"):
    //Textlink mobile_320_cn24
    ?>


        <script type="text/javascript">
        simply_publisher = 6778;
        simply_domain = 76809;
        simply_space = 185863;
        simply_ad_height = 50;
        simply_ad_width = 320;
        simply_callback = '';
        </script>
        

        <script>console.log("Mobile env - mobile_320_cn24 erogato");</script>


    <?php
    endif; 

    if($mobile == 1 && $tag == "mobile_300_250_cn24"):
    //Textlink mobile_300_250_cn24
    ?>


        <script type="text/javascript">
        simply_publisher = 6778;
        simply_domain = 76809;
        simply_space = 175211;
        simply_ad_height = 250;
        simply_ad_width = 300;
        simply_callback = '';
        </script>


        <script>console.log("Mobile env - mobile_300_250_cn24 erogato");</script>


    <?php
    endif; ?>



