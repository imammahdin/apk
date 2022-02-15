<?php
$item_code = $_GET['item_code'];
$sql2 = $koneksi->query("select * from tb_item where item_code = '$item_code'");
$tampil = $sql2->fetch_assoc();

$level = $tampil['level'];




?>

<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Ubah Data Barang</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">


				<div class="body">

					<form method="POST" enctype="multipart/form-data">

						<label for="">Kode Barang</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="item_code" class="form-control" id="item_code" value="<?php echo $tampil['item_code']; ?>" readonly />
							</div>
						</div>


						<label for="">Nama Barang</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="item_name" value="<?php echo $tampil['item_name']; ?>" class="form-control" />
							</div>
						</div>


						<label for="">Harga Beli</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="price_buy" value="<?php echo $tampil['price_buy']; ?>" class="form-control" />
							</div>
						</div>

						<label for="">Harga Jual</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="price_sell" value="<?php echo $tampil['price_sell']; ?>" class="form-control" />
							</div>
						</div>


						<label for="">Kode Customer</label>
						<div class="form-group">
							<div class="form-line">
								<select name="customer_code" value="<?php echo $tampil['customer_code']; ?>" class="form-control" />

								<?php

								$sql = $koneksi->query("select * from tb_customer order by id");
								while ($data = $sql->fetch_assoc()) {
									echo "<option value='$data[customer_code]'>$data[customer_name]</option>";
								}
								?>
								</select>


							</div>
						</div>


						<label for="">Kode Vendor</label>
						<div class="form-group">
							<div class="form-line">
								<select name="vendor_code" value="<?php echo $tampil['vendor_code']; ?>" class="form-control" />

								<?php

								$sql = $koneksi->query("select * from tb_vendor order by vendor_code");
								while ($data = $sql->fetch_assoc()) {
									echo "<option value='$data[vendor_code]'>$data[vendor_name]</option>";
								}
								?>
								</select>


							</div>
						</div>


						<!--<label for="">Satuan Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <select name="satuan" value="<?php echo $tampil['satuan']; ?>" class="form-control" />
								
								<?php

								$sql = $koneksi->query("select * from satuan order by id");
								while ($data = $sql->fetch_assoc()) {
									echo "<option value='$data[id].$data[satuan]'>$data[satuan]</option>";
								}
								?>
								</select>
                                     
									 
							</div>
                            </div>-->





						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

					</form>



					<?php

					if (isset($_POST['simpan'])) {

						$item_code = $_POST['item_code'];
						$item_name = $_POST['item_name'];
						$price_buy = $_POST['price_buy'];
						$price_sell = $_POST['price_sell'];

						$customer_code = $_POST['customer_code'];
						$pecah_customer = explode(".", $customer_code);

						$id = $pecah_customer[0];
						$customer_code = $pecah_customer[1];

						$vendor_code = $_POST['vendor_code'];
						$pecah_vendor = explode(".", $vendor_code);

						$id = $pecah_vendor[0];
						$vendor_code = $pecah_vendor[1];


						//$satuan= $_POST['satuan'];
						//$pecah_satuan = explode(".", $satuan);

						//$id = $pecah_satuan[0];
						//$satuan = $pecah_satuan[1];


						$sql = $koneksi->query("update tb_item set item_code='$item_code', item_name='$item_name', price_buy='$price_buy', price_sell='$price_sell', customer_code='$customer_code',vendor_code='$vendor_code' where item_code='$item_code'");

						if ($sql2) {
					?>

							<script type="text/javascript">
								alert("Data Berhasil Diubah");
								window.location.href = "?page=barang";
							</script>

					<?php
						}
					}
					?>