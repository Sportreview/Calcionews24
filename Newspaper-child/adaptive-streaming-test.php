<?php
/*
Template Name: Adaptive Streaming Test
*/
?>
<!doctype html >
<!--[if gt IE 8]><!--> <html lang="it-IT" prefix="og: http://ogp.me/ns#"> <!--<![endif]-->
  <head>
    <title>Adaptive Streaming Test</title>
    <meta charset="UTF-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow" />
    <script src="http://www.calcionews24.com/wp-content/themes/Newspaper-child/js/isMobileNewtek.js"></script>
    <script src="//cdn.sportreview.it/radiantmp/latest/js/rmp.min.js"></script>
  </head>

<div class="playerHolder"><div id="SportreviewPlayer"></div></div>

<script>

  autoplay = false;
  repeat = true;
  mute = true;

    var bitrates = {
      hls: 'https://player.vimeo.com/external/208988336.m3u8?s=0743798eb1c914402f19ee94c301400b139a0997'
    };

    if (!isMobileNewtek) {
      var tagpreroll = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/altro/preroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
      var tagpostroll = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/altro/postroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
      var tagprerollrepeat = tagpreroll;
    } else {
      var tagpreroll = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/mobile/preroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
      var tagpostroll = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/mobile/postroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
      var tagprerollrepeat = tagpreroll;
    }

    console.log("ARTICLE - Tag preroll: "+tagpreroll);
    console.log("ARTICLE - Tag preroll REP: "+tagprerollrepeat);
    console.log("ARTICLE - postroll: "+tagpostroll);

    var settings = {
      logo: 'http://www.calcionews24.com/wp-content/uploads/2016/08/logo-cn24-video.png',
      logoLoc: 'http://www.calcionews24.com/',
      pathToRmpFiles: '//cdn.sportreview.it/radiantmp/latest/',
      licenseKey: 'dG54dHd4aXh6aEAxNTA5NDU3',
      gaTrackingId:'UA-11488352-2',
      gaCategory:'Video Articolo',
      bitrates: bitrates,
      skin:'s1',
      delayToFade: 3000,
      debug:false,
      autoplay: autoplay,
      autoHeightMode: true,
      muted: mute,
      loop: false,
      mutedAutoplayOnMobile:true,
      sharing: true,
      ads: true,
      adTagUrl: tagpreroll,
      adCountDown:true,
      labels: {
        ads: {
          controlBarCustomMessage: 'Messaggio pubblicitario'
        },
        hint: {
          sharing: 'Condividi',
          quality: 'Qualità',
          speed: 'Velocità',
          captions: 'Sottotitoli',
          audio: 'Audio',
          cast: 'Cast',
          playlist: 'Playlist'
        },
        error: {
          customErrorMessage: 'Il contenuto video non è al momento disponibile.',
          noSupportMessage: 'Manca il supporto per la riproduzione dei video.',
          noSupportDownload: 'Puoi scaricare il video qui.',
          noSupportInstallChrome: 'E\' necessario aggiornare Google Chrome per visualizzare questo contenuto.'
        }
      },
      //poster: '<?php //echo $cover_img; ?>' // eventuale immagine poster
    };

    var elementID = 'SportreviewPlayer';
    var rmpContainer = document.getElementById(elementID);
    var rmp = new RadiantMP(elementID);


    //Inizio Engine by Riccardo Mel
    //Set up Variabili
    var postRoll_article = 0;
    var videoEnded_article  = 0;

    //trigger Events
    rmpContainer.addEventListener('adcontentresumerequested', function () {
    console.log("ARTICLE - Engine by Riccardo Mel: resume request");
    });
    rmpContainer.addEventListener('adcontentpauserequested', function () {
    console.log("ARTICLE - Engine by Riccardo Mel: pause request");
    });

    //AllAdsCompleted
    rmpContainer.addEventListener('adalladscompleted', function () {
    console.log("ARTICLE - Engine by Riccardo Mel: adalladscompleted");
    if(videoEnded_article == 1 &&  postRoll_article==1){
      videoEnded_article =0; postRoll_article=0;
      rmp.setLoop(false); //abilito postroll successivo intercettando workflow del player loop
      console.log("ARTICLE - Engine by Riccardo Mel: RECALL PREROLL");
      rmp.loadAds(tagprerollrepeat);
    }
    console.log("ARTICLE - Engine by Riccardo Mel: videoEnded: "+videoEnded_article+"PostRoll:"+postRoll_article);
    document.getElementById('slideplayer-container').setAttribute('style', 'width:100%; position:relative; top:inherit; right:inherit; z-index:1; box-shadow: none;');
    });
    //AllAdsCompleted

    //Ended events
    rmpContainer.addEventListener('ended', function () {
        //Setto video ended
        videoEnded_article=1;
        //Se postroll è 0
        if(postRoll_article == 0){
          postRoll_article = 1;
          console.log("ARTICLE - Engine by Riccardo Mel: POSTROLL");
          rmp.loadAds(tagpostroll);
          rmp.setLoop(true);//Riavvio ciclo
        }
        console.log("ARTICLE - Engine by Riccardo Mel: Ended Video - videoEnded:"+videoEnded_article);
    });
    //Ended

    //AdError
    rmpContainer.addEventListener('aderror', function () {
    console.log("ARTICLE - Engine by Riccardo Mel: aderror: ");
    if(videoEnded_article == 1 &&  postRoll_article==1){
      videoEnded_article =0; postRoll_article=0;
      rmp.setLoop(false);  //abilito postroll successivo intercettando workflow del player loop
      console.log("ARTICLE - Engine by Riccardo Mel: RECALL PREROLL");
      rmp.loadAds(tagprerollrepeat);
    }
    console.log("ARTICLE - Engine by Riccardo Mel: videoEnded: "+videoEnded_article+" PostRoll:"+postRoll_article);
    });
    //AdError

    rmpContainer.addEventListener('adloaded', function () {
    console.log("ARTICLE - Engine by Riccardo Mel: adloaded");
    });

    rmpContainer.addEventListener('ready', function () {
    console.log("ARTICLE - Engine by Riccardo Mel: ready");
    });

    rmpContainer.addEventListener('pause', function () {
    console.log("ARTICLE - Engine by Riccardo Mel: pause");
    });

    rmpContainer.addEventListener('adclick', function () {
    console.log("ARTICLE - Engine by Riccardo Mel: adclick");
    rmp.play();
    });

    //fix fullscreen bug
    function FullScreenOnFix() {
      document.getElementById("at4-share").style.display = "none !important";
    }
    rmpContainer.addEventListener('enterfullscreen', FullScreenOnFix);

    function FullScreenOffFix() {
      document.getElementById("at4-share").style.display = "inherit";
    }
    rmpContainer.addEventListener('exitfullscreen', FullScreenOffFix);
    //fix fullscreen bug

    //Init Player
    rmp.init(settings);

</script>


  </body>
</html>