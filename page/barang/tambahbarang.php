					<?php

					$koneksi = new mysqli("localhost", "root", "", "db_banshu_mahdin");


					$sql = mysqli_query($koneksi, "select max(id) as maxID from tb_item");
					$data = mysqli_fetch_array($sql);

					$kode = $data['maxID'];

					$kode++;
					$ket = "ITM-";
					$kodeauto = $ket . sprintf("%03s", $kode);

					$jumlah = 0;

					?>

					<div class="container-fluid">

						<!-- DataTales Example -->
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Tambah Data Barang</h6>
							</div>
							<div class="card-body">
								<div class="table-responsive">


									<div class="body">

										<form method="POST" enctype="multipart/form-data">

											<label for="">Kode Barang</label>
											<div class="form-group">
												<div class="form-line">
													<input type="text" name="item_code" class="form-control" id="item_code" value="<?php echo $kodeauto ?>" readonly />
												</div>
											</div>



											<label for="">Nama Barang</label>
											<div class="form-group">
												<div class="form-line">
													<input type="text" name="item_name" class="form-control" />
												</div>
											</div>

											<label for="">Harga Beli</label>
											<div class="form-group">
												<div class="form-line">
													<input type="number" name="price_buy" class="form-control" />
												</div>
											</div>

											<label for="">Harga Jual</label>
											<div class="form-group">
												<div class="form-line">
													<input type="number" name="price_sell" class="form-control" />
												</div>
											</div>

											<label for="">Kode Customer</label>
											<div class="form-group">
												<div class="form-line">
													<select name="customer_code" class="form-control" />
													<option value="">-- Pilih Customer --</option>
													<?php

													$sql = $koneksi->query("select * from tb_customer order by customer_code");
													while ($data = $sql->fetch_assoc()) {
														echo "<option value='$data[id].$data[customer_code]'>$data[customer_name]</option>";
													}
													?>
													</select>


												</div>
											</div>

											<label for="">Kode Vendor</label>
											<div class="form-group">
												<div class="form-line">
													<select name="vendor_code" class="form-control" />
													<option value="">-- Pilih Vendor --</option>
													<?php

													$sql = $koneksi->query("select * from tb_vendor order by vendor_code");
													while ($data = $sql->fetch_assoc()) {
														echo "<option value='$data[id].$data[vendor_code]'>$data[vendor_name]</option>";
													}
													?>
													</select>


												</div>
											</div>


											<!--  <label for="">Jumlah</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="jumlah" class="form-control" id="jumlah" value="<?php echo $jumlah; ?>" readonly />
                                     
									 
							</div>
                            </div> -->








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

											$jumlah = $_POST['jumlah'];


											$vendor_code = $_POST['vendor_code'];
											$pecah_vendor = explode(".", $vendor_code);

											$id = $pecah_vendor[0];
											$vendor_code = $pecah_vendor[1];

											$jumlah = $_POST['jumlah'];

											//$satuan= $_POST['satuan'];
											//$pecah_satuan = explode(".", $satuan);

											//$id = $pecah_satuan[0];
											//$satuan = $pecah_satuan[1];







											$sql = $koneksi->query("insert into tb_item (item_code, item_name, price_buy, price_sell, jumlah, customer_code, vendor_code) values('$item_code','$item_name','$price_buy','$price_sell','$jumlah', '$customer_code', '$vendor_code')");

											if ($sql) {
										?>

												<script type="text/javascript">
													alert("Data Berhasil Disimpan");
													window.location.href = "?page=barang";
												</script>

										<?php
											}
										}


										?>