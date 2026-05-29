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
                        <h2 class="text-white pb-2 fw-bold">History</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

        <!-- Form HTML -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                     <div class="form-group mb-2">
                                <label class="form-label">User :</label>
                                <select name="username" class="form-control selectpicker" data-live-search="true"
                                    title="Pilih User" required>
                                    <?php
                                        $sql_11 = mysqli_query($conn, "SELECT * FROM `tb_user` ORDER BY username ASC") or die(mysqli_error());
                                        while ($s11 = mysqli_fetch_array($sql_11)) {
                                    ?>
                                    <option value="<?php echo $s11['username']; ?>"> <?php echo $s11['username']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

            
                             <div class="form-group mb-2">
                                <label class="form-label">Jenis :</label>
                                <select name="gametype" class="form-control select2" required>
                                    <option value="0"> Pilih </option>
                                    <option value="slot"> Slot </option>
                                    <option value="casino"> Casino </option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
         <?php
        // Cek apakah ada pengiriman form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Periksa apakah input username dan gametype telah diberikan
            if (!empty($_POST['username']) && !empty($_POST['gametype'])) {
                // Ambil nilai dari form
                $username = $_POST['username'];
                $gametype = $_POST['gametype'];

                // Panggil fungsi gethistory() dengan nilai dari form
                $history = $WL->gethistory($username, $gametype);

                // Dekode respons JSON
                $decoded_history = json_decode($history, true);

                // Periksa apakah respons berhasil
                if ($decoded_history && isset($decoded_history['status']) && $decoded_history['status'] == 1) {
                    // Tampilkan hasil riwayat permainan
                    echo "<h3>Game History:</h3>";
                    echo "<div class='table-responsive'>";
                    echo "<table id='myTable' class='table table-bordered'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>History ID</th>";
                    echo "<th>User Code</th>";
                    echo "<th>Provider Code</th>";
                    echo "<th>Game Code</th>";
                    echo "<th>Type</th>";
                    echo "<th>Bet Money</th>";
                    echo "<th>Win Money</th>";
                    echo "<th>Transaction ID</th>";
                    echo "<th>User Start Balance</th>";
                    echo "<th>User End Balance</th>";
                    echo "<th>Agent Start Balance</th>";
                    echo "<th>Agent End Balance</th>";
                    echo "<th>Created At</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    foreach ($decoded_history['slot'] as $data) {
                        echo "<tr>";
                        echo "<td>" . $data['history_id'] . "</td>";
                        echo "<td>" . $data['user_code'] . "</td>";
                        echo "<td>" . $data['provider_code'] . "</td>";
                        echo "<td>" . $data['game_code'] . "</td>";
                        echo "<td>" . $data['type'] . "</td>";
                        echo "<td>" . $data['bet'] . "</td>";
                        echo "<td>" . $data['win'] . "</td>";
                        echo "<td>" . $data['txn_id'] . "</td>";
                        echo "<td>" . $data['user_before_balance'] . "</td>";
                        echo "<td>" . $data['user_after_balance'] . "</td>";
                        echo "<td>" . $data['agent_before_balance'] . "</td>";
                        echo "<td>" . $data['agent_after_balance'] . "</td>";
                        echo "<td>" . $data['created_at'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                } else {
                    // Tampilkan pesan jika respons tidak berhasil
                    echo "<p style='color:red;'>Failed to fetch game history.</p>";
                }
            } else {
                // Tampilkan pesan jika input kosong
                echo "<p style='color:red;'>Username and gametype are required.</p>";
            }
        }
        ?>
<!-- Include jQuery and DataTables CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<?php include 'footer.php';?>
