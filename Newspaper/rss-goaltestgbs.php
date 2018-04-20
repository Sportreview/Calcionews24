<?php header("Content-type: text/xml"); ?>

<channel>
	<title><?php bloginfo_rss( 'name' ); ?> Feed Goal Alert</title>
	<link><?php bloginfo_rss( 'url' ) ?></link>
	<description><?php bloginfo_rss( 'description' ) ?></description>
	<lastBuildDate><?php echo mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ); ?></lastBuildDate>
	<language><?php bloginfo_rss( 'language' ); ?></language>

	<image>
		<url>https://www.calcionews24.com/wp-content/uploads/2017/07/logo-calcionews-orizzontale-new.png</url>
		<title>
			<?php bloginfo_rss( 'name' ) ?> Feed
		</title>
		<link><?php bloginfo_rss( 'url' ) ?></link>
	</image>

	<?php

			$args = array(
				'order'					 => 'DESC',
				'date_query' => array(
		      array(
		       'after' => '24 hours ago'
		      )
		    )
			);

			// La Query
			$the_query = new WP_Query( $args );

			// Il Loop
			while ( $the_query->have_posts() ) :
			$the_query->the_post();
							


		$imagesmall = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'td_218x150' );
		$imagelarge = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'td_696x385' );
		$author     = get_the_author_meta('display_name');
		?>


		<item>
			<title><?php the_title_rss(); ?></title>
			<link><?php the_permalink_rss(); ?></link>
			<pubDate><?php echo mysql2date( 'D, d M Y H:i:s +0000', get_post_time( 'Y-m-d H:i:s', true ), false ); ?></pubDate>
			<creator><?php echo $author; ?></creator>
			<?php
				$categories = get_the_category();
 
		    foreach ( $categories as $cat ) {
		      echo "<category>" . $cat->name . "</category>";
		    }
		  ?>
			<guid isPermaLink="false"><?php the_ID(); ?></guid>
			<imageUrlSmall><?php echo esc_url( $imagesmall[0] ); ?></imageUrlSmall>
			<imageUrlLarge><?php echo esc_url( $imagelarge[0] ); ?></imageUrlLarge>
			<?php
		   	$news_content_raw = get_the_content();
		   	//Sostituisco i paragrafi con line breaks
		   	$news_content_raw_p = wpautop($news_content_raw, true);
		   	//$news_content_raw_p_2 = str_replace('<p>', '', $news_content_raw_p);
		   	//$news_content_raw_br = str_replace('</p>', '<br />', $news_content_raw_p_2);
		   	// Strip html tags
		   	$news_content_1 = strip_tags($news_content_raw_p, '<h2><em><strong><p><br>');
		   	$news_content = str_replace("&nbsp;", " ", $news_content_1);
		  ?>
			<content><![CDATA[<?php echo $news_content; ?>]]></content>
		</item>

		<?php 
		endwhile;
		wp_reset_query();
		wp_reset_postdata();
		?>
	
</channel>