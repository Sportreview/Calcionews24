<?php

/*

Template Name: Playlist

*/

?>

<?php get_header(); ?>


<div class="td-container">


    <div class="td-pb-row" style="padding: 0px 22px;">
      <div id="SportreviewPlayer"></div>
      <script>
      // We set up our playlist items
      // For each playlist item we have a title, a src (source streaming URL) and an optional adTagUrl (should you want video ads to run in the playlist)
      var playlist = [

        <?php
          // The Query
          $the_query = new WP_Query( array(
            'cat' => 36, 
            'offset' => 1,
            'post__not_in' => array(939627), // esclude un post con link di youtube
            )
          );
          $tag = 'https://optimized-by.4wnetwork.com/impression.php?code=154641;76809;6778;0&from=';

          // The Loop
          while ( $the_query->have_posts() ) {
            $the_query->the_post(); 
            // Recupero Url video
            $vimeoArr = explode('[video_cn24 url="', get_the_content());
            $vimeoArr_temp = explode('"]', $vimeoArr[1]);
            $url = $vimeoArr_temp[0]; ?>

            {
              title: '<?php the_title(); ?>',
              src: '<?php echo $url; ?>',
              poster: '<?php the_post_thumbnail_url(); ?>',
              adTagUrl: 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/altro/preroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+''
            },

        <?php }; ?>

      ];

      // This is the bitrate for the first playlist item.
      var bitrates = {

        <?php
          // The Query
          $the_query = new WP_Query( array(
            'cat' => 36,
            'posts_per_page' => 1
            )
          );

          // The Loop
          while ( $the_query->have_posts() ) {
            $the_query->the_post(); 
            // Recupero Url video
            $vimeoArr = explode('[video_cn24 url="', get_the_content());
            $vimeoArr_temp = explode('"]', $vimeoArr[1]);
            $first_item_url = $vimeoArr_temp[0]; 
            ?>

              mp4: ['<?php echo $first_item_url; ?>']

        <?php }; ?>
      };

      // We set our player settings. Those settings will be applied to each item of the playlist.
      var settings = {
        logo: 'https://www.calcionews24.com/wp-content/uploads/2016/08/logo-cn24-video.png', // eventuale logo
        logoLoc:'https://www.calcionews24.com/', // eventuale url
        bitrates: bitrates,
        licenseKey: 'dG54dHd4aXh6aEAxNTA5NDU3',
        delayToFade: 4000,
        width: 750, // You should use a 16:9 ratio for the player size.
        height: 422, // You should use a 16:9 ratio for the player size..
        skin: 's1',
        sharing: true,
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
        nav: true,
        contentTitle: '<?php the_title(); ?>',
        poster: '<?php the_post_thumbnail_url(); ?>',
        inPlayerPlaylist: playlist,
        inPlayerPlaylistAutoNext: true,
        ads: true,
        adTagUrl: 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/altro/preroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator='+Math.round(Math.random()*10000000000)+''
      };
      // Create and init player as usual
      var elementID = 'SportreviewPlayer';
      var rmp = new RadiantMP(elementID);
      rmp.init(settings);
      </script>


    </div>

</div><!--td-container-->





<?php get_footer(); ?>