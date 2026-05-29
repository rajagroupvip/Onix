<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php
// Memeriksa jika tombol simpan ditekan
if(isset($_POST['simpan'])){
    // Ambil data dari form
    $cuid = $_POST['cuid'];
    $image = $_POST['image'];
    $content = $_POST['content'];
    $status = $_POST['status'];

    // Lakukan update ke database
    $sql = "UPDATE tb_banner SET image='$image', content='$content', status='$status' WHERE cuid='$cuid'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Data berhasil diupdate";
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}

// Query untuk menampilkan data dari tabel
$query = "SELECT * FROM tb_banner";
$result = mysqli_query($conn, $query);
?>
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-1">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">POPUP KONTEN</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h3>Data Banner</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>image</th>
                            <th>content</th>
                            <th>status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['cuid']; ?></td>
                            <td><img src="<?php echo $row['image']; ?>" alt="Banner Image"></td>
                            <td><?php echo $row['content']; ?></td>
                            <td>
                            <?php 
                                if ($row['status'] == 1) {
                                    echo "Aktif";
                                } else {
                                    echo "Off";
                                }
                            ?>
                        </td>

                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#editModal<?php echo $row['cuid']; ?>">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="editModal<?php echo $row['cuid']; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="editModalLabel<?php echo $row['cuid']; ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel<?php echo $row['cuid']; ?>">
                                                    Edit Data Banner</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="cuid"
                                                        value="<?php echo $row['cuid']; ?>">
                                                    <div class="form-group">
                                                        <label for="image">Image</label>
                                                        <input type="text" class="form-control" id="image" name="image"
                                                            value="<?php echo $row['image']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="content">Content</label>
                                                        <input type="text" class="form-control" id="content"
                                                            name="content" value="<?php echo $row['content']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select class="form-control" id="status" name="status">
                                                            <option value="1"
                                                                <?php if($row['status'] == 1) echo "selected"; ?>>Aktif
                                                            </option>
                                                            <option value="0"
                                                                <?php if($row['status'] == 0) echo "selected"; ?>>Off
                                                            </option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        name="simpan">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>