/*
function fun(num){
  document.getElementById('test').innerHTML = document.getElementById('test').innerHTML + num + '<br />';
}
*/
var cartToggle = 1;
function cart_remove(){
  if(cartToggle == 1){
    document.getElementById("cart_content").style.display = "none";
    //document.getElementById("footer").style.display = "none";
    cartToggle = 0;
  }else{
    document.getElementById("cart_content").style.display = "block";
    //document.getElementById("footer").style.display = "block";
    cartToggle = 1;
  }
}
const fun = (num) => {
	let product1=$('#product1').text();
	let product2=$('#product2').text();

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
	$('#product1').append(num);
	$('#product1').val(num);
}

/*
** num:array
*/


const postRequest = () => {
	let product1=$('#product').text();
	let product2=$('#product').text();
	let product3=$('#product').text();

	let subData=[];

	for(let i=0;i<3;i++)
	{
		$.ajax({
	        url: "<?php echo get_template_directory_uri(); ?>/compare/post.php",
	        dataType: "json",
	        type: "POST",
	        data: {

	        },
	        error: (jqXHR, textStatus, errorThrown) => {
	            console.log(textStatus, errorThrown);
	        },
	        success: (data) => {
	            console.log(data);
	            $("#compareTable").empty();
	            //buildHtmlTable(data, '#compareTable');

	            buildVerTable(data, '#verTable');
	        },
	        complete: () => {
	        },
	        beforeSend: () => {
	        }
	    });
	}
}