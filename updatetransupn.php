<?php
include ('conn.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_trans_upn'])) {
        //query untuk mengupdate data
        $id_trans_upn_upd = $_GET['id_trans_upn'];
        $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$id_trans_upn_upd'";

        //eksekusi query
        $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];
    
    //query SQL
    $sql = "UPDATE trans_upn SET id_trans_upn='$id_trans_upn', id_kondektur ='$id_kondektur', id_bus='$id_bus', id_driver='$id_driver', 
    jumlah_km='$jumlah_km', tanggal='$tanggal'
    WHERE id_trans_upn='$id_trans_upn'";

    //eksekusi query
    $result = mysqli_query(connection(),$sql);
    if ($result) {
        $status = 'ok';
    }
    else {
        $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: transupn.php?status='.$status);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE TRANS UPN</title>
</head>
<body>
    <ul>
        <li>
            <a href="<?php echo "transupn.php"; ?>">TABEL TRANS UPN</a>
        </li>
        <li>
            <a href="<?php echo "addtransupn.php"; ?>">CREATE TRANS UPN</a>
        </li>
    </ul>

    <h2>UPDATE TRANS BUS</h2>
    <form action="updatetransupn.php" method="POST">
        <?php while($data = mysqli_fetch_array($result)) : ?>
        <div class="form-group">
            <label>Id Trans Upn</label>
            <input type="text" class="form-control" placeholder="Id Trans Upn" name="id_trans_upn" required="required">        
        </div>
    
        <div class="form-group">
            <label>Id Kondektur</label>
            <input type="text" class="form-control" placeholder="Id Kondektur" name="id_kondektur" required="required">
        </div>

        <div class="form-group">
            <label>Id Bus</label>
            <input type="text" class="form-control" placeholder="Id Bus" name="id_bus" required="required">
        </div>

        <div class="form-group">
            <label>Id Driver</label>
            <input type="text" class="form-control" placeholder="Id Driver" name="id_driver" required="required">
        </div>

        <div class="form-group">
            <label>Jumlah Km</label>
            <input type="text" class="form-control" placeholder="Jumlah Km" name="jumlah_km" required="required">
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="text" class="form-control" placeholder="Tanggal" name="tanggal" required="required">
        </div>

        <?php endwhile; ?>

        <button type="submit">Update</button>
    </form>
</body>
</html>