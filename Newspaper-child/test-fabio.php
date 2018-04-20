<?php 
/*
Template Name: Test Fabio
*/
?>


<?php get_header(); ?>

<div class="td-container">

<?php // La Query
    $the_query = new WP_Query( array( 'cat' => 36, 'posts_per_page' => 10 ) );

    // Il Loop
    while ( $the_query->have_posts() ) :
    $the_query->the_post();

  	//Image
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'td_696x385' );
    $image = $thumb['0'];
    //print_r($image.'<br>');
    echo "wp_get_attachment_image_src: " . $image . "<br>"; //url immagine

   	//$thumb_id = get_post_thumbnail_id($post->ID);

   	//echo "thumb_id: " . $thumb_id . "<br>"; //id immagine

   	//$thumb_url = wp_get_attachment_thumb_url($thumb_id);
   	//$thumb_url = wp_get_attachment_image_src($thumb_id,'medium', true);

   	//echo "post thumb: " . $thumb_url[0] . "<br>"; //url thumb

   	//$new = get_post(get_post_thumbnail_id($this->post->ID))->post_content;

   	//echo "new: " . $new;

   	echo "<hr>";

    endwhile;
    wp_reset_query();
    wp_reset_postdata();

?>

</div>

<?php get_footer(); ?>