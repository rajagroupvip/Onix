<?php 
include "header.php";
include "sidebar.php";
$query_active = "SELECT * FROM tb_theme WHERE status = 1";
$result_active = mysqli_query($conn, $query_active);
$query_inactive = "SELECT * FROM tb_theme WHERE status = 0";
$result_inactive = mysqli_query($conn, $query_inactive);
$notification_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $theme_id = $_POST['theme_id'];
    $update_query = "UPDATE tb_theme SET status = 0 WHERE status = 1";
    if (mysqli_query($conn, $update_query)) {
        $update_query_new = "UPDATE tb_theme SET status = 1 WHERE id = $theme_id";
        if (mysqli_query($conn, $update_query_new)) {
            $notification_message = "Tema berhasil diubah.";
        } else {
            $notification_message = "Gagal mengubah tema baru.";
        }
    } else {
        $notification_message = "Gagal mengubah tema lama.";
    }
}

?>
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-1">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Tema</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">           
            <div class="card-datatable table-responsive">
                <table id="basic-datatable" class="invoice-list-table table border-top">
                    <thead>
                        <tr class="bg-warning">
                            <th class="text-center" style="vertical-align: middle;">#</th>
                            <th class="text-center" style="vertical-align: middle;">Tema Aktif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Jika terdapat data
                        if (mysqli_num_rows($result_active) > 0) {
                            $counter = 1;
                            // Loop untuk menampilkan data
                            while ($row = mysqli_fetch_assoc($result_active)) {
                                echo "<tr>";
                                echo "<td class='text-center'>" . $counter . "</td>";
                                echo "<td class='text-center'>" . $row['name'] . "</td>";
                                echo "</tr>";
                                $counter++;
                            }
                        } else {
                            // Jika tidak ada data
                            echo "<tr><td colspan='3' class='text-center'>Tidak ada data tema dengan status 1.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <hr>
                <h4>Pilih Tema Baru</h4>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-3">
                        <label for="theme_id" class="form-label">Tema Baru:</label>
                        <select name="theme_id" id="theme_id" class="form-select">
                            <?php
                            // Jika terdapat data tema dengan status 0
                            if (mysqli_num_rows($result_inactive) > 0) {
                                // Loop untuk menampilkan data tema
                                while ($row = mysqli_fetch_assoc($result_inactive)) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                }
                            } else {
                                echo "<option value='' disabled>Tidak ada tema yang tersedia.</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Tema</button>
                </form>
                <?php 
                if (!empty($notification_message)) {
                    echo "<div class='alert alert-success mt-3'>" . $notification_message . "</div>";
                }
                ?>
            </div>
        </div>
    </div>
<?php include 'footer.php';?>