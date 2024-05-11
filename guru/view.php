<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <div class="card-title h3 col-8">Data Guru</div>
                <div class="col-4">
                    <a href="?m=guru&s=add" class="btn btn-lg btn-primary float-end">Tambah</a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Absen</th>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Foto</th>
                            <th>Nomor Telpon</th>
                            <th>Mata Pelajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once('config.php');
                        $sql = "SELECT guru.id as gid, guru.*, mapel.* FROM guru JOIN mapel ON guru.mapel_id = mapel.id ORDER BY mapel ASC";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0 ) {
                            $no = 1;
                            while ($r = mysqli_fetch_assoc($result)) {
                                $foto = isset($r['foto']) ? $r ['foto'] : 'not_found.png';
                                echo '<tr>
                                    <td>'.$no.'</td>
                                    <td>'.$r['nip'].'</td>
                                    <td>'.$r['name'].'</td>
                                    <td>'.$r['pob'].'</td>
                                    <td>'.date('d F Y', strtotime ($r['dob'])).'</td>
                                    <td> <img style="object-fit:cover; aspect-ratio: 1/1;" width="120px" heigth="auto" src="guru/foto/'.$photo.'" alt="Undefined"> </td>
                                    <td>'.$r['phone'].'</td>
                                    <td>'.$r['mapel_id'].'</td>
                                    <td> <img style="object-fit:cover; aspect-ratio: 1/1;" width="120px" heigth="auto" src="guru/foto/'.$foto.'" alt="Undefined"> </td>
                                    <td>
                                        <a href="?m=guru&s=edit&id='.$r['gid'].'" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="?m=guru&s=delete&id='.$r['gid'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin guru akan dihapus?, yakin nih???\')">Hapus</a>
                                    </td>
                                </tr>';
                                $no++;
                            }
                        } else {
                            echo "<tr>
                                <td colspan='9' align='center'>Data Kosong</td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>