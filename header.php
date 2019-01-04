<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset')?>">
	<title>Document</title>
	<?php wp_head(); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		

		<div class="row">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
			    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			  </ol>
			  <div class="carousel-inner">
			  	
			  		<?php
						$args = array(
							'type' => 'post',
							'posts_per_page' => 3,//要輸出幾個
							'category_name' => 'index',
						);
						$lastBlog = new WP_Query( $args );
						$tempFirstBlog = 0;
						if($lastBlog->have_posts()):
							while($lastBlog->have_posts()):$lastBlog->the_post(); $tempFirstBlog = $tempFirstBlog+1;//the_posts 類似java的rs.next()?>
							<?php if($tempFirstBlog==1):?>
								<div class="carousel-item active">
							<?php else: ?>
								<div class="carousel-item">
							<?php endif; ?>
								<?php get_template_part( 'template-parts/post/content' ,'featured'); ?>
							</div>

							<?php endwhile;
						endif;
						wp_reset_postdata();
					?>
			  	<!--
					
				    <div class="carousel-item">
				      <img class="d-block w-100" src=".../800x400?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
				    </div>
				    <div class="carousel-item">
				      <img class="d-block w-100" src=".../800x400?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
				    </div>
			  	-->
			    
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
				  <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">回首頁</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <!--
						<ul class="navbar-nav mr-auto">
					      <li class="nav-item active">
					        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					      </li>
					    </ul>
				    -->

				    <?php wp_nav_menu( array(
						'theme_location'  => 'header',
						'menu'            => '',
						'container'       => false,
						'container_class' => 'menu-{menu-slug}-container',
						'container_id'    => '',
						'menu_class'      => 'navbar-nav mr-auto',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => '',
					) ); ?>
				  </div>
				</nav>
			</div>
		</div>
		
	
