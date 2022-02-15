




 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Master Barang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                                        <tr>
											<th>No</th>
											<th>Kode Barang</th>
											<th>Nama Barang</th>											
											<th>Harga Jual</th>
											<th>Harga Beli</th>
											<th>Kode Customeer</th>
											<th>Kode Vendor</th>
											<!--<th>Jumlah Stock</th>-->
											<th>Pengaturan</th>
                                         
                                        </tr>
										</thead>
										
               
                  <tbody>
                    <?php 
									
									$no = 1;
									$sql = $koneksi->query("select * from tb_item");
									while ($data = $sql->fetch_assoc()) {
										
									?>
									
                                        <tr>
                                            <td><?php echo $no++; ?></td>
											<td><?php echo $data['item_code'] ?></td>
											<td><?php echo $data['item_name'] ?></td>
											<td><?php echo $data['price_buy'] ?></td>
											<td><?php echo $data['price_sell'] ?></td>
											<td><?php echo $data['customer_code'] ?></td>
											<td><?php echo $data['vendor_code'] ?></td>
											
										
											<!--<td><?php echo $data['jumlah'] ?></td>-->
								

											<td>
											<a href="?page=barang&aksi=ubahbarang&item_code=<?php echo $data['item_code'] ?>" class="btn btn-success" >Ubah</a>
											<a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=barang&aksi=hapusbarang&item_code=<?php echo $data['item_code'] ?>" class="btn btn-danger" >Hapus</a>
											</td>
                                        </tr>
									<?php }?>

										   </tbody>
                                </table>
								<a href="?page=barang&aksi=tambahbarang" class="btn btn-primary" >Tambah</a>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>












