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
                        <h2 class="text-white pb-2 fw-bold">LIST GAME</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <h1>Pilih Game Provider:</h1>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" class="form-inline">
                <div class="form-group mr-2">
                    <label for="game_provider" class="mr-2">Pilih Game Provider:</label>
                    <select name="game_provider" id="game_provider" class="form-control">
                    <?php
                        $sql = "SELECT DISTINCT code FROM tb_wprovider";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["code"] . "'>" . $row["code"] . "</option>";
                        }
                        ?>
                        <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Tampilkan Data</button>
            </form>
        </div>
         <?php
       
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected game provider
    $selected_provider = $_POST["game_provider"];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM tb_gamenew WHERE game_provider = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selected_provider);
    $stmt->execute();

    $result = $stmt->get_result();

    // Display the results using DataTables
    if ($result->num_rows > 0) {
        echo "<h2>Data Game dari Provider $selected_provider:</h2>";
        echo "<table id='dataTable' class='table table-bordered table-striped'>";
        echo "<thead><tr><th>cuid</th><th>game_code</th><th>game_name</th><th>game_category</th><th>game_image</th><th>game_url</th></tr></thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["cuid"] . "</td>";
            echo "<td>" . $row["game_code"] . "</td>";
            echo "<td>" . $row["game_name"] . "</td>";
            echo "<td>" . $row["game_category"] . "</td>";
            echo "<td><img src='" . $row["game_image"] . "' alt='Game Image' style='max-width: 100px; max-height: 100px;'></td>";
            echo "<td>" . $row["game_url"] . "</td>";
            echo "<td><a href='edit_game_image.php?cuid=" . $row["cuid"] . "'>Edit Image</a></td>";
            echo "</tr>";
        }

        echo "</tbody></table>";

        // Add DataTables script
        echo "<script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>";
        echo "<script src='https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js'></script>";
        echo "<script src='https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js'></script>";
        echo "<script>$(document).ready(function() { $('#dataTable').DataTable(); });</script>";
    } else {
        echo "Tidak ada data yang ditemukan untuk Provider $selected_provider";
    }

    // Close the prepared statement
    $stmt->close();
}
?>