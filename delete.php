<?php

// include autoload
if (file_exists(__DIR__ . "/autoload.php")) {
    require_once __DIR__ . "/autoload.php";
} else {
    echo "not include <b>autoload.php</b>";
}


// get id from url
if (isset($_GET['id'])) {
    $get_id = $_GET['id'];
} else {
    header("location: index.php");
}

remove($get_id, "data/member.JSON");

header("location:index.php");
