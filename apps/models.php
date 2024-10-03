<?php

/**
 * Insert data
 */
function cerateData(string $path, array $get_data)
{
    // get data form JSON file
    $data = json_decode(file_get_contents($path, true));

    // data insert in array
    array_push($data, $get_data);

    // data insert into JSON file
    file_put_contents($path, json_encode($data));
}


/**
 * Get all data
 */

function all(string $path, bool $isArray)
{
    $all_data = json_decode(file_get_contents($path), $isArray);
    return $all_data;
}

/**
 * Find single data
 */

function find(string $find_id, string $path, bool $isArray)
{
    // read all JSON data
    $all_data = json_decode(file_get_contents($path), $isArray);

    // search single data
    foreach ($all_data as $item) {
        if (is_array($item)) {      // is array
            if ($find_id == $item['id']) {
                return $item;
            }
        } else {                    // is object
            if ($find_id ==  $item->id) {
                return $item;
            }
        }
    }
}


/**
 *  Update Data
 */

function update(array $replaceArr, string $find_id, string $path)
{
    //find all data
    $users = json_decode(file_get_contents($path), true);


    foreach ($users as $key => $single_user) {
        if ($single_user['id'] ==  $find_id) {
            $users[$key] = $replaceArr;
            break;
        }
    }

    file_put_contents($path, json_encode($users));
}


/**
 *  Delete/Remove Data
 */

function remove(string $find_id, string $path)
{
    //find all data
    $users = json_decode(file_get_contents($path), true);

    foreach ($users as $key => $remove_user) {
        if ($remove_user['id'] ==  $find_id) {
            unset($users[$key]);
            break;
        }
    }

    file_put_contents($path, json_encode($users));
}
