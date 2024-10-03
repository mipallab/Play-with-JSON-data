<?php

/**
 * autoload.php include
 */
if (file_exists(__DIR__ . "/autoload.php")) {
    require_once __DIR__ . "/autoload.php";
} else {
    echo "<b> autoload.php </b> file not found!";
}



/**
 * retrive data
 */
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

    // get form data
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $photo_name = $_FILES['photo'];


    if (empty($name) || empty($email) || empty($phone) || empty($_FILES['photo']['name'])) {
        // empty field massage
        $msg = alert("All Fields Are Required!", "danger");
    } else {

        // upload photo
        $photo_unique_name = move("assects/media/", $photo_name);

        // create function
        cerateData("data/member.JSON", [
            "id"    => unique_id(),
            "name"  => $name,
            "email" => $email,
            "phone" => $phone,
            "photo" => $photo_unique_name
        ]);

        // success massage
        $msg = alert("Data Stable", 'success');
        // reset form data
        resetData();

        header("Location: index.php");
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add data</title>
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
                    <h2>Add Data</h2>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input class="form-control" id="name" type="text" name="name"
                                value="<?php echo old('name'); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" type="email" name="email"
                                value="<?php echo old("email"); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input class="form-control" id="phone" type="text" name="phone"
                                value="<?php echo old('phone'); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="photo">Photo</label>
                            <input class="form-control" id="photo" type="file" name="photo">
                        </div>
                        <div class="mb-3">
                            <input class="btn btn-primary w-100" type="submit" name="submit" value="Submit">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>












    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"> </script>
</body>

</html>