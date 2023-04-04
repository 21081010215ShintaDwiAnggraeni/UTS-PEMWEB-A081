<?php
include ('conn.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_kondektur'])) {
        //query untuk mengupdate data
        $id_kondektur_upd = $_GET['id_kondektur'];
        $query = "SELECT * FROM kondektur WHERE id_kondektur = '$id_kondektur_upd'";

        //eksekusi query
        $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kondektur = $_POST['id_kondektur'];
    $nama = $_POST['nama'];
    
    //query SQL
    $sql = "UPDATE kondektur SET nama='$nama'
    WHERE id_kondektur='$id_kondektur'";

    //eksekusi query
    $result = mysqli_query(connection(),$sql);
    if ($result) {
        $status = 'ok';
    }
    else {
        $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: kondektur.php?status='.$status);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UPDATE KONDEKTUR</title>
</head>
<body>
    <div class = "container" >
        <h2 align="center">DATA KONDEKTUR</h2>
            <table style="width:100%" cellspacing="0">
                
                            <a class="nav-link" href="<?php echo "bus.php"; ?>"><b>Data bus</b></a><br>
                            <a class="nav-link" href="<?php echo "driver.php"; ?>"><b>Data driver</b></a><br>
                            <a class="nav-link" href="<?php echo "kondektur.php"; ?>"><b>Data kondektur</b></a><br>
                            <a class="nav-link" href="<?php echo "transupn.php"; ?>"><b>Data trans_upn</b></a><br>
                            <a class="nav-link" href="<?php echo "addkondektur.php"; ?>"><b>Menambah Data</b></a><br>

                <tr class="akhir">
                    <td colspan="3">
                        <h2 align="center"> UPDATE KONDEKTUR</h2>
                            <form action="updatekondektur.php" method="POST">
                                <?php while($data = mysqli_fetch_array($result)) : ?>
                                <div>
                                    <label>Id Kondektur</label>
                                    <input type="text" class="form-control" placeholder="Id Kondektur" name="id_kondektur" value="<?php echo $data['id_kondektur']; ?>" required="required" readonly>        
                                </div>

                                <div>
                                    <label>nama</label>
                                    <input type="text" class="form-control" placeholder="nama" name="nama" value="<?php echo $data['nama']; ?>" required="required">
                                </div>

                                <?php endwhile; ?>

                                <button type="submit">Update</button>
                            </form>
                    </td>
            </tr>
</body>
</html>