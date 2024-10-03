<?php
// include autoload
if (file_exists(__DIR__ . "/autoload.php")) {
    require_once __DIR__ . "/autoload.php";
} else {
    echo "not include <b>autoload.php</b>";
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Data</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assects/css/style.css">
</head>

<body>


    <div class="container">
        <a class="btn btn-primary my-5" href="add-data.php">Add Data</a>
        <div class="card shadow">
            <div class="card-header">
                <h2>All Data</h2>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </thead>
                    <tbody>

                        <?php
                        $get_data = all("data/member.JSON", false);
                        $i = 0;
                        foreach ($get_data as $info):
                            $i++;
                        ?>
                            <tr class="align-middle">
                                <td><?php echo $i; ?></td>
                                <td><img class="tb-photo" src="assects/media/<?php echo $info->photo ?>" alt=""></td>
                                <td><?php echo $info->name; ?></td>
                                <td><?php echo $info->email; ?></td>
                                <td><?php echo $info->phone; ?></td>
                                <td>
                                    <a class="btn btn-info" href="edit.php?id=<?php echo $info->id; ?>"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="btn btn-warning" href="single-view.php?id=<?php echo $info->id; ?>"><i
                                            class="fa-solid fa-eye"></i></a>
                                    <a class="btn btn-danger" href="delete.php?id=<?php echo $info->id; ?>"><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>












    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"> </script>
</body>

</html>