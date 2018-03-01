<?php

session_start();
include_once 'dbh.inc.php';
$q = intval($_GET['q']);
$uid = $_SESSION['u_id'];

$sql = "SELECT * FROM contacts WHERE contact_uid = ?
        ORDER BY contact_last, contact_first ASC;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_bind_param($stmt, "s", $uid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $datas = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row;
        }
    }

    echo '<h3 class="name">'.$datas["{$q}"]['contact_first'].' '.$datas["{$q}"]['contact_last']
         .'<h4>Email</h4>'.$datas["{$q}"]['contact_email']
         .'<h4>Phone</h4>'."(".substr($datas["{$q}"]['contact_phone'],0,3).") ".substr($datas["{$q}"]['contact_phone'],3,3)."-".substr($datas["{$q}"]['contact_phone'],-4,4)
         .'<h4>Address</h4>'.$datas["{$q}"]['contact_street_address']
         .'<br>'.$datas["{$q}"]['contact_city'].', '.$datas["{$q}"]['contact_state']
         .'<br>'.$datas["{$q}"]['contact_zip'];
}
