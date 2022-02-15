<script>
	function sum() {
		var stok = document.getElementById('stok').value;
		var jumlahmasuk = document.getElementById('jumlahmasuk').value;
		var result = parseInt(stok) + parseInt(jumlahmasuk);
		if (!isNaN(result)) {
			document.getElementById('jumlah').value = result;
		}
	}
</script>

<?php

$koneksi = new mysqli("localhost", "root", "", "db_banshu_mahdin");

$no = mysqli_query($koneksi, "select transaction_type from tb_transaction order by transaction_type desc");
$idtran = mysqli_fetch_array($no);
$kode = $idtran['id'];


$urut = substr($kode, 8, 3);
$tambah = (int) $urut + 1;
$bulan = date("m");
$tahun = date("y");

if (strlen($tambah) == 1) {
	$format = "TRM-" . $bulan . $tahun . "00" . $tambah;
} else if (strlen($tambah) == 2) {
	$format = "TRM-" . $bulan . $tahun . "0" . $tambah;
} else {
	$format = "TRM-" . $bulan . $tahun . $tambah;
}



$tanggal_masuk = date("Y-m-d");


?>

<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Transaksi</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">


				<div class="body">

					<form method="POST" enctype="multipart/form-data">



						<label for="">Type Transaksi</label>
						<div class="form-group">
							<div class="form-line">
								<select name="transaction_type" id="transaction_type" class="form-control" required="required">
									<option>--Type--</option>
									<option value="IN">TRN-IN</option>
									<option value="OUT">TRN-OUT</option>
								</select>
							</div>
						</div>



						<label for="">Barang</label>
						<div class="form-group">
							<div class="form-line">
								<select name="item_code" id="item_code" class="form-control" />
								<option value="">-- Pilih Barang --</option>
								<?php

								$sql = $koneksi->query("select * from tb_item order by item_code");
								while ($data = $sql->fetch_assoc()) {
									/* echo "<option value='$data[item_code].$data[item_name]'>$data[item_code] | $data[item_name]</option>"; */
									echo "<option value='$data[id].$data[item_code]'>$data[item_name]</option>";
								}
								?>
								</select>
							</div>
						</div>



						<label for="">Qty</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="qty" id="qty" class="form-control" />
							</div>
						</div>

						<!-- <div class="tampung"></div>
					
							<label for="">Jumlah</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="jumlahmasuk" id="jumlahmasuk" onkeyup="sum()" class="form-control" />
                                     
									 
							</div>
                            </div>
							
							<label for="jumlah">Total Stok</label>
                            <div class="form-group">
                               <div class="form-line">
                               <input readonly="readonly" name="jumlah" id="jumlah" type="number" class="form-control">
                                     
									 
							</div>
                            </div> -->

						<!-- <div class="tampung1"></div>-->

						<label for="">Tanggal Masuk</label>
						<div class="form-group">
							<div class="form-line">
								<input type="Date" name="Date" class="form-control" id="Date" value="<?php echo $Date; ?>" />
							</div>
						</div>

				</div>
			</div>









			<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

			</form>



			<?php

			if (isset($_POST['simpan'])) {
				$transaction_type = $_POST['transaction_type'];


				$item_code = $_POST['item_code'];
				$pecah_item = explode(".", $item_code);
				$id = $pecah_item[0];
				$item_code = $pecah_item[1];



				$qty = $_POST['qty'];


				//$pengirim= $_POST['pengirim'];
				//$pecah_nama = explode($nama_supplier);
				//$nama_supplier = $pecah_nama[0];

				//$satuan = $_POST['satuan'];

				$Date = $_POST['Date'];



				$sql = $koneksi->query("insert into tb_transaction (transaction_type, item_code, qty, Date) values('$transaction_type','$item_code','$qty','$Date')");





				if ($sql) {
			?>
					<script type="text/javascript">
						alert("Simpan Data Berhasil");
						window.location.href = "?page=transaksi";
					</script>
			<?php
				}
			}


			?>