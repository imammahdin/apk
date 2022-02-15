<?php

$koneksi = new mysqli("localhost", "root", "", "db_banshu_mahdin");

$sql = mysqli_query($koneksi, "select max(vendor_code) as maxID from tb_vendor");
$data = mysqli_fetch_array($sql);

$kode = $data['maxID'];

$kode++;
$ket = "";
$kodeauto = $ket . sprintf("%04s", $kode);

$jumlah = 0;

?>




<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Vendor</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">


				<div class="body">

					<form method="POST" enctype="multipart/form-data">

						<label for="">Kode Vendor</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="vendor_code" class="form-control" id="vendor_code" value="<?php echo $kodeauto; ?>" readonly />
							</div>
						</div>



						<label for="">Nama Vendor</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="vendor_name" class="form-control" />
							</div>
						</div>


						<label for="">Alamat</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="vendor_address" class="form-control" />

							</div>
						</div>


						<label for="">Telepon</label>
						<div class="form-group">
							<div class="form-line">
								<input type="number" name="vendor_phone" class="form-control" />
							</div>
						</div>



						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

					</form>




					<?php

					if (isset($_POST['simpan'])) {
						$vendor_code = $_POST['vendor_code'];
						$vendor_name = $_POST['vendor_name'];
						$vendor_address = $_POST['vendor_address'];
						$vendor_phone = $_POST['vendor_phone'];


						$sql = $koneksi->query("insert into tb_vendor (vendor_code, vendor_name, vendor_address, vendor_phone) values('$vendor_code','$vendor_name','$vendor_address','$vendor_phone')");

						if ($sql) {
					?>

							<script type="text/javascript">
								alert("Data Berhasil Disimpan");
								window.location.href = "?page=vendor";
							</script>

					<?php
						}
					}


					?>