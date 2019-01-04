<?php

/*
	Template Name: Compare Page
 */

 get_header();?>
 <div class="row" >
 	<div class="col-3" >
 		比較模式
 		<select id="compareMode">
		  <option value="time">時間</option>
		  <option value="company">公司</option>
		  <option value="income">營收</option>
		  <option value="other">其他</option>
		</select>
 	</div>
 </div>
 <div class="row" >
 	<div class="col-3" id = "category" style="display: none;">
 		類別:
 		<select id="category_select">
 		</select>
	</div>
	<div class="col-3" id = "choose" style="display: none;">
 		
 		<select id = "choose_select" >
		  <option value="台積電">台積電</option>
		  <option value="聯電">聯電</option>
		  <option value="群創">群創</option>
		  <option value="台泥">台泥</option>
		</select>
		<input type="hidden" id = "finalChoose" value="">
	</div>
	<div class="col-3">
 		<button class="btn btn-success" id="sendBtn" onclick="sendProduct();" style="display: none;"> click!!</button>
	</div>
 </div>

<hr>
	<div class="row">
		<?php
						$args = array(
							'type' => 'post',
							'posts_per_page' => -1,//要輸出幾個
							'category_name' => 'product',
						);
						$lastBlog = new WP_Query( $args );
						if($lastBlog->have_posts()):
							while($lastBlog->have_posts()):$lastBlog->the_post(); $tempFirstBlog = $tempFirstBlog+1;//the_posts 類似java的rs.next()?>
								<?php get_template_part( 'template-parts/post/content' ,'product'); ?>

							<?php endwhile;
						endif;
						wp_reset_postdata();
					?>
	</div>
<script>
	const sendProduct = () => {
	let product1=$('#product1').text();
	let product2=$('#product2').text();
	let inProduct = $('#choose').val();
	if(product1!=="")
	{
		if(product2!=="")
		{
			$('#product3').empty();
			$('#product3').append(product2);
			$('#product3').val(product2);
		}
		$('#product2').empty();
		$('#product2').append(product1);
		$('#product2').val(product1);
	}

	$('#product1').empty();
	$('#product1').append(inProduct);
	$('#product1').val(inProduct);
	}
	$('#compareMode').change(function(){
		var nowMode = this.value;
		console.log(nowMode);
		$.ajax({
			url: '<?php echo admin_url('admin-ajax.php');?>',
			dataType: 'json',//這個回傳的東西是物件, html 回傳的是string
			type:'POST',
			data:{
				action : 'post_select_mode',//要回傳給後端的function名稱
				nowMode : this.value,
			},
			error: function(xhr){
				alert('Error:'+Json.stringify(xhr) );
			},
			success:function(jData) {
				//console.log(jData.myArr[1]);
				var _html = '';
				var selectTxt = jData.selectTxt;
				var selectValue = jData.selectValue;
				//<option value="stock">股票</option>
				selectTxt.forEach(
					function printAllCategoty(value,index,arr){
						_html += '<option value="'+selectValue[index]+'">'+value+'</option>';
					}
				);
				_html += "";
				$('#category_select').html(_html);
				$('#category').show();
				$('#sendBtn').hide();
			}
		});
	});
	$('#category_select').change(function(){
		var nowMode = this.value;
		console.log("123");
		$.ajax({
			url: '<?php echo admin_url('admin-ajax.php');?>',
			dataType: 'json',//json回傳的東西是物件, html 回傳的是string
			type:'POST',
			data:{
				action : 'post_select_category',//要回傳給後端的function名稱
				nowCate : this.value,
			},
			error: function(xhr){
				alert('Error:'+Json.stringify(xhr) );
			},
			beforeSend: function(){
				console.log("beforeaSend"+this.value);
			},
			success:function(jData) {
				//console.log(jData);
				var _html = '';
				var selectTxt = jData.selectTxt;
				var selectValue = jData.selectValue;
				//<option value="stock">股票</option>
				selectTxt.forEach(
					function printAllCategoty(value,index,arr){
						_html += '<option value="'+selectValue[index]+'">'+value+'</option>';
					}
				);
				_html += "";
				$('#choose_select').html(_html);
				$('#choose').show();
				$('#sendBtn').hide();
			}
		});
    	
	});


	$('#choose_select').change(function(){
		var nowMode = this.value;
		$('#finalChoose').val(nowMode);
		
		$('#sendBtn').show();
	});

	$('#sendBtn').click(function(){
		fun($('#finalChoose').val());
	});
</script>

 <?php get_footer();?>