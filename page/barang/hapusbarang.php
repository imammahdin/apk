 <?php
 
 $item_code = $_GET['item_code'];
 $sql = $koneksi->query("delete from tb_item where item_code = '$item_code'");

 if ($sql) {
 
 ?>
 
 
	<script type="text/javascript">
	alert("Data Berhasil Dihapus");
	window.location.href="?page=barang";
	</script>
	
 <?php
 
 }
 
 ?>