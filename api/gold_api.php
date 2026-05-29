<?php
require '../config/koneksi.php';
ini_set('display_errors', 1);
error_reporting(E_ALL && ~E_NOTICE);

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$file = fopen("user.json", "w");
fwrite($file, json_encode($data));
fclose($file);

if ($data) {
    $method = $data['method'];
    $username = $data['user_code'];

    if ($method) {
        if ($method == "user_balance") {
            $cek_user = mysqli_query($conn, "SELECT * FROM tb_user WHERE user = '$username'");
            $data_user = mysqli_fetch_assoc($cek_user);

            if ($data_user) {
                $cek_b = mysqli_query($conn, "SELECT * FROM tb_balance WHERE userID = '".$data_user['cuid']."'");
                $data_b = mysqli_fetch_assoc($cek_b);

                $balance = ($data_b) ? $data_b['active'] : 0;

                $response = array(
                    'status' => '1',
                    'user_balance' => $balance
                );
            } else {
                $response = array('status' => '0', 'msg' => 'USER_NOT_FOUND');
            }
        } else if ($method == "transaction") {
            $cek_user = mysqli_query($conn, "SELECT * FROM tb_user WHERE user = '$username'");
            $data_user = mysqli_fetch_assoc($cek_user);

            $cek_b = mysqli_query($conn, "SELECT * FROM tb_balance WHERE userID = '".$data_user['cuid']."'");
            $data_b = mysqli_fetch_assoc($cek_b);

            $balance = ($data_b) ? $data_b['active'] : 0;

            if ($data['game_type'] == "slot") {
                $pid = '1';
                $provider_code = $data['slot']['provider_code'];
                $game_code = $data['slot']['game_code'];
                $type = $data['slot']['type'];
                $bet_money = $data['slot']['bet_money'];
                $win_money = $data['slot']['win_money'];
                $txn_id = $data['slot']['txn_id'];
                $txn_type = $data['slot']['txn_type'];
            } else if ($data['game_type'] == "live") {
                $pid = '3';
                $provider_code = $data['live']['provider_code'];
                $game_code = $data['live']['game_code'];
                $type = $data['live']['type'];
                $bet_money = $data['live']['bet_money'];
                $win_money = $data['live']['win_money'];
                $txn_id = $data['live']['txn_id'];
                $txn_type = $data['live']['txn_type'];
            }

            if ($bet_money > $balance) {
                $response = array('status' => '0', 'user_balance' => $balance, 'msg' => 'INSUFFICIENT_USER_FUNDS');
            } else {
                $a = $balance - $bet_money;
                $b = $a + $win_money;

                $date_c = date("Y-m-d H:i:s");

                // Update balance di tb_balance
                $updateBalanceQuery = "UPDATE tb_balance SET active = ? WHERE userID = ?";
                $stmtBalance = mysqli_prepare($conn, $updateBalanceQuery);

                if ($stmtBalance) {
                    mysqli_stmt_bind_param($stmtBalance, "ss", $b, $data_user['cuid']);

                    if (mysqli_stmt_execute($stmtBalance)) {
                        $response = array('status' => '1');
                    } else {
                        $response = array('status' => '0', 'msg' => 'UPDATE_BALANCE_FAILED');
                    }

                    mysqli_stmt_close($stmtBalance);
                } else {
                    $response = array('status' => '0', 'msg' => 'PREPARE_STATEMENT_BALANCE_FAILED');
                }
            }
        }
    }
} else {
    $response = array('status' => '0', 'msg' => 'INVALID_METHOD');
}

print json_encode($response, JSON_PRETTY_PRINT);
