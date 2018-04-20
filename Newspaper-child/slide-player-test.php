<?php 
/*
Template Name: Slide Player Test
*/
?>
<!DOCTYPE html>
<html>
<head>
  <title>Slide Player</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

  <script src="https://www.calcionews24.com/wp-content/themes/Newspaper-child/js/isMobileNewtek.js"></script>
  <script src="https://cdn.radiantmediatechs.com/rmp/v3/latest/js/rmp.min.js"></script>

  <meta name="robots" content="noindex,nofollow" />

  <style type="text/css">
    .slided {
      position: fixed;
      width: 360px;
      bottom: 300px;
      right: 20px;
    }
    .playershadow {
      box-shadow: 4px 4px 3px #888;
    }
    .slideplayer-chiudi {
      border: none;
      padding: 0px;
      background: none;
      color: #fff;
      position: absolute;
      top:1px;
      left: 3px;
      z-index: 20;
    }
    .slideplayer-chiudi .fa {
      font-size: 16px;
    }
    .slideplayer-chiudi .fa:hover {
      color: red;
      transition: color 0.5s ease-in-out;
    }
  </style>

</head>


<body>

<div class="container">
  <div class="row">
  <h1 class="text-center">Prova slider player</h1>
    <div class="col-md-8">
    <h2>Testo segnaposto</h2>
    <p class="text-justify">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

    <div id="blocco">
      <div id="blocco-interno" style="height: 300px; width: 100%; background: #efefef;"></div>
      <button id="trigger" class="btn btn-default btn-lg btn-block" style="display: none;">Go!</button>
    </div>

    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    <h2>Testo segnaposto</h2>
    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    <h2>Testo segnaposto</h2>
    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    <h2>Testo segnaposto</h2>
    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

    </div>
    <div class="col-md-4">
      <h2>Player</h2>

      <div id="slideplayer-container">
        <div id="slideplayer">
        <button class="slideplayer-chiudi" style="display: none;">
          <i class="fa fa-times-circle" aria-hidden="true"></i>          
        </button>
          <div class="playerHolder"><div id="SportreviewPlayer"></div></div>
        </div>
      </div>
      <script type="text/javascript">
        var adspresente = false;
      </script>
      <script>
        var bitrates = {
          mp4: ["https://player.vimeo.com/external/189607578.sd.mp4?s=cc2a6f65174e041dcd1ea55193fc54965fb12b58&amp;profile_id=165"]
        };

        var SN = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/test/preroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
        var Fourw = 'https://optimized-by.4wnetwork.com/impression.php?code=154641;76809;6778;0&from=';
        var Mediamatic = 'https://ad.360yield.com/advast?p=885170&w=16&h=9';
      
        var fallbacks = [
          Fourw
        ];

        var settings = {
          logo: 'https://www.calcionews24.com/wp-content/uploads/2016/08/logo-cn24-video.png',
          logoLoc: 'https://www.calcionews24.com/',
          licenseKey: 'dG54dHd4aXh6aEAxNTA5NDU3',
          bitrates: bitrates,
          skin: 's5', // da s1 a s5
          delayToFade: 3000,
          debug: true,
          autoplay: true,
          autoHeightMode: true,
          muted: true,
          loop: true,
          mutedAutoplayOnMobile: true,
          sharing: true,
          ads: true,
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
          adTagUrl: SN, // tag firstcall
          adTagWaterfall: fallbacks, // array fallbacks
          poster: 'https://i.vimeocdn.com/video/599986053_960x540.jpg?r=pad' // eventuale immagine poster
        };
               
        var elementID = 'SportreviewPlayer';
        var rmpContainer = document.getElementById(elementID);
        var rmp = new RadiantMP(elementID);
        rmp.init(settings);

        //Check if ad is loaded
        rmpContainer.addEventListener('adloaded', function () {
          ad_isset = true;
          console.log('adloaded');
        });

        //Completion rate
        rmpContainer.addEventListener('adclick', function () {
          rmp.play();
        });

        //Restore player when adv ends
        rmpContainer.addEventListener('adalladscompleted', function () {
          console.log('adalladscompleted');
          document.getElementById('slideplayer-container').setAttribute('style', 'width:100%; position:relative; top:inherit; right:inherit; z-index:1; box-shadow: none;');
          rmp.pause();
        })

        //Pause player on ad error
        rmpContainer.addEventListener('aderror', function () {
          console.log('aderror');
          rmp.pause();          
        })

      </script>

      <div style="width: 100%; height: 500px; background: #efefef; margin-bottom: 20px;"></div>
      <div style="width: 100%; height: 500px; background: #efefef; margin-bottom: 20px;"></div>
      <div style="width: 100%; height: 500px; background: #efefef; margin-bottom: 20px;"></div>
      <div style="width: 100%; height: 500px; background: #efefef; margin-bottom: 20px;"></div>

    </div><!-- .col-md-4 -->

  </div><!-- .row -->

</div><!-- .container -->



<script type="text/javascript">
  if (isMobileNewtek) { } else {

    //Solo Desktop
    var moved = false, video, postTop, scrollLimit,newpos;
    $.fn.scrollStopped = function(callback) {
      var that = this, $this = $(that);
      $this.scroll(function(ev) {
        clearTimeout($this.data('scrollTimeout'));
        $this.data('scrollTimeout', setTimeout(callback.bind(that), 20, ev));
      });
    };

    $(document).ready(function() {
      video = $("#slideplayer-container").offset();
      posTop = video.top - $(window).scrollTop();
      scrollLimit = posTop + $("#slideplayer-container").height();
      $(document).scrollStopped(function() {
        if(scrollLimit < $(window).scrollTop() && !moved) {

          if (ad_isset) {

            newpos = $(window).scrollTop()-$("#slideplayer-container").outerHeight()-10;
            //$(".slide-heading-video").addClass("slideout");
            $("#slideplayer-container").css("width","330px").css("position", "fixed").css("top","100px").css("right","20px").css("z-index","99").css("box-shadow", "4px 4px 3px #888");;
            rmp.resize();
            $(".slideplayer-chiudi").fadeIn(800);
            $(document).scrollTop(newpos);
            moved = true;

          }//if ad_isset

        }
      })

      $(".slideplayer-chiudi").click(
        function(){
          $(this).hide();
          $("#slideplayer-container").css("width","100%").css("position","relative").css("top","inherit").css("right","inherit").css("z-index","600").css("box-shadow","none");
          rmp.resize();
          //$(".slide-heading-video").removeClass("slideout");
        });//Rimette il player in posizione alla chiusura

    })//Dom

  }//If isMobileNewtek
</script>

</body>
</html>