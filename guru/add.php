<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <div class="card-title h3 col-8">Tambah Guru</div>
                <div class="col-4">
                    <a href="?m=guru&s=view" class="btn btn-lg btn-primary float-end">Kembali</a>
                </div>
            </div>

            <div class="card-body">
                <form action="?m=guru&s=save" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="number" name="nip" class="form-control" placeholder="Nomor Induk Penduduk" required autofocus>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="pob" class="form-control" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Tanggal Lahir" name="tanggal_lahir" class="form-control" onblur="(this.type='text')" onfocus="(this.type='date')" required>
                    </div>
                    <div class="mb-3">
                        <select name="mapel_id" class="form-control" required>
                            <option>Kelas</option>
                            <?php
                            require_once ('config.php');
                            $sql = "SELECT * FROM kelas";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='$row[id]'>$row[kelas]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Foto Profil :</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                    </div>
                    
                    <div class="mb-3">
                        <input type="reset" class="btn btn-secondary">&nbsp;
                        <input type="submit" value="Simpan" name="simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $kelas_id = $_POST['kelas_id'];

    $sql = "INSERT INTO guru (nis, nama, jk, tempat_lahir, tanggal_lahir, kelas_id) VALUES ('$nis', '$nama', '$jk', '$tempat_lahir', '$tanggal_lahir', '$kelas_id')";

    if (mysqli_query($config, $sql)) {
        header('Location: ?m=guru&s=view');
    } else {
        echo 'Error: ' . mysqli_error($config);
    }
}
?>