<?php
include('config.php');

if (isset($_GET['id'])) {
    $vehId = $_GET['id'];

    $getEdit = mysqli_query($conn, "SELECT * FROM vehicles WHERE id='$vehId'");
    while ($edit = mysqli_fetch_assoc($getEdit)) {
        $make = $edit['make'];
        $meg = $edit['meg'];
        $logo = $edit['logo'];
        $hp = $edit['hp'];
        $torque = $edit['torque'];
        $desc = $edit['description'];
    }

    if (isset($_POST['updateVeh'])) {
        $vMake = $_POST['vehMake'];
        $vMeg = $_POST['vehMeg'];
        $vLogo = $_POST['vehLogo'];
        $vHp = $_POST['vehHp'];
        $vTorque = $_POST['vehTorque'];
        $vDesc = $_POST['vehDesc'];
        $update = mysqli_query($conn, "UPDATE vehicles SET `make`='$vMake', `meg`='$vMeg', `logo`='$vLogo', `hp`='$vHp', `torque`='$vTorque', `description`='$vDesc' WHERE id='" . $_GET['id'] . "'");

        if ($update) {
            header("location:index.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Car Dropdown</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <?php include('nav.php'); ?>
    <!-- Page content-->
    <div class="container mt-5 ">
        <div class="card shadow">
            <div class="card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="vehMake" value="<?php echo $make; ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="vehMeg" value="<?php echo $meg; ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="vehLogo" value="<?php echo $logo; ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="vehHp" value="<?php echo $hp; ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="vehTorque" value="<?php echo $torque; ?>">
                    </div>
                    <div class="mb-3">
                        <textarea name="" class="form-control" name="vehDesc" rows="4"><?php echo $desc; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-danger" name="updateVeh">Update Vehicle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>