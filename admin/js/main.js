$(document).ready(function(){
	$("#sidebar_c").hide(0);
//	$('#load').show(0);
var mn=0;
	$("#sidebar_o").click(function(){
										if(mn<=10)
										{
										$('#sidebar').animate({'margin-left':'+=279px'}, 900, 'swing');
										$("#sidebar_o").hide();
										$("#sidebar_c").show();
										mn+=10;
										}
	});
	$("#sidebar_c").click(function(){
										if(mn>=10)
										{
										$('#sidebar').animate({'margin-left':'-=279px'}, 700, 'swing');
										$("#sidebar_c").hide();
										$("#sidebar_o").show();
										mn-=10;
										}
	});
	$("#sidebar").mouseleave(function(){
										if(mn>=10)
										{
										$('#sidebar').animate({'margin-left':'-=279px'}, 700, 'swing');
										$("#sidebar_c").hide();
										$("#sidebar_o").show();
										mn-=10;
										}
	});
	var angka=0;									
	$('#akun').click(function(){
		if(angka>=10)
		{$('#akun_mn').animate({'margin-top':'-=200px'}, 500, 'swing');angka-=10;}
		else
		{$('#akun_mn').animate({'margin-top':'+=200px'}, 400, 'swing');angka+=10;}
	});
	$('#akun_mn').mouseleave(function(){$('#akun_mn').animate({'margin-top':'-=200px'}, 500, 'swing');angka-=10;});
});
function waktu()
{
	date= new Date();
	j=date.getHours();
	m=date.getMinutes();
	s=date.getSeconds();	
	if(j<10){j="0"+j;}if(m<10){m="0"+m;}if(s<10){s="0"+s;}
	$('#waktu').html(j+":"+m+":"+s);
	setTimeout("waktu()",500);
}
function cek_all(){
         allCheckList = document.getElementById("cek_form").elements;
         jumlahCheckList = allCheckList.length;
         if(document.getElementById("cek").value == "All"){
            for(i = 0; i < jumlahCheckList; i++){
                allCheckList[i].checked = true;
            }
            document.getElementById("cek").value = "UnAll";
         }else{
            for(i = 0; i < jumlahCheckList; i++){
                allCheckList[i].checked = false;
         }
            document.getElementById("cek").value = "All";
         }
}
function konfirm(kata,hal)
{
	x = confirm("Anda yakin " + kata + "?");
	if(x == true)
	{pg(hal);return true;}
	else
	{	return false; }
}
function tanya(hal)
{
	a = confirm("Anda yakin menghapus yang dicentang?");
	if(a == true)
	{
		data = $("#cek_form").serialize();
		pg(hal+"_hapus.php?"+data);
		return true;
	}
	else
	{	return false; }
}
function pages(x)
{
	$('#load').fadeIn(200);
	page = x;
	$.ajax({
		url: page,
		success:function(result,status){
		$("#content").html(result);
		$('#load').delay(400).fadeOut(500);
		}
	});
}
function pg(x)
{
	page = x;
	$.ajax({
		url: page,
		success:function(result,status){
		$("#content").html(result);
		}
	});
}
var t;    
function cari(pgc,ygdicari)
{
    pages(pgc+"?cr="+ygdicari);
}
function hapus_photo()
{
	$.ajax({
		url:'hapus_sesion.php',
	});
}
function unggah_photo(sesi)
{
	$.ajax({
		url:'unggah_photo.php?sesi='+sesi,
	});
}
function auto_photo()
{
	$("#photo_load").load("guru_photo_load.php");
	t = setTimeout("auto_photo()",10);
}
