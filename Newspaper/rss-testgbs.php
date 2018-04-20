<?php
/**
 * Customs RSS template with related posts.
 *
 * Place this file in your theme's directory.
 *
 * @package sometheme
 * @subpackage theme
 */


/**
 * Feed defaults.
 */
header( 'Content-Type: ' . feed_content_type( 'rss-http' ) . '; charset=' . get_option( 'blog_charset' ), true );
$frequency  = 1;        // Default '1'. The frequency of RSS updates within the update period.
$duration   = 'hourly'; // Default 'hourly'. Accepts 'hourly', 'daily', 'weekly', 'monthly', 'yearly'.
$email      = get_the_author_meta( 'email');
$author     = get_the_author();


/**
 * Start RSS feed.
 */
echo '<?xml version="1.0" encoding="' . get_option( 'blog_charset' ) . '"?' . '>'; ?>

<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	<?php do_action( 'rss2_ns' ); ?>
>

	<!-- RSS feed defaults -->
	<channel>
		<title><?php bloginfo_rss( 'name' ); ?> Feed</title>
		<link><?php bloginfo_rss( 'url' ) ?></link>
		<description><?php bloginfo_rss( 'description' ) ?></description>
		<lastBuildDate><?php echo mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ); ?></lastBuildDate>
		<language><?php bloginfo_rss( 'language' ); ?></language>
		<sy:updatePeriod><?php echo apply_filters( 'rss_update_period', $duration ); ?></sy:updatePeriod>
		<sy:updateFrequency><?php echo apply_filters( 'rss_update_frequency', $frequency ); ?></sy:updateFrequency>
		<atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />

		<!-- Feed Logo (optional) -->
		<image>
			<url>https://www.calcionews24.com/wp-content/uploads/2017/07/logo-calcionews-orizzontale-new.png</url>
			<title>
				<?php bloginfo_rss( 'name' ) ?> Feed
			</title>
			<link><?php bloginfo_rss( 'url' ) ?></link>
		</image>

		<?php do_action( 'rss2_head' ); ?>

		<!-- Start loop -->
		<?php while( have_posts() ) : the_post();

		$postimages = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'td_696x385' );
        $postlink   = '<br /><a href="' . get_permalink() . '">Leggi su Calcionews24.com</a><br /><br />';
        
			   //$news_content_raw = get_the_content();
			   $news_content_raw = apply_filters('the_content', get_the_content());
		   	//Sostituisco i paragrafi con line breaks
		   	//$news_content_raw_p = wpautop($news_content_raw, TRUE);
		   	//$news_content_raw_p_2 = str_replace('<p>', '', $news_content_raw_p);
		   	//$news_content_raw_br = str_replace('</p>', '<br />', $news_content_raw_p_2);
			// Strip html tags
			//$news_content_raw_1 = strip_tags($news_content_raw, '<img><script><a><h2><h3><b><i><strong><br><twitterwidget><div><blockquote>');
			//$news_content_raw = str_replace("async", "", $news_content_raw);
			//$news_content_raw = str_replace("&mdash;", "", $news_content_raw);

			/*$tw = preg_replace("/. (\s*[a-zA-Z\/\/:\.]*twitter\.com\/[a-zA-Z0-9_]+\/status\/.*?)</mis","<iframe width=\"550\" height=\"250\" src=\"https://twitframe.com/show?url=$1\"></iframe>",$news_content_raw);*/
			$news_content = $news_content_raw;//str_replace("&nbsp;", " ", $tw);		  


				// Funzione per recuperare categoria primaria di Yoast
				$category = get_the_category();
				$useCatLink = true;
				// If post has a category assigned.
				if ($category){
					$category_display = '';
					$category_link = '';
					if ( class_exists('WPSEO_Primary_Term') )
					{
						// Show the post's 'Primary' category, if this Yoast feature is available, & one is set
						$wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
						$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
						$term = get_term( $wpseo_primary_term );
						if (is_wp_error($term)) {
							// Default to first category (not Yoast) if an error is returned
							$category_display = $category[0]->name;
							$category_link = get_category_link( $category[0]->term_id );
						} else {
							// Yoast Primary category
							$category_display = $term->name;
							$category_link = get_category_link( $term->term_id );
						}
					}
					else {
						// Default, display the first category in WP's list of assigned categories
						$category_display = $category[0]->name;
						$category_link = get_category_link( $category[0]->term_id );
					}


					// Display category
					if ( !empty($category_display) ){
					    if ( $useCatLink == true && !empty($category_link) ){
								$html_category = htmlspecialchars($category_display);
					    } else {
								$html_category = htmlspecialchars($category_display);
					    }
					}

				}//if category

		?>

			<item>
				<title><?php the_title_rss(); ?></title>
				<link><?php the_permalink_rss(); ?></link>
				<guid isPermaLink="false"><?php the_guid(); ?></guid>
				<?php if ( $html_category ) { ?> <category><?php echo $html_category; ?></category> <?php } ?>
				<dc:creator><?php echo $author; ?></dc:creator>
				<image>
					<url><?php echo esc_url( $postimages[0] ); ?>"/></url>
				</image>
				<pubDate><?php echo mysql2date( 'D, d M Y H:i:s +0000', get_post_time( 'Y-m-d H:i:s', true ), false ); ?></pubDate>
				<!-- Echo content and related posts -->
				<description>
					<![CDATA[<img src="<?php echo esc_url( $postimages[0] ); ?>" /> <br /> <?php  echo $news_content; echo $postlink;  ?>]]>
				</description>
			</item>

		<?php endwhile; ?>
		<!-- End loop -->
	</channel>
</rss>
