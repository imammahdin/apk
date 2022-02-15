<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Laporan Transaksi Penjualan</h6>
    </div>
    <div class="card-body">


      <table>
        <tr>
          <td>

          </td>
        </tr>
        <!-- <tr>
            <td width="50%">
<form action="page/laporan/export_laporan_barangmasuk_excel.php" method="post">
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
                <th>Customer</th>
                <th>Qty</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Total Harga Beli</th>
                <th>Total Harga Jual</th>
                <th>Profit</th>
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
                                                                  ti.price_sell, 
                                                                  ti.customer_code, 
                                                                  tv.customer_name, 
                                                                  (ti.price_sell * tr.qty) AS total_price1 , 
                                                                  (ti.price_buy * tr.qty) AS total_price2 
                                                                  FROM tb_item AS ti 
                                                                  JOIN tb_transaction AS tr 
                                                                  ON ti.item_code = tr.item_code 
                                                                  JOIN tb_customer AS tv 
                                                                  ON ti.customer_code = tv.customer_code 
                                                                  WHERE transaction_type = 'OUT' ");

              while ($data = mysqli_fetch_array($sql)) {



              ?>



                <tr>
                  <!-- <td><?php echo $no++; ?></td>-->

                  <td>
                    <?php echo ($data['transaction_type'] == "OUT")  ?>
                    <span class="badge badge-danger">TRN-OUT</span>

                    <?php  ?>
                  </td>

                  <td><?php echo $data['item_name'] ?></td>
                  <td><?php echo $data['customer_name'] ?></td>
                  <td><?php echo $data['qty'] ?></td>
                  <td><?php echo $data['price_buy'] ?></td>
                  <td><?php echo $data['price_sell'] ?></td>
                  <td><?php echo $data['total_price2'] ?></td>
                  <td><?php echo $data['total_price1'] ?></td>
                  <td><?php echo $data['total_price1'] - $data['total_price2'] ?></td>
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