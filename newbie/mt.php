<?php 
include "header.php";
include "sidebar.php";
?>
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-1">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">MAINTENANCE</h2>
                    </div>
                </div>
            </div>
        </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Maintenance (NB: hanya berfungsi untuk website)</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Jenis</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && isset($_POST["status"])) {
                                    // Tangani pembaruan status
                                    $id = $_POST["id"];
                                    $newStatus = $_POST["status"];

                                    $updateSql = "UPDATE maintenance SET status = $newStatus WHERE id = $id";
                                    if ($conn->query($updateSql) === TRUE) {
                                        echo "<div class='alert alert-success' role='alert'>Status berhasil diperbarui</div>";
                                    } else {
                                        echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
                                    }
                                }

                                // Ambil data maintenance
                                $sql = "SELECT id, game, status FROM maintenance";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // Menentukan kelas CSS berdasarkan status
                                        $statusClass = $row["status"] == 1 ? "bg-danger text-white" : "";
                                        echo "<tr class='$statusClass'>
                                                <td>" . $row["id"] . "</td>
                                                <td>" . $row["game"] . "</td>
                                                <td>" . ($row["status"] == 1 ? "Maintenance" : "Running") . "</td>
                                                <td>
                                                    <form method='post'>
                                                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                                                        <button type='submit' class='btn btn-sm btn-info' name='status' value='" . ($row["status"] == 1 ? 0 : 1) . "'>Ubah Status</button>
                                                    </form>
                                                </td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>Tidak ada data dalam tabel maintenance</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>
