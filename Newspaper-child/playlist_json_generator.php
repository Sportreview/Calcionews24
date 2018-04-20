<?php
/*
Template Name: Json Playlist Generator
*/
?>
<?php //wp_head(); ?>
<?php
//header('Content-Type: application/json');
$myfile = fopen("playlist.json", "w") or die("Unable to open file!");
?>

<?php echo "<h1>Video</h1>"; ?>

<?php $txt = '{'; ?>
 <?php $txt .= '  "playlist": ['; ?>


<?php

$adtagurl = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/calcionews24/hp/preroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=calcionews24.com&description_url=calcionews24.com&correlator=';

// The Query
$the_query = new WP_Query(  array( 'cat' => 36 )  );

// The Loop

	while ( $the_query->have_posts() ) {
		$the_query->the_post();

		$vimeoArr = get_the_content();
		if (strpos($vimeoArr, '[video_cn24 url="') !== false ) {

			//Titolo
			$title = get_the_title();

			//Url
			$vimeoArr = explode('[video_cn24 url="', get_the_content());
			//echo "<p>vimeoArr: ".$vimeoArr[1]."</p>";
			$vimeoArrUrl = explode('"', $vimeoArr[1]);
			//echo "<p>url: ".$vimeoArrUrl[0]."</p>";
			$url = $vimeoArrUrl[0];

			//Image
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'tds_thumb_td_696x385' );
			$image = $thumb['0']; 

			//print_r($image);
			//wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			//$image = get_the_post_thumbnail_url( 'thumbnail' );

			?>

		  <?php $txt .= '    {'; ?>
		  <?php $txt .= '      "bitrates": {'; ?>
		  <?php $txt .= '        "mp4": [ "'.$url.'" ]'; ?>
		  <?php $txt .= '      },'; ?>
		  <?php $txt .= '     "poster": "'.$image.'",'; ?>
		  <?php $txt .= '      "adTagUrl": "'.$adtagurl.'",'; ?>
		  <?php $txt .= '      "contentTitle": "'.$title.'",'; ?>
		  <?php $txt .= '    },'; ?>

		  <?php

		  echo "<p>".$url."</p>";
		  echo "<p>tag: ".$adtagurl."</p>";

		} //if strpos

		else {
			echo "<p>Url vimeo non presente</p>";
		}

	} // End Query

/* Restore original Post Data */
wp_reset_postdata();

$txt .= '  ]';
$txt .= '}';

echo "<p><strong>Playlist generata nella root del sito</strong></p>";
fwrite($myfile, $txt);
fclose($myfile);
?>


<?php //wp_footer(); ?>

