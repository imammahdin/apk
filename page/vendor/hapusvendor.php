 <?php
 
 $vendor_code = $_GET['id'];
 $sql = $koneksi->query("delete from tb_vendor where vendor_code = '$vendor_code'");

 if ($sql) {
 
 ?>
 
 
	<script type="text/javascript">
	alert("Data Berhasil Dihapus");
	window.location.href="?page=vendor";
	</script>
	
 <?php
 
 }
 
 ?>