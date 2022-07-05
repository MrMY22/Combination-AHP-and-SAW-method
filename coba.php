<?php
include 'koneksi.php';

$data = mysqli_query($conn, "Select * from kuesioner");
while ($d = mysqli_fetch_array($data)) {
    $s[] = $d['C8'];
}

$values = array_count_values($s);
$mode = array_search(min($values), $values);
echo $mode;
?>

<form method="POST" action="" enctype="multipart/form-data">
    <h5> Responden </h5>
    <div class="input-group mb-3">
        <input type="text" name="responden" class="form-control" required>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-sitemap"></span>
            </div>
        </div>
    </div>
    <h5> Alternatif </h5>
    <div class="input-group mb-3">
        <select class="form-control" name="alternatif">
            <?php
            $data = mysqli_query($conn, "Select * from alternatif ");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <option value="<?php echo $d['kode']; ?>"><?php echo $d['alternatif']; ?></option>
            <?php
            }
            ?>
        </select>
    </div>

    <table class="table">
        <thead style="background-color: gray; text-align: center; color:white;">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kriteria</th>
                <th scope="col">SP</th>
                <th scope="col">P</th>
                <th scope="col">CP</th>
                <th scope="col">TP</th>
                <th scope="col">STP</th>
            </tr>
        </thead>

        <?php
        $no = 1;
        $data1 = mysqli_query($conn, "Select * from kriteria ");
        while ($d1 = mysqli_fetch_array($data1)) {
        ?>
            <tbody>
                <tr>
                    <th scope="row" style="text-align: center;"><?php echo $no++ ?></th>
                    <td><?php echo $d1['kriteria'] ?></td>
                    <td align="center"><input type="radio" name="<?php echo $d1['kode'] ?>" value="5" required></td>
                    <td align="center"><input type="radio" name="<?php echo $d1['kode'] ?>" value="4" required></td>
                    <td align="center"><input type="radio" name="<?php echo $d1['kode'] ?>" value="3" required></td>
                    <td align="center"><input type="radio" name="<?php echo $d1['kode'] ?>" value="2" required></td>
                    <td align="center"><input type="radio" name="<?php echo $d1['kode'] ?>" value="1" required></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
    <div class="row">
        <div class="col">
            <button type="submit" name="tombol" class="btn btn-primary btn-block">Simpan</button>
        </div>
    </div>
</form>

<form method="POST" action="" enctype="multipart/form-data">
    <div class="input-group mb-3">
        <select class="form-control col-lg-1" name="banding1">
            <?php
            $no = 1;
            $data = mysqli_query($conn, "Select * from kriteria");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <option><?php echo $d['kode'] ?></option>
            <?php
            }
            ?>
        </select>&nbsp;&nbsp;&nbsp;
        <select class="form-control" name="level">
            <option value="9">9 - Satu elemen mutlak penting daripada elemen lainnya</option>
            <option value="8">8 - Elemen antara elemen Pertimbangan yang saling berdekatan</option>
            <option value="7">7 - Satu elemen jelas lebih mutlak penting daripada elemen lainnya</option>
            <option value="6">6 - Elemen antara elemen Pertimbangan yang saling berdekatana</option>
            <option value="5">5 - Elemen yang satu lebih penting daripada yang lainnya</option>
            <option value="4">4 - Elemen antara elemen Pertimbangan yang saling berdekatan</option>
            <option value="3">3 - Elemen yang satu sedikit lebih penting daripada elemen lainnya</option>
            <option value="2">2 - Elemen antara elemen Pertimbangan yang saling berdekatan</option>
            <option value="1">1 - Kedua elemen sama pentingnya</option>
        </select>&nbsp;&nbsp;&nbsp;
        <select class="form-control col-lg-1" name="banding2">
            <?php
            $no = 1;
            $data = mysqli_query($conn, "Select * from kriteria");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <option><?php echo $d['kode'] ?></option>
            <?php
            }
            ?>
        </select>&nbsp;&nbsp;
        <button type="submit" name="tombol" class="btn btn-primary btn-block col-lg-1">Simpan</button>
    </div>
</form>