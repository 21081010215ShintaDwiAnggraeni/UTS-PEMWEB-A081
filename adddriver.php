<?php 
    include ('conn.php');

    $status = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_driver= $_POST['id_driver'];
        $nama = $_POST['nama'];
        $no_sim = $_POST['no_sim'];
        $alamat = $_POST['alamat'];
        //query SQL
        $query = "INSERT INTO driver (id_driver, nama, no_sim, alamat) 
        VALUES('$id_driver', '$nama', '$no_sim', '$alamat')"; 
  
        //eksekusi query
        $result = mysqli_query(connection(),$query);
        if ($result) {
          $status = 'ok';
        }
        else{
          $status = 'err';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>DRIVER</title>
</head>
<body>
    <div class = "container" >
        <h2 align="center">DATA DRIVER</h2>
            <table style="width:100%" cellspacing="0">
                <tr class="atas">
                  <td class="dua">
                        <center>    
                            <a class="nav-link" href="<?php echo "bus.php"; ?>"><b>data bus</b></a>
                        </center>    
                    </td>

                    <td class="tiga">
                        <center>    
                            <a class="nav-link" href="<?php echo "driver.php"; ?>"><b>data driver</b></a>
                        </center>    
                    </td>
                </tr>

                <tr class="tengah">
                    <td colspan="1">
                      
                    </td>
                    <td>
                        <center>    
                            <a class="nav-link" href="<?php echo "adddriver.php"; ?>"><b>Menambah Data</b></a>
                        </center>
                    </td>
                </tr>

                <tr class="akhir">
                    <td colspan="3">
                      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                        <?php 
                          if ($status=='ok') {
                            echo '<br><br><div class="alert alert-success" role="alert">Data Driver berhasil disimpan</div>';
                          }
                          elseif($status=='err'){
                            echo '<br><br><div class="alert alert-danger" role="alert">Data Driver gagal disimpan</div>';
                          }
                        ?>
                
                      <h2 style="margin: 30px 0 30px 0;">Form Driver</h2>
                      <form action="tambah_driver.php" method="POST">
                      <div class="form-group">
                        <label>id_driver</label>
                        <input type="text" class="form-control" placeholder="id_driver" name="id_driver" required="required">
                      </div>
                      <div class="form-group">
                        <label>nama</label>
                        <input type="text" class="form-control" placeholder="nama" name="nama" required="required">
                      </div>
                      <div class="form-group">
                        <label>no_sim</label>
                        <input type="text" class="form-control" placeholder="no_sim" name="no_sim" required="required">
                      </div>
                      <div class="form-group">
                        <label>alamat</label>
                        <input type="text" class="form-control" placeholder="alamat" name="alamat" required="required">
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                  </main>
                    </td>
                </tr>
            </table>
    </div>
</body>
</html>