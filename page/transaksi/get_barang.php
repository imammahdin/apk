<?php
include("../../koneksibarang.php");
$tamp =$_POST['tamp'];
$pecah_item = explode(".", $tamp);
$item_code = $pecah_item[0];
    $sql = "SELECT *
    FROM tb_item
    where item_code = '$item_code'";
    $result = mysqli_query($koneksi, $sql);                            
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
                                       
    ?>
		
		<label for="stok">Stok</label>
                            <div class="form-group">
                            <div class="form-line">
                            <input readonly="readonly" id="stok" type="number" class="form-control" value="<?php echo $row["jumlah"];?>">
								
							
								
								
								</input>
                                     
									 
							</div>
                            </div>
 <?php
   		}
    } else {
       echo "0 results";
    }

     mysqli_close($koneksi);
 
 ?>
							
							