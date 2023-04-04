<?php

include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>GAJI DRIVER</title>
</head>

<body>

    <h2 style="text-align:center">TABEL DRIVER</h2>

    <form action="" method="post">
        <label style="text-align:center" for="bulan">Pilih Bulan:</label>
        <select name="bulan" id="bulan">
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>
        <button type="submit">Tampilkan</button>
    </form>

    <div>
        <table class="centered-table" border=1px style="text-align:center">
            <thead bgcolor=pink>
                <tr>
                    <th>
                        <p> id_Driver
                    </th>
                    <th>Nama</th>
                    <th>Jumlah_KM</th>
                    <th>Gaji</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bulan'])) {
                    $bulan = $_POST['bulan'];
                    //...
                } else {
                    $bulan = "1";
                }

                ?>
                <h2 style="text-align:center">GAJI DRIVER BULAN KE-
                    <?php echo $bulan ?>
                </h2>
                <?php
                $query = "SELECT driver.id_driver, driver.nama, SUM(trans_upn.jumlah_km) as total_km
                                    FROM driver
                                    JOIN trans_upn ON driver.id_driver = trans_upn.id_driver
                                    WHERE MONTH(trans_upn.tanggal) = '$bulan' AND YEAR(trans_upn.tanggal) = YEAR(CURRENT_DATE())
                                    GROUP BY driver.id_driver";

                $result = mysqli_query(connection(), $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>


                        <tr>
                            <td>
                                <?php echo $row['id_driver']; ?>
                            </td>
                            <td>
                                <?php echo $row['nama']; ?>
                            </td>
                            <td>
                                <?php echo $row['total_km']; ?>
                            </td>
                            <td>
                                <?php echo "Rp." . $row['total_km'] * 3000; ?>
                            </td>
                        </tr>
                        <?php
                    }
                    mysqli_free_result($result);
                } else {

                    ?>
                </tbody>
            </table>
            <?php
            echo "<i style='margin-left:70px'>Tidak ada data.<i/>";
                }
                mysqli_close(connection());
                ?>
        </tbody>
        </table>
    </div>
    </main>
    </div>
    </div>
</body>

</html>