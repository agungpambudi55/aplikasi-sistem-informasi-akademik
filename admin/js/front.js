$(document).ready(function(){
	$("#login").submit(function(event){
		event.preventDefault();
		data = $("#log").serialize();
		$('.ntf').hide(0);
		$("#tl").val("Menghubungkan...");
		$("#log *").prop("disabled","disabled");
		$.ajax({
			url: "admin/page_front/login_cek.php?"+data,
			success: function(result,status){				
				response = result.split("|");
				if(response[0] != "1")
				{
					$('#ntf').show(0);
					$("#tl").val("Login");
					$("#tl").focus();
					$("#log *").removeAttr("disabled");
					$("#log").before(response[1]);
				}
				else
				{$("#tl").val("Memuat...");window.setTimeout('window.location="index.aspx"',500);}
			}
		});
	});

	$(".info").click(function(){
			$("#menu_sub").slideToggle();						 
	});
	$("#menu_sub").mouseleave(function(){
			$("#menu_sub").slideUp();						 
	});					 
	$(".cm").hover(function(){
			$("#menu_sub").slideUp();						 
	});					 
	$(".login").click(function(){
			$("#box_login").slideToggle();						 
	});
	$("#login").mouseleave(function(){
			$("#box_login").slideToggle();						 
	});
var footer=0;
$('#footer1').click(function(){if(footer<=0){$('#footer').animate({'bottom':'+=200px'}, 500, 'swing');footer+=10;}else{$('#footer').animate({'bottom':'-=200px'}, 500, 'swing');footer-=10;}});
$('#footer').mouseleave(function(){if(footer>=10){$('#footer').animate({'bottom':'-=200px'}, 500, 'swing');footer-=10;}});
});
function pages(x)
{
	$('#loader').fadeIn(200);
	page = "admin/page_front/"+x;
	$.ajax({
		url: page,
		success:function(result,status){
		$("#content").html(result);
		$('#loader').delay(200).fadeOut(300);
		}
	});
}
function pg(x)
{
	page = "admin/page_front/"+x;
	$.ajax({
		url: page,
		success:function(result,status){
		$("#content").html(result);
		}
	});
}
