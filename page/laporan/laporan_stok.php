<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_banshu_mahdin";

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Laporan Stok Barang</h6>
    </div>
    <div class="card-body">


      <table>
        <tr>
          <td>

          </td>
        </tr>
        <div class="form-group">



          <!-- <br/>
	<form method="GET">
		<label>Pilih Tanggal</label>
		<input type="date" name="tanggal">
		<input type="submit" value="FILTER">
	
	</form>
	<br/> -->



      </table>

      <!--  <div class="tampung1"> -->


      <?php


      $conn = new mysqli($servername, $username, $password, $dbname);
      $sql = "SELECT tv.vendor_name,
                        tb.item_code,
                        ti.item_name,
                        ti.item_code,
                        tb.Date,
                                (
                                    SELECT COALESCE(SUM(IF(x.transaction_type = 'IN', x.qty, -1 * qty)), 0 )
                                    FROM tb_transaction x
                                    WHERE x.item_code = tb.item_code AND x.Date < tb.Date
                                ) stok_awal,
                                    (sum(case when transaction_type ='IN' then qty else 0 end)-
                                    sum(case when transaction_type ='OUT' then qty else 0 end)) AS QTY,
                                    ((
                                    SELECT COALESCE(SUM(IF(x.transaction_type = 'IN', x.qty, -1 * qty)), 0 )
                                    FROM tb_transaction x
                                    WHERE x.item_code = tb.item_code AND x.Date < tb.Date
                                )+(sum(case when transaction_type ='IN' then qty else 0 end)-
                                    sum(case when transaction_type ='OUT' then qty else 0 end))) AS end_stock,
                                
                                (
                                    SELECT (sum(case when x.transaction_type ='IN' then x.qty else 0 end)-
                                            sum(case when x.transaction_type ='OUT' then x.qty else 0 end))
                                    FROM tb_transaction x
                                    WHERE x.item_code = tb.item_code AND x.Date <= tb.Date
                                ) stok_akhir
                                    FROM tb_transaction tb
                                    LEFT JOIN tb_item ti on tb.item_code = ti.item_code
                                    LEFT JOIN tb_vendor tv on ti.vendor_code = tv.vendor_code
                                    GROUP BY tb.item_code, tb.Date;";
      $result = $conn->query($sql);

      //var_dump($result->fetch_assoc());


      ?>

      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

              <td align="center">Nama Barang</th>
              <td align="center">Tanggal</th>
              <td align="center">Vendor</th>
              <td align="center">Stok Awal</th>
              <td align="center">Qty</th>
              <td align="center">Stok Akhir</th>



            </tr>
          </thead>


          <tbody>

            <?php



            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) { ?>
                <tr>

                  <td align="center"><?= $row['item_name'] ?></td>
                  <td align="center"><?= $row['Date'] ?></td>
                  <td align="center"><?= $row['vendor_name'] ?></td>
                  <td align="center" <?php
                                      if (($row['stok_awal'] <= 10) and ($row['stok_awal'] > 0)) {
                                        echo "class = 'badge-warning' ";
                                      } else if ($row['stok_awal'] <= 0) {
                                        echo "class = 'badge-danger' ";
                                      }

                                      ?>><?php echo $row['stok_awal'] ?></td>
                  <td align="center"><?= $row['QTY'] ?></td>
                  <td align="center" <?php
                                      if (($row['end_stock'] <= 10) and ($row['end_stock'] > 0)) {
                                        echo "class = 'badge-warning' ";
                                      } else if ($row['end_stock'] <= 0) {
                                        echo "class = 'badge-danger' ";
                                      }

                                      ?>><?php echo $row['end_stock'] ?></td>


                </tr>
            <?php
              }
            } ?>

          </tbody>
        </table>

        </tbody>
        </table>
      </div>
      <button class="btn btn-warning"></button> Stok Minimum <br>
      <button class="btn btn-danger"></button> Stok Kosong
    </div>
  </div>
</div>

</div>