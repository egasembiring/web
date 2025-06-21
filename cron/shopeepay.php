<?php
require_once '../mainconfig.php';

$private_sign = "Qwerty132465";

if ($_GET) {
    if (isset($_GET['pkg']) && isset($_GET['bigtext']) && isset($_GET['sign'])) {
        $pkg = $_GET['pkg'];
        $bigtext = $_GET['bigtext'];
        $sign = $_GET['sign'];
        if ($pkg == 'com.shopee.id' && $sign == $private_sign) {
            $filter_amount = strtolower($bigtext);
            $filter_amount = explode('rp', $filter_amount)[1] ?? null;
            if ($filter_amount === null) {
                error_log("[SHOPPE] {$bigtext}");
                exit(http_response_code(400));
            }
            $filter_amount = explode(' ', $filter_amount)[0] ?? null;
            if ($filter_amount === null) {
                error_log("[SHOPPE] {$bigtext}");
                exit(http_response_code(400));
            }
            $filter_amount = explode('.', $filter_amount);
            $filter_amount = implode('', $filter_amount);
            if (!$filter_amount) {
                error_log("[DANA] {$bigtext}");
                exit(http_response_code(400));
            }
            $amount = $db->real_escape_string($filter_amount);
            $check_deposit = $db->query("SELECT * FROM pembelian_guest WHERE metode = 'SHOPEEPAY' AND status = 'Pending' ORDER BY id ASC");
            if (mysqli_num_rows($check_deposit) == 0) error_log("[SHOPEEPAY] DATA PEMBELIAN WITH METHOD SHOPEEPAY NOT FOUND");
            while ($data_deposit = $check_deposit->fetch_assoc()) {
                $deposit_id = $data_deposit['order_id'];
                $user = $data_deposit['phone'];
                $total_amount = $data_deposit['harga'];
                if ($total_amount == $amount) {
                    $date = date("Y-m-d H:i:s");
                    $db->query("UPDATE pembelian_guest SET status = 'Processing', date_update='$date' WHERE harga='$amount' AND order_id='".$data_deposit['order_id']."'");
                    $db->query("INSERT INTO mutasi_shopeepay VALUES('', '{$user}', '+', '{$total_amount}','{$date}')");
                   
                    error_log("[SHOPEEPAY] DATA DEPOSIT WITH AMOUNT RP. {$amount} SUCCESS");
                } else {
                    error_log("[SHOPEEPAY] DATA DEPOSIT WITH AMOUNT RP. {$amount} NOT FOUND");
                }
            }
        } else {
            exit(http_response_code(401));
            error_log("[SHOPPE] INVALID SIGN OR PKG ID");
        }
    } else {
        exit(http_response_code(400));
        error_log("[SHOPPE] BAD REQUEST");
    }
} else {
    exit(http_response_code(404));
}
