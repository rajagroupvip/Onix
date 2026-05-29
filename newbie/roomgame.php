<?php
include "header.php";
include "sidebar.php";
include "../../config/class_softgaming.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input (you may need to enhance this based on your requirements)
    $username = $_POST["username"];
    $provider = $_POST["provider"];
    $rtp = $_POST["rtp"];

    // Set RTP using the whitelabel class method
    $setRtpResult = $WL->controlUserRtp($username, $provider, $rtp);

    // Check if setting RTP was successful
    $setRtpResponse = json_decode($setRtpResult, true);
    if ($setRtpResponse && $setRtpResponse['status'] == 1) {
        $successMessage = "RTP successfully set for $username.";
    } else {
        $errorMessage = "Error setting RTP: " . ($setRtpResponse['msg'] ?? "Unknown error.");
    }
}

// Call the function to get active players
$callplayerResponse = $WL->call_players();
var_dump($callplayerResponse); // Melihat respons yang diterima dari API

$callplayer = json_decode($callplayerResponse, true);

?>

<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-1">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">DATA PEMAIN LIVE</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <h2>Data Pemain Aktif</h2>
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Provider</th>
                            <th>Game</th>
                            <th>Bet</th>
                            <th>Saldo</th>
                            <th>Total Debit</th>
                            <th>Total Credit</th>
                            <th>Target RTP</th>
                            <th>Real RTP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($callplayer && isset($callplayer['status']) && $callplayer['status'] == 1): ?>
                            <?php foreach ($callplayer['data'] as $data): ?>
                                <tr>
                                    <td><?= $data['user_code'] ?></td>
                                    <td><?= $data['provider_code'] ?></td>
                                    <td><?= $data['game_code'] ?></td>
                                    <td><?= $data['bet'] ?></td>
                                    <td><?= $data['balance'] ?></td>
                                    <td><?= $data['total_debit'] ?></td>
                                    <td><?= $data['total_credit'] ?></td>
                                    <td><?= $data['target_rtp'] ?></td>
                                    <td><?= $data['real_rtp'] ?></td>
                                    <td>
                                        <form method="post" action="">
                                            <input type="hidden" name="username" value="<?= $data['user_code'] ?>">
                                            <input type="hidden" name="provider" value="<?= $data['provider_code'] ?>">
                                            <input type="number" name="rtp" step="0.01" placeholder="Enter RTP" required>
                                            <button type="submit">Set RTP</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10">Tidak ada data pemain yang tersedia.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php
            // Display success or error message if setRtpResult is set
            if (isset($setRtpResult)) {
                echo "<p>";
                if (isset($successMessage)) {
                    echo $successMessage;
                } elseif (isset($errorMessage)) {
                    echo $errorMessage;
                }
                echo "</p>";
            }
            ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    </div>
</div>

<?php include 'footer.php';?>
