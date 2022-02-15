

<?php
 $customer_code	 = $_GET['customer_code'];
 $sql2 = $koneksi->query("select * from tb_customer where customer_code = '$customer_code'");
 $tampil = $sql2->fetch_assoc();
 

 
 
 
 ?>
 
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Data Customer</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">

							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Kode Customer</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="customer_code" value="<?php echo $tampil['customer_code']; ?>" class="form-control" />
	 
							</div>
                            </div>
							
							<label for="">Nama Customer</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="customer_name" value="<?php echo $tampil['customer_name']; ?>" class="form-control" />
	 
							</div>
                            </div>
							
							<label for="">Alamat</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="customer_address" value="<?php echo $tampil['customer_address']; ?>" class="form-control" />
	 
							</div>
                            </div>
							
							<label for="">Telepon</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="customer_phone" value="<?php echo $tampil['customer_phone']; ?>" class="form-control" />
	 
							</div>
                            </div>
							
						
							
							
						
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							
							</form>
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								
								$customer_code= $_POST['customer_code'];
								$customer_name= $_POST['customer_name'];
								$customer_address= $_POST['customer_address'];
								$customer_phone= $_POST['customer_phone'];
								
								
								$sql = $koneksi->query("update tb_customer set customer_code='$customer_code', customer_name='$customer_name', customer_address='$customer_address', customer_phone='$customer_phone' where customer_code='$customer_code'"); 
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Diubah");
										window.location.href="?page=customer";
										</script>
										
										<?php
								}
							
								}
							
							
								
							?>
										
										
										
								
								
								
								
								
