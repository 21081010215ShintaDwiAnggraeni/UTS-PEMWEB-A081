<?php

include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>GAJI KONDEKTUR</title>
</head>

<body>

    <h2>TABLE KONDEKTUR</h2>
    //membuat urutan bulan
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
        <table border=2px>
            <thead bgcolor=pink>
                <tr>
                    <th>
                        <p> id_Kondektur
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

                } else {
                    $bulan = "1";
                }

                ?>
                <h2 style="text-align:center">GAJI KONDEKTUR BULAN KE-
                    <?php echo $bulan ?>
                </h2>
                <?php
                $query = "SELECT kondektur.id_kondektur, kondektur.nama, SUM(trans_upn.jumlah_km) as total_km
                                    FROM kondektur
                                    JOIN trans_upn ON kondektur.id_kondektur = trans_upn.id_kondektur
                                    WHERE MONTH(trans_upn.tanggal) = '$bulan' AND YEAR(trans_upn.tanggal) = YEAR(CURRENT_DATE())
                                    GROUP BY kondektur.id_kondektur";

                $result = mysqli_query(connection(), $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <tr>
                            <td>
                                <?php echo $row['id_kondektur']; ?>
                            </td>
                            <td>
                                <?php echo $row['nama']; ?>
                            </td>
                            <td>
                                <?php echo $row['total_km']; ?>
                            </td>
                            <td>
                                <?php echo "Rp." . $row['total_km'] * 1500; ?>
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