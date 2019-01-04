<div class="card" style="width: 18rem;">
  	<?php 
		if (has_post_thumbnail(  )):
			//<img class="card-img-top" src="php the_permalink(); " alt="First slide">
			//<img class="card-img-top" src=".../800x400?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
			the_post_thumbnail( 'thumbnail', array( 'class' => 'card-img-top' , 'alt' => get_post_thumbnail_id()) );
		endif; 
	?>

  <div class="card-body">
    <h5 class="card-title"><?php the_title(sprintf('<a href="%s"> ',esc_url( get_permalink() ) ),'</a>' ); ?></h5>
    <p class="card-text"><?php the_content(  ); ?></p>
    <label <?php //echo esc_url( get_permalink() ); ?>class="btn btn-primary" onclick="fun(<?php echo the_ID() ?>)">Select></label>
  </div>
</div>