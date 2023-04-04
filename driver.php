<?php
    include('conn.php');
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
                        <a class="nav-link" href="<?php echo "bus.php"; ?>"><b>data bus</b></a><br>
                        <a class="nav-link" href="<?php echo "driver.php"; ?>"><b>data driver</b></a><br>
                        <a class="nav-link" href="<?php echo "adddriver.php"; ?>"><b>Menambah Data</b></a><br>
                      </td>
                  </tr>
                <tr class="akhir">
                    <td colspan="6">
                        <table border="1" align="center" >
                            <thead>
                                <tr bgcolor="pink" >
                                    <th>id_driver</th>
                                    <th>nama</th>
                                    <th>no_sim</th>
                                    <th>alamat</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $query = "SELECT * FROM driver";
                                $result = mysqli_query(connection(),$query);
                                ?>

                                <?php 
                                    while($data = mysqli_fetch_array($result)): 
                                ?>
                                    <tr>
                                            <td>
                                                <?php 
                                                    echo $data['id_driver'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['nama'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['no_sim'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['alamat'];  
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo "updatedriver.php?id_driver=".$data['id_driver']; ?>" > Update</a>
                                                &nbsp;&nbsp;
                                               <a href="<?php echo "deletedriver.php?id_driver=".$data['id_driver']; ?>"> Delete</a>
                                            </td>
                                    </tr>
                                    
                                <?php endwhile ?>
                            </tbody>
                            
                        </td>

                </tr>
            </table>
</body>
</html>