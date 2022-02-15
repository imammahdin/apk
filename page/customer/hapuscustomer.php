 <?php
 
 $customer_code = $_GET['id'];
 $sql = $koneksi->query("delete from tb_customer where customer_code = '$customer_code'");

 if ($sql) {
 
 ?>
 
 
	<script type="text/javascript">
	alert("Data Berhasil Dihapus");
	window.location.href="?page=customer";
	</script>
	
 <?php
 
 }
 
 ?>