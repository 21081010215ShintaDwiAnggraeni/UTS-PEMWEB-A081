<?php 
include ('conn.php');

$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];

    //query untuk menambah data
    $query = "INSERT INTO trans_upn (id_trans_upn, id_kondektur, id_bus, id_driver, jumlah_km, tanggal) 
        VALUES ('$id_trans_upn', '$id_kondektur', '$id_bus', '$id_driver', '$jumlah_km', '$tanggal')";

    //eksekusi query
    $result = mysqli_query(connection(), $query);
    if($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE TRANS UPN</title>
</head>
<body>
    <ul>
        <li>
            <a href="<?php echo "tabeltransupn.php"; ?>">TABEL TRANS UPN</a>
        </li>        
    </ul>

    <main role="main">
    <?php 
        if ($status=='ok') {
            echo '<br><div>Data trans_upn berhasil disimpan </div>';
        } elseif ($status=='err') {
            echo '<br><div>Data trans_upn gagal disimpan</div>';
        }
    ?>

    <h2>CREATE TRANS UPN</h2>
    <form action="updatetransupn.php" method = "POST">
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

    <button type="submit" class="btn btn-primary">Create</button>
    </form>        
    </main>

</body>
</html>