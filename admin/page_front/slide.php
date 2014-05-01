	<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			$('.box_skitter_large').skitter({
				theme: 'clean',
				numbers_align: 'right',
				progressbar: true, 
				dots: true, 
				preview: true
			});
		});
	</script>
<?php
require "../config/koneksi.php";
$qry1=mysql_query("select * from tb_berita order by tgl desc");
?>
			<div class="border_box" style="width:1000px; height:400px; border-bottom:3px solid #666; z-index:0; position:absolute; margin-top:-30px; border-top:15px solid #666">
				<div class="box_skitter box_skitter_large" style="width:100%; height:100%">
					<ul>
<?php 
$o=0;
while($arr1=mysql_fetch_array($qry1))
{
	if($o%2){$x="block";}
	elseif($o%3){$x="cube";}
	elseif($o%4){$x="block";}
	elseif($o%5){$x="cubeStop";}
	
?>			<li><img src="admin/image/slide/<?php echo $arr1['photo'];?>" class="<?php echo $x;?>" /><div class="label_text"><p onclick="pages('berita_detail.php?id=<?php echo $arr1['0'];?>');" style="cursor:pointer"><?php echo $arr1['judul'];?></p></div></li><?php
$o++;	
}

?>	
					</ul>
				</div>
			</div>
