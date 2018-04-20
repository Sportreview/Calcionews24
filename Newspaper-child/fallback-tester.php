<?php
/*
Template Name: Fallback tester
*/
?>
<?php get_header();?>

<div class="td-container">
 <div id="rmpPlayer">Caricamento Player...</div>
 <script>

  function ChiudiPlayer(){
    if(!closedPlayer){
      jQuery(".chiudi_player").hide();
      jQuery("#video-onslide").removeClass("follow-fixed-player").addClass("follow-holder-player");
      rmpSidebar.resize();
      jQuery(".sportreview-heading-video").removeClass("slideout");
      closedPlayer = true;
    }//closedPlayer
  }//ChiudiPlayer

  function RiposizionaPlayer(){
    jQuery(".chiudi_player").hide();
    jQuery("#video-onslide").removeClass("follow-fixed-player").addClass("follow-holder-player");
    rmpSidebar.resize();
    jQuery(".sportreview-heading-video").removeClass("slideout");
  }//RiposizionaPlayer

  function PosizionaPlayer(){
    if(!closedPlayer){
        jQuery(".chiudi_player").css("display","inline-block");
        jQuery(".sportreview-heading-video").addClass("slideout");
        jQuery("#video-onslide").removeClass("follow-holder-player").addClass("follow-fixed-player");
        rmpSidebar.resize();
    }//closedPlayer
  }//PosizionaPlayer


  //Librerie JS is mobile
  !function(a){var b=/iPhone/i,c=/iPod/i,d=/iPad/i,e=/(?=.*\bAndroid\b)(?=.*\bMobile\b)/i,f=/Android/i,g=/(?=.*\bAndroid\b)(?=.*\bSD4930UR\b)/i,h=/(?=.*\bAndroid\b)(?=.*\b(?:KFOT|KFTT|KFJWI|KFJWA|KFSOWI|KFTHWI|KFTHWA|KFAPWI|KFAPWA|KFARWI|KFASWI|KFSAWI|KFSAWA)\b)/i,i=/Windows Phone/i,j=/(?=.*\bWindows\b)(?=.*\bARM\b)/i,k=/BlackBerry/i,l=/BB10/i,m=/Opera Mini/i,n=/(CriOS|Chrome)(?=.*\bMobile\b)/i,o=/(?=.*\bFirefox\b)(?=.*\bMobile\b)/i,p=new RegExp("(?:Nexus 7|BNTV250|Kindle Fire|Silk|GT-P1000)","i"),q=function(a,b){return a.test(b)},r=function(a){var r=a||navigator.userAgent,s=r.split("[FBAN");if("undefined"!=typeof s[1]&&(r=s[0]),s=r.split("Twitter"),"undefined"!=typeof s[1]&&(r=s[0]),this.apple={phone:q(b,r),ipod:q(c,r),tablet:!q(b,r)&&q(d,r),device:q(b,r)||q(c,r)||q(d,r)},this.amazon={phone:q(g,r),tablet:!q(g,r)&&q(h,r),device:q(g,r)||q(h,r)},this.android={phone:q(g,r)||q(e,r),tablet:!q(g,r)&&!q(e,r)&&(q(h,r)||q(f,r)),device:q(g,r)||q(h,r)||q(e,r)||q(f,r)},this.windows={phone:q(i,r),tablet:q(j,r),device:q(i,r)||q(j,r)},this.other={blackberry:q(k,r),blackberry10:q(l,r),opera:q(m,r),firefox:q(o,r),chrome:q(n,r),device:q(k,r)||q(l,r)||q(m,r)||q(o,r)||q(n,r)},this.seven_inch=q(p,r),this.any=this.apple.device||this.android.device||this.windows.device||this.other.device||this.seven_inch,this.phone=this.apple.phone||this.android.phone||this.windows.phone,this.tablet=this.apple.tablet||this.android.tablet||this.windows.tablet,"undefined"==typeof window)return this},s=function(){var a=new r;return a.Class=r,a};"undefined"!=typeof module&&module.exports&&"undefined"==typeof window?module.exports=r:"undefined"!=typeof module&&module.exports&&"undefined"!=typeof window?module.exports=s():"function"==typeof define&&define.amd?define("isMobile",[],a.isMobile=s()):a.isMobile=s()}(this);
  //Librerie JS is mobile


    //By Riccardo Mel
    //V1.6

    console.log("Engine by Riccardo Mel:  Engine Sidebar - Versione 1.6 ");


    //Variabili utenti
    var DebugCustom = true;
    if (isMobile.any) {
      var attivaLoop = false;
      var attivaPostRoll = false;
    }else {
      var attivaLoop = true;
      var attivaPostRoll = true;
    }
    var permanentMuted = false;
    var mobileAudioChanger = false;
    var autoplayMobile = true;
    var mutedAudio = true;
    var hoverAudio = true;


    var testTag = 'https://www.radiantmediaplayer.com/vast/tags/inline-linear.xml';
    var emptyTag = 'https://www.radiantmediaplayer.com/vast/tags/empty.xml';
    var postrollTagSidebar = emptyTag;

    //Variabili contenuti
    var poster = '';
    //Imposto array Waterfall
    var waterfallArraySidebar = [
     testTag,
     testTag
   ];

   var video_playlists =[
      'https://player.vimeo.com/external/86151335.m3u8?s=0415f133f63fc77deafd38b680588ea604cc5e09'
   ];

   var bitratesSidebar = {
     hls: ''+video_playlists[0]+'' // url video
   };

    var settings = {
      logo: '<?php echo site_url(); ?>/wp-content/uploads/2016/08/logo-cn24-video.png',
      logoLoc: '<?php echo site_url(); ?>/',
      licenseKey: 'dG54dHd4aXh6aEAxNTA5NDU3',
      pathToRmpFiles: '//cdn.sportreview.it/radiantmp/latest/',
      bitrates: bitratesSidebar,
      autoHeightMode:true,
      delayToFade: 3000,
      autoplay:true,
      ads: true,
      adTagUrl: emptyTag,
      adCountDown: true,
      labels: {
       ads: {
         controlBarCustomMessage: 'Messaggio promozionale'
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
      endOfVideoPoster: poster,
      poster: poster
    };
    var elementIDSidebar = 'rmpPlayer';
    var rmpSidebar = new RadiantMP(elementIDSidebar);
    var rmpContainerSidebar = document.getElementById(elementIDSidebar);


    //NON MODIFICARE DA QUI IN POI
    //Inizio Engine by Riccardo Mel
    //Set up Variabili di sistema
    var postRoll = 0;
    var videoEnded  = 0;
    var waterfallIndex = 0;
    var adError = false;
    var playlistItem = 0;
    var lastItem = 0;
    var closedPlayer = false;

    //Debug opzionale
    for (var i = 0; i < video_playlists.length; i++) {
    if(DebugCustom) { console.log("Video playlist item: "+video_playlists[i]); }
    }

    //trigger Events
    rmpContainerSidebar.addEventListener('adcontentresumerequested', function () {
    /*if (adError) {
      return;
    }*/
    //Resetto ciclo waterfall - opzionale
    waterfallIndex=0;
    if(DebugCustom) { console.log("Engine by Riccardo Mel: resume request"); }
    });

    rmpContainerSidebar.addEventListener('adcontentpauserequested', function () {
    adError = false;
    if(DebugCustom) { console.log("Engine by Riccardo Mel: pause request"); }
    });

    //AllAdsCompleted
    rmpContainerSidebar.addEventListener('adalladscompleted', function () {
      if(videoEnded == 1 &&  postRoll==1){
        videoEnded =0; postRoll=0;
        rmpSidebar.setLoop(false); //abilito postroll successivo intercettando workflow del player loop
        if(DebugCustom) { console.log("Engine by Riccardo Mel: RECALL PREROLL"); }
        rmpSidebar.loadAds(emptyTag);
      }
      if(DebugCustom) { console.log("Engine by Riccardo Mel: adalladscompleted"); }

      //Riposiziono player
      RiposizionaPlayer();

      //Metto in pausa se mobile
      if (isMobile.any) { rmpSidebar.stop(); }

    });
    //AllAdsCompleted

    //Ended events
    rmpContainerSidebar.addEventListener('ended', function () {
      //Setto video ended
      videoEnded=1;
        // Playlist Custom
        playlistItem++;
        if(DebugCustom) { console.log(playlistItem); }
        if (typeof video_playlists[playlistItem] !== 'undefined') {
          rmpSidebar.setSrc(video_playlists[playlistItem]);
          if(DebugCustom) { console.log("Play:"+video_playlists[playlistItem]); }
        } else {
          lastItem = 1;
          playlistItem = 0;
          rmpSidebar.setSrc(video_playlists[0]);
          if(DebugCustom) { console.log("playdefault video"); }
        }
        // Playlist Custom
    });
    //Ended

    //srcchanged
    rmpContainerSidebar.addEventListener('srcchanged', function () {
    //Se Loop non attivo
    if(!attivaLoop && lastItem == 1){ lastItem = 0; rmpSidebar.stop(); }else{

      if(attivaPostRoll){
        if(postRoll == 0){
          postRoll=1;
          if(DebugCustom) { console.log("Engine by Riccardo Mel: POSTROLL"); }
          rmpSidebar.loadAds(postrollTagSidebar);
        }//postRoll isset
      } else {
        rmpSidebar.loadAds(emptyTag);
      }//attivaPostRoll

    }//else
    //Se Loop non attivo
    if(DebugCustom) { console.log("Engine by Riccardo Mel: srcchanged"); }
    });
    //srcchanged

    //AdError
    rmpContainerSidebar.addEventListener('aderror', function () {
    if(DebugCustom) { console.log("Engine by Riccardo Mel: aderror: "); }
        adError = true;
        waterfallIndex++;
          if (typeof waterfallArraySidebar[waterfallIndex] !== 'undefined') {
            if(DebugCustom) {  console.log('new waterfall index is ' + waterfallIndex); }
            if(DebugCustom) {  console.log('loadAds waterfall ad at ' + waterfallArraySidebar[waterfallIndex]); }
            rmpSidebar.loadAds(waterfallArraySidebar[waterfallIndex]);
          } else {
              if(DebugCustom) { console.log("Fallback finiti");}
              if (isMobile.any) { rmpSidebar.stop(); }//Metto in pausa se mobile
          }

          //Riposiziono player
          RiposizionaPlayer();

          //Metto in pausa se mobile
          if (isMobile.any) { rmpSidebar.stop(); }

    });
    //AdError

    rmpContainerSidebar.addEventListener('adloaded', function () {
      //Posiziono player
      PosizionaPlayer();
      if(DebugCustom) { console.log("Engine by Riccardo Mel: adloaded"); }
    });


    rmpContainerSidebar.addEventListener('pause', function () {
      if(DebugCustom) { console.log("Engine by Riccardo Mel: pause"); }
      if(!attivaLoop) {  rmpSidebar.showPoster(); }
      if(isMobile.any) { rmpSidebar.stop(); rmpSidebar.showPoster(); }
    });

    if(mobileAudioChanger){
    rmpContainerSidebar.addEventListener('ready', function() {
      if(DebugCustom) { console.log('player ready'); }
           if (isMobile.any) {
          //Mobile
            if(DebugCustom) { console.log('Mobile'); }
            rmpSidebar.setVolume(0);//imposto volume
          } else {
          //Desktop
            if(DebugCustom) { console.log('Desktop'); }
            rmpSidebar.setVolume(0.5);//imposto volume
          }//if mobile
    });//playerReady
    }//mobileAudioChanger

    //Fix completion rate - Opzionale ma consigliato
    rmpContainerSidebar.addEventListener('adclick', function () {
      rmpSidebar.play();
      if(DebugCustom) { console.log('Engine by Riccardo Mel: adclick'); }
    });
    //Fix completion rate - Opzionale ma consigliato

    if(hoverAudio){
    jQuery(document).ready(function() {
              jQuery("#SidebarAjax_VideoHolder").mouseenter(
              function(){
              if(DebugCustom) { console.log('Hover: Audio ON'); }
              rmpSidebar.setMute(false);
              });

              jQuery("#SidebarAjax_VideoHolder").mouseleave(
              function(){
              if(DebugCustom) { console.log('Leave: Audio OFF'); }
              rmpSidebar.setMute(true);
              });
    });//FINE DOM
  }//hoverAudio

  //Start!!!!!
  rmpSidebar.init(settings);
  //Vietata la riproduzione
  //Info: info@riccardomel.com
 </script>

</div><!-- container--->


<?php get_footer();?>
