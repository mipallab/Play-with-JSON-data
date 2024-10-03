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




if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])) {
    // get data from form
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $photo = $_FILES['photo'] ?? null;

    // print_r($photo);

    if (empty($name) || empty($email) || empty($phone) || empty($_FILES['photo']['name'])) {
        // empty field massage
        $msg = alert("All Fields Are Required!", "danger");
    } else {
        // upload photo
        $photo_name =  move("assects/media/", $photo);
        // update data
        $update_data = [
            "id"    => $get_id,
            "name"  => $name,
            "email" => $email,
            "phone" => $phone,
            "photo" => $photo_name
        ];
        update($update_data, $get_id, 'data/member.JSON');
        $msg = alert("Data Updated!", 'success');
        header("location: single-view.php?id={$get_id}");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit <?php echo $single_data->name; ?></title>
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
                    <h2>Edit Data</h2>
                </div>
                <div class="card-body">
                    <?php echo $msg ?? null;
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input class="form-control" id="name" type="text"
                                value="<?php echo (old('name') ? old('name') : $single_data->name) ?>" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" type="email"
                                value="<?php echo (old('email') ? old('email') : $single_data->email) ?>" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input class="form-control" id="phone" type="text"
                                value="<?php echo (old('phone') ? old('phone') : $single_data->phone) ?>" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="photo">Photo</label>
                            <input class="form-control" id="photo" type="file" name="photo">
                        </div>
                        <div class="mb-3">
                            <input class="btn btn-warning" type="submit" value="Update" name="update">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>












    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"> </script>
</body>

</html>