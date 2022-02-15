<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Laporan Transaksi Pembelian</h6>
    </div>
    <div class="card-body">


      <table>
        <tr>
          <td>

          </td>
        </tr>
        <!-- <tr>
            <td width="50%">
<form action="page/laporan/export_laporan_barangmasuk_excel" method="post">
	<div class="row form-group">

		<div class="col-md-5">
		<select class="form-control " name="bln">
							
							
    						<option value="1" selected="">January</option>
    						<option value="2">February</option>
    						<option value="3">March</option>
    						<option value="4">April</option>
    						<option value="5">May</option>
    						<option value="6">June</option>
    						<option value="7">July</option>
    						<option value="8">August</option>
    						<option value="9">September</option>
    						<option value="10">October</option>
    						<option value="11">November</option>
    						<option value="12">December</option>
        			</select>
        		</div>
        		<div class="col-md-3">
        		<?php
            $now = date('Y');
            echo "<select name='thn' class='form-control'>";
            for ($a = 2018; $a <= $now; $a++) {
              echo "<option value='$a'>$a</option>";
            }
            echo "</select>";
            ?>
</div>
        
	<input type="submit" class="" name="submit" value="Export to Excel">
	</div>
	</form>
	
	
	<form id="Myform1">
    <div class="row form-group">

        <div class="col-md-5">
        <select class="form-control " name="bln">
                            
                            <option value="all" selected="">ALL</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                    </select>
                </div>
                <div class="col-md-3">
                <?php
                $now = date('Y');
                echo "<select name='thn' class='form-control'>";
                for ($a = 2018; $a <= $now; $a++) {
                  echo "<option value='$a'>$a</option>";
                }
                echo "</select>";
                ?>
</div>


    <input type="submit" class="" name="submit2"  value="Tampilkan">
    </div>
    </form>-->







      </table>

      <div class="tampung1">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>

                <th>Type</th>
                <th>Barang</th>
                <th>Vendor</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Total Harga</th>
                <th>Date</th>



              </tr>
            </thead>


            <tbody>

              <?php
              $sql = mysqli_query($koneksi, "SELECT 
                                                                  tr.qty, 
                                                                  tr.Date, 
                                                                  ti.item_code, 
                                                                  ti.item_name, 
                                                                  ti.price_buy, 
                                                                  ti.vendor_code, 
                                                                  tv.vendor_name FROM tb_item AS ti 
                                                                  JOIN tb_transaction AS tr 
                                                                  ON ti.item_code = tr.item_code 
                                                                  JOIN tb_vendor AS tv 
                                                                  ON ti.vendor_code = tv.vendor_code  
                                                                  WHERE transaction_type = 'IN' ");

              while ($data = mysqli_fetch_array($sql)) {



              ?>


                <tr>
                  <!--<td><?php echo $no++; ?></td>-->

                  <td>
                    <?php echo ($data['transaction_type'] == "IN") ?>
                    <span class="badge badge-success">TRN-IN</span>

                    <?php  ?>
                  </td>

                  <td><?php echo $data['item_name'] ?></td>
                  <td><?php echo $data['vendor_name'] ?></td>
                  <td><?php echo $data['qty'] ?></td>
                  <td><?php echo $data['price_buy'] ?></td>
                  <td><?php echo $data['price_buy'] * $data['qty'] ?></td>
                  <td><?php echo $data['Date'] ?></td>



                </tr>
              <?php } ?>

            </tbody>
          </table>

          </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>