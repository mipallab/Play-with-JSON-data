<?php

/**
 * functions.php file require
 */
if (file_exists(__DIR__ . "/apps/functions.php")) {
    require_once __DIR__ . "/apps/functions.php";
} else {
    echo "<strong>functions.php</strong> file not found";
}



/**
 * models.php file require
 */
if (file_exists(__DIR__ . "/apps/models.php")) {
    require_once __DIR__ . "/apps/models.php";
} else {
    echo "<strong>models.php</strong> file not found";
}
