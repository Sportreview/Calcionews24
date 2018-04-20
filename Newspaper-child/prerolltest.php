<?php
/*
Template Name: Preroll test
*/
?>
<?php get_header();?>

  <div class="td-container">
   <div id="rmpPlayer">Caricamento Player...</div>
   <?php if($_GET['tag'] == '4w'): ?>
       <script>
          var testTag = 'https://optimized-by.4wnetwork.com/impression.php?code=154641;76809;6778;0&from=';
       </script>
  <?php
  else:
  if($_GET['tag'] == 'dfp'): ?>
    <script>
      var testTag = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/165059490/CalcioNews24_Preroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
    </script>
  <?php
  else:
  if($_GET['tag'] == 'sportnetwork'): ?>
      <script>
          var testTag = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/altro/preroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
      </script>
   <?php
   else:
   if($_GET['tag'] == 'sportnetworkMobile'): ?>
      <script>
          var testTag = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/mobile/preroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
      </script>

   <?php
   else:
  if($_GET['tag'] == 'sportnetworkHome'): ?>
      <script>
             var testTag =  'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/hp/preroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
      </script>
   <?php else: ?>
     <script>
        alert("Seleziona un tag da testare come parametro GET");
      </script>
   <?php endif; ?>
   <?php endif; ?>
   <?php endif; ?>
   <?php endif; ?>
   <?php endif; ?>

   <script>
   //Url video qui.
   //Nel caso usi adaptive usa questo codice:
   //var bitrates = { hls: 'video_playlists[0]' };
    var bitrates= {
      hls: 'https://player.vimeo.com/external/86151335.m3u8?s=0415f133f63fc77deafd38b680588ea604cc5e09' // url video
    };
    var settings = {
      logo: '<?php echo site_url(); ?>/wp-content/uploads/2016/08/logo-cn24-video.png',
      logoLoc: '<?php echo site_url(); ?>/',
      licenseKey: 'dG54dHd4aXh6aEAxNTA5NDU3',
      pathToRmpFiles: '//cdn.sportreview.it/radiantmp/latest/',
      bitrates: bitrates,
      autoHeightMode:true,
      permanentMuted:false,
      muted:false,
      mutedAutoplayOnMobile: true,
      delayToFade: 3000,
      autoplay:true,
      ads: true,
      adTagUrl: testTag,
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
      }
    };
    var elementID = 'rmpPlayer';
    var rmp = new RadiantMP(elementID);
    var rmpContainer = document.getElementById(elementID);

    //AdError
    rmpContainer.addEventListener('aderror', function () {
    console.log("Engine by Riccardo Mel: aderror: ");
    });
    //AdError
    //adloaded
    rmpContainer.addEventListener('adloaded', function () {
    console.log("Engine by Riccardo Mel: adloaded: ");
    });
    //adloaded

    //Start!!!!!
    rmp.init(settings);
    //Vietata la riproduzione
    //Info: info@riccardomel.com
   </script>

 </div><!-- container -->

<?php get_footer();?>
