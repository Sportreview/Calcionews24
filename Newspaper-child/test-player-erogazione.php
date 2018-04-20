<?php

/*

Template Name: Test Player Erogazione Riky

*/

?>
<?php get_header(); ?>


<h1>Test player erogazione v15 @def</h1>

<div style="width:960px; margin:0 auto; padding:0;">
  <div id="slideplayer-container">
  <div id="slideplayer">
  <button class="slideplayer-chiudi" style="display: none;">
    <i class="fa fa-times-circle" aria-hidden="true"></i>
  </button>
    <div class="playerHolder"><div id="SportreviewSlidePlayer"></div></div>
  </div>
  </div>
</div>

<script>

var bitrates2 = {
  mp4: ["https://player.vimeo.com/external/189607578.sd.mp4?s=cc2a6f65174e041dcd1ea55193fc54965fb12b58&amp;profile_id=165"] // url video
};

/*
if (!isMobileNewtek && homepageURL=="http://www.calcionews24.com/") {
  var tagpreroll2 = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/hp/preroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
  var tagpostroll2 = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/hp/postroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
} else if (!isMobileNewtek) {
  var tagpreroll2 = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/altro/preroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
  var tagpostroll2 = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/altro/postroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
} else {
  var tagpreroll2 = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/mobile/preroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
  var tagpostroll2 = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/mobile/postroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
}
*/

<?php if(isset($_GET['postroll_vuoto'])): ?>
  var tagpreroll2 ='https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/single_ad_samples&ciu_szs=300x250&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ct%3Dskippablelinear&correlator='+Math.round(Math.random()*10000000000)+'';
  var tagpreroll2repeat = 'https://www.radiantmediaplayer.com/vast/tags/inline.xml';
  var tagpostroll2 ='https://pubadsX.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/single_ad_samples&ciu_szs=300x250&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ct%3Dskippablelinear&correlator='+Math.round(Math.random()*10000000000)+'';
<?php else: ?>
<?php if(isset($_GET['preroll_vuoto'])): ?>
  var tagpreroll2 ='https://pubadsX.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/single_ad_samples&ciu_szs=300x250&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ct%3Dskippablelinear&correlator='+Math.round(Math.random()*10000000000)+'';
  var tagpreroll2repeat = 'https://www.radiantmediaplayer.com/vast/tags/inlineX.xml';
  var tagpostroll2 ='https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/single_ad_samples&ciu_szs=300x250&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ct%3Dskippablelinear&correlator='+Math.round(Math.random()*10000000000)+'';
<?php else: ?>
<?php if(isset($_GET['livetag'])): ?>
var tagpreroll2 = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/hp/preroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
var tagpostroll2 = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/hp/postroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
var tagpreroll2repeat = tagpreroll2;
<?php else: ?>
  var tagpreroll2 ='https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/single_ad_samples&ciu_szs=300x250&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ct%3Dskippablelinear&correlator='+Math.round(Math.random()*10000000000)+'';
  var tagpreroll2repeat = 'https://www.radiantmediaplayer.com/vast/tags/inline.xml';
  var tagpostroll2 ='https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/single_ad_samples&ciu_szs=300x250&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ct%3Dskippablelinear&correlator='+Math.round(Math.random()*10000000000)+'';
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>

console.log("Tag preroll2: "+tagpreroll2);
console.log("Tag preroll2 REP: "+tagpreroll2repeat);
console.log("Tag postroll2: "+tagpostroll2);

var settings2 = {
  logo: 'https://www.calcionews24.com/wp-content/uploads/2016/08/logo-cn24-video.png', // logo
  logoLoc: 'https://www.calcionews24.com/', // logo url
  licenseKey: 'dG54dHd4aXh6aEAxNTA5NDU3', // chiave presa dal sito (cambia da sito a sito)
  pathToRmpFiles: '//cdn.sportreview.it/radiantmp/latest/',
  hasGa:true,
  trackingId:'UA-11488352-2',
  gaCategory:'Video Sidebar',
  bitrates: bitrates2,
  skin: 's5', // da s1 a s5
  delayToFade: 3000,
  autoplay: true,
  autoHeightMode: true,
  muted: true,
  loop: false,//Altrimenti il postroll non viene lanciato
  mutedAutoplayOnMobile: true,
  sharing: true,
  ads: true,
  adTagUrl: tagpreroll2,
  adMaxNumRedirects:6,
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
  poster: '' // eventuale immagine poster
};

var elementID2 = 'SportreviewSlidePlayer';
var rmpContainer2 = document.getElementById(elementID2);
var rmp2 = new RadiantMP(elementID2);

//Inizio Engine by Riccardo Mel
//Set up Variabili
var postRoll = 0;
var videoEnded  = 0;

//trigger Events
rmpContainer2.addEventListener('adcontentresumerequested', function () {
console.log("Engine by Riccardo Mel: resume request");
});
rmpContainer2.addEventListener('adcontentpauserequested', function () {
console.log("Engine by Riccardo Mel: pause request");
});

//AllAdsCompleted
rmpContainer2.addEventListener('adalladscompleted', function () {
console.log("Engine by Riccardo Mel: adalladscompleted");
if(videoEnded == 1 &&  postRoll==1){
  videoEnded =0; postRoll=0;
  rmp2.setLoop(false); //abilito postroll successivo intercettando workflow del player loop
  console.log("Engine by Riccardo Mel: RECALL PREROLL");
  rmp2.loadAds(tagpreroll2repeat);
}
console.log("Engine by Riccardo Mel: videoEnded: "+videoEnded+"PostRoll:"+postRoll);
});
//AllAdsCompleted

//Ended events
rmpContainer2.addEventListener('ended', function () {
    //Setto video ended
    videoEnded=1;
    //Se postroll è 0
    if(postRoll == 0){
      postRoll = 1;
      console.log("Engine by Riccardo Mel: POSTROLL");
      rmp2.loadAds(tagpostroll2);
      rmp2.setLoop(true);//Riavvio ciclo
    }
    console.log("Engine by Riccardo Mel: Ended Video - videoEnded:"+videoEnded);
});
//Ended

//AdError
rmpContainer2.addEventListener('aderror', function () {
console.log("Engine by Riccardo Mel: aderror: ");
if(videoEnded == 1 &&  postRoll==1){
  videoEnded =0; postRoll=0;
  rmp2.setLoop(false);  //abilito postroll successivo intercettando workflow del player loop
  console.log("Engine by Riccardo Mel: RECALL PREROLL");
  rmp2.loadAds(tagpreroll2repeat);
}
console.log("Engine by Riccardo Mel: videoEnded: "+videoEnded+" PostRoll:"+postRoll);
});
//AdError

rmpContainer2.addEventListener('adloaded', function () {
console.log("Engine by Riccardo Mel: adloaded");
});

rmpContainer2.addEventListener('ready', function () {
console.log("Engine by Riccardo Mel: ready");
});

rmpContainer2.addEventListener('pause', function () {
console.log("Engine by Riccardo Mel: pause");
});

rmp2.init(settings2);

</script>


<?php get_footer(); ?>
