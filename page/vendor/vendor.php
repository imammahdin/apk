




 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Vendor</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                                        <tr>
											<th>No</th>
											<th>Kode Vendor</th>
											<th>Nama Vendor</th>
											<th>Alamat</th>
											<th>Telepon</th>
											<th>Pengaturan</th>
                                         
                                        </tr>
										</thead>
										
               
                  <tbody>
                    <?php 
									
									$no = 1;
									$sql = $koneksi->query("select * from tb_vendor");
									while ($data = $sql->fetch_assoc()) {
										
									?>
									
                                        <tr>
                                            <td><?php echo $no++; ?></td>
											<td><?php echo $data['vendor_code'] ?></td>
											<td><?php echo $data['vendor_name'] ?></td>
											<td><?php echo $data['vendor_address'] ?></td>
											<td><?php echo $data['vendor_phone'] ?></td>
                                         

											<td>
											<a href="?page=vendor&aksi=ubahvendor&vendor_code=<?php echo $data['vendor_code'] ?>" class="btn btn-success" >Ubah</a>
											<a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=vendor&aksi=hapusvendor&id=<?php echo $data['vendor_code'] ?>" class="btn btn-danger" >Hapus</a>
											</td>
                                        </tr>
									<?php }?>

										   </tbody>
                                </table>
								<a href="?page=vendor&aksi=tambahvendor" class="btn btn-primary" >Tambah</a>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>












