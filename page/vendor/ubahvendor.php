

<?php
 $vendor_code = $_GET['vendor_code'];
 $sql2 = $koneksi->query("select * from tb_vendor where vendor_code = '$vendor_code'");
 $tampil = $sql2->fetch_assoc();
 

 
 
 
 ?>
 
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Data Vendor</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">

							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Kode Vendor</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="vendor_code" value="<?php echo $tampil['vendor_code']; ?>" class="form-control" />
	 
							</div>
                            </div>
							
							<label for="">Nama Vendor</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="vendor_name" value="<?php echo $tampil['vendor_name']; ?>" class="form-control" />
	 
							</div>
                            </div>
							
							<label for="">Alamat</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="vendor_address" value="<?php echo $tampil['vendor_address']; ?>" class="form-control" />
	 
							</div>
                            </div>
							
							<label for="">Telepon</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="vendor_phone" value="<?php echo $tampil['vendor_phone']; ?>" class="form-control" />
	 
							</div>
                            </div>
							
						
							
							
						
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							
							</form>
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								
								$vendor_code= $_POST['vendor_code'];
								$vendor_name= $_POST['vendor_name'];
								$vendor_address= $_POST['vendor_address'];
								$vendor_phone= $_POST['vendor_phone'];
								
								
								$sql = $koneksi->query("update tb_vendor set vendor_code='$vendor_code', vendor_name='$vendor_name', vendor_address='$vendor_address', vendor_phone='$vendor_phone' where vendor_code='$vendor_code'"); 
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Diubah");
										window.location.href="?page=vendor";
										</script>
										
										<?php
								}
							
								}
							
							
								
							?>
										
										
										
								
								
								
								
								
