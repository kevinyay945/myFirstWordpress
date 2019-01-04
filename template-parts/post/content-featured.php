<?php 
if (has_post_thumbnail(  )):
	//<img class="d-block w-100" src="php the_permalink(); " alt="First slide">
	//<img class="d-block w-100" src=".../800x400?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
	the_post_thumbnail( 'large', array( 'class' => 'd-block w-100' , 'alt' => get_post_thumbnail_id()) );
endif; 
?>
