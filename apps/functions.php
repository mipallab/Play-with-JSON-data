<?php

/**
 * alert function
 * @param msg alert massage
 * @param type alert type(danger, warning, danger)
 */

function alert(string $msg, string $type)
{
    return   "<div class='alert alert-{$type} alert-dismissible fade show' role='alert'>
                <strong> {$msg} </strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
}


/**
 * Old value
 * @param fieldName name(string)
 */

function old(string $fieldName)
{
    return  $_POST[$fieldName] ?? '';
}

/**
 * Reset Old data
 */
function resetData()
{
    return $_POST = [];
}


/**
 * generate unique id
 */

function unique_id()
{
    $n = time() . rand();

    return $n;
}


/**
 *  file Upload
 */

function move(string $file_path, array $name)
{
    // get file
    $file_name = $name['name'];
    $file_x = explode(".", $file_name);
    $file_exe = strtolower(end($file_x));
    $file_unique_name = date("Ymd") . "_" . time() . "_" . rand(9999, 9999999) . "_" . str_shuffle("1234567890") . "." . $file_exe;
    $file_tmp = $name['tmp_name'];


    // upload data to photos folder
    move_uploaded_file($file_tmp, $file_path . $file_unique_name);

    return $file_unique_name;
}
