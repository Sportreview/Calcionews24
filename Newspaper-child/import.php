<?php

/*

Template Name: Inserisci

*/

?>

<?php 

//Aggiorna contatore
$fr = fopen('/home/toro/public_html/dev/contatore.txt', 'a+');
$count = file_get_contents('/home/toro/public_html/dev/contatore.txt');
$count++;
$fr = fopen('/home/toro/public_html/dev/contatore.txt', 'w+');
fwrite($fr, $count);
fclose($fr);
$count = file_get_contents('/home/toro/public_html/dev/contatore.txt');
$id_progressivo = $count+1;

	//connessione DB
	$host = "localhost";
	$db_user = "toro";
	$db_psw = "pgmv1d30srl";
	$db_name = "toro_toro";

	$connessione = mysql_connect("$host","$db_user","$db_psw");
	if(!$connessione) { die("Errore critico di Connessione al Database" . mysql_error()); }

	//connessione
	mysql_select_db("$db_name",$connessione);
	$ris_news= mysql_query("SELECT * FROM tcontenuti  WHERE IdContenuto = $id_progressivo LIMIT 1");
	if (!$ris_news) {
	 	exit ('<p> Errore mentre recuperavo i dati' . mysql_error() . '</p>');
	}
   // loop per stampare i risultati
   while ($news= mysql_fetch_array($ris_news))  
   {
 
    // Normal filtering
    remove_filter('title_save_pre', 'wp_filter_kses');
 
    // Comment filtering
    remove_filter( 'pre_comment_content', 'wp_filter_post_kses' );
    remove_filter( 'pre_comment_content', 'wp_filter_kses' );
 
    // Post filtering
    remove_filter('content_save_pre', 'wp_filter_post_kses');
    remove_filter('excerpt_save_pre', 'wp_filter_post_kses');


     //struttura del loop visualizzazione si ripeterà n volte
     echo $news['IdContenuto'];
     echo "<p>Titolo news: ".$news['TitoloContenuto']."</p>" ;
 	
 	 $titolo = html_entity_decode($news['TitoloContenuto']);
     $contenuto = html_entity_decode($news['TestoContenuto']);
     //echo $contenuto; 
    //Insert WP
	$my_post = array(
	  'post_title'    => $titolo,
	  'post_content'  => $contenuto,
	  'post_name'=> $news['LinkContenuto'],
	  'guid' => $news['LinkContenuto'],
	  'post_status'   => 'publish',
	  'post_category' => array(2), //Id categoria
	  'post_author'   => 2
	);

	// Insert the post into the database
	$post_id = wp_insert_post( $my_post );
	echo $post_id;
	//Insert WP
	
		//Inserisco Featured Image
		$ris_media= mysql_query("SELECT * FROM tallegati WHERE IdOggetto = ".$news['IdContenuto']." LIMIT 1");
		if (!$ris_media) {
		 	exit ('<p> Errore mentre recuperavo i dati' . mysql_error() . '</p>');
		}
	   // loop per stampare i risultati
	   while ($media= mysql_fetch_array($ris_media))  
	   {

	   		//LINK MEDIA ONLINE
	   		$media_featured =  "".$media['LinkAllegato'];

		   	//Download Immagine e salvataggio in uploads
		   	/*
		   	define('DIRECTORY', 'C:/xampp/htdocs/sviluppo/migr_toro/wp-content/uploads/');
			$content = file_get_contents($media_featured);
			file_put_contents(DIRECTORY . $media['LinkAllegato'], $content);
			*/
		   	 
			$filename = $media_featured;
			$wp_filetype = wp_check_filetype(basename($filename), null );
			$attachment = array(
			    'post_mime_type' => $wp_filetype['type'],
			    'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
			    'post_content' => '',
			    'post_status' => 'inherit'
			);
			$attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
			set_post_thumbnail( $post_id, $attach_id );
	

 		}//While Inserimento featured Image
 		//Inserisco Featured Image
  	echo "<hr />";
 }//While insert POST
?>