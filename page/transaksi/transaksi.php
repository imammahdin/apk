<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Transaksi Barang </h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Type Transaksi</th>
							<th>Kode Barang</th>
							<th>qty</th>
							<th>Date</th>
							<th>Pengaturan</th>

						</tr>
					</thead>


					<tbody>
						<?php

						$no = 1;
						$sql = $koneksi->query("select * from tb_transaction");
						while ($data = $sql->fetch_assoc()) {

						?>

							<tr>
								<td><?php echo $no++; ?></td>



								<td>
									<?php if ($data['transaction_type'] == 'IN') { ?>
										<span class="badge badge-success">TRN-IN</span>
									<?php } else { ?>
										<span class="badge badge-danger">TRN-OUT</span>
									<?php } ?>
								</td>
								<td><?php echo $data['item_code'] ?></td>
								<td><?php echo $data['qty'] ?></td>
								<td><?php echo $data['Date'] ?></td>
								<td>

									<a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=transaksi&aksi=hapustransaksi&id=<?php echo $data['id'] ?>" class="btn btn-danger">Hapus</a>
								</td>
							</tr>
						<?php } ?>

					</tbody>
				</table>
				<a href="?page=transaksi&aksi=tambahtransaksi" class="btn btn-primary">Tambah</a>
				</tbody>
				</table>
			</div>
		</div>
	</div>

</div>