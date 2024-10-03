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

// get single data
$single_data = find($get_id, 'data/member.JSON', false);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $single_data->name; ?> </title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assects/css/style.css">
</head>

<body>


    <div class="container">
        <a class="btn btn-primary my-5" href="index.php">Back</a>

        <div class="col-md-6 mx-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h2><?php echo  $single_data->name; ?></h2>
                </div>
                <div class="card-body">
                    <div class="pro-img">
                        <img src="assects/media/<?php echo  $single_data->photo; ?>" alt="">
                    </div>
                    <div class="info">
                        <table class='table'>
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo  $single_data->name; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $single_data->email; ?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td> <?php echo  $single_data->phone; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>












    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"> </script>
</body>

</html>