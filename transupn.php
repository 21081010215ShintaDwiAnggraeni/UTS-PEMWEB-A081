<?php 
   
    include ('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trans Upn</title>
</head>
<body>

    <h2>TABLE TRANS UPN</h2>
        <div>
            <table border=1px>
                <thead bgcolor=pink>
                    <tr>
                        <th> <p> id_trans_upn</th>
                        <th>id_kondektur</th>
                        <th>id_bus</th>
                        <th>id_driver</th>
                        <th>jumlah_km</th>
                        <th>tanggal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        //proses menampilkan data dari database:
                        //siapkan query SQL
                        $query = "SELECT * FROM trans_upn";
                        $result = mysqli_query(connection(),$query);
                    ?>
                            
                    <?php while($data = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <td> <?php echo $data['id_trans_upn']; ?> </td>
                            <td> <?php echo $data['id_kondektur']; ?> </td>
                            <td> <?php echo $data['id_bus']; ?> </td>
                            <td> <?php echo $data['id_driver']; ?> </td>
                            <td> <?php echo $data['jumlah_km']; ?> </td>
                            <td> <?php echo $data['id_driver']; ?> </td>
                            <td>
                                <a href="<?php echo "addtransupn.php?id_trans_upn=".$data['id_trans_upn'] ?>"> Create</a> &nbsp;&nbsp;
                                <a href="<?php echo "updatetransupn.php?id_trans_upn=".$data['id_trans_upn'] ?>"> Update</a> &nbsp;&nbsp;
                                <a href="<?php echo "deletetransupn.php?id_trans_upn=".$data['id_trans_upn'] ?>"> Delete</a>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>    
        </main>
    </div>
</div>
</body>
</html>