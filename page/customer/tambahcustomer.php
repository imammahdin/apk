
<?php

	$koneksi = new mysqli("localhost","root","","db_banshu_mahdin");


$sql = mysqli_query($koneksi, "select max(customer_code) as maxID from tb_customer");
$data = mysqli_fetch_array($sql);

$kode = $data['maxID'];

$kode++;
$ket = "";
$kodeauto = $ket . sprintf("%03s",$kode);

$jumlah = 0;

?>
							



  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Customer</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Kode Customer</label>
                            <div class="form-group">
                               <div class="form-line">
                             <input type="text" name="customer_code" class="form-control" id="customer_code" value="<?php echo $kodeauto; ?>" readonly />
							</div>
                            </div>
							
						
							
							<label for="">Nama Customer</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="customer_name" class="form-control" />	 
							</div>
                            </div>
							
					
							<label for="">Alamat</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="customer_address" class="form-control" />
                          	 
								</div>
                            </div>
					
							
							<label for="">Telepon</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="customer_phone" class="form-control" />	 
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
			
								
								$sql = $koneksi->query("insert into tb_customer (customer_code, customer_name, customer_address, customer_phone) values('$customer_code','$customer_name','$customer_address','$customer_phone')");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=customer";
										</script>
										
										<?php
								}
								}
							
							
							?>
										
										
										
								
								
								
								
								
