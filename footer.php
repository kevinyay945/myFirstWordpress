	<?php 
			// wp_nav_menu( array(
			// 	'theme_location'  => 'footer',
			// 	'menu'            => '',
			// 	'container'       => 'div',
			// 	'container_class' => 'menu-{menu-slug}-container',
			// 	'container_id'    => '',
			// 	'menu_class'      => 'menu',
			// 	'menu_id'         => '',
			// 	'echo'            => true,
			// 	'fallback_cb'     => 'wp_page_menu',
			// 	'before'          => '',
			// 	'after'           => '',
			// 	'link_before'     => '',
			// 	'link_after'      => '',
			// 	'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
			// 	'depth'           => 0,
			// 	'walker'          => '',
			// ) );
	?>
</div><!-- container in header -->
<!-- Footer -->

<div id = "test">
	 <div id="cart_header" onclick="cart_remove()">Shoping Car</div>
	<form id="cart_content" action="<?php echo get_template_directory_uri(); ?>/compare/post.php">
		<input id='product1' name="product1" value=""></input>
		<input id='product2' name="product2" value=""></input>
		<input id='product3' name="product3" value=""></input>

		<input class='btn btn-success' type="submit" value="submit"></button>
	</form>
	
</div>

<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="http://deptfin.ccu.edu.tw/"> 國立中正大學財務金融系</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
<?php wp_footer(); ?>
</html>