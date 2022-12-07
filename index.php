<?php
include('config.php');
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
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <form action="index.php" method="GET">
                    <div class="row">
                        <div class="col-md-5">
                            <select id="make" class="form-control">
                                <option>Vehicle Make</option>
                                <?php
                                $getMake = mysqli_query($conn, "SELECT * FROM vehicles");
                                while ($make = mysqli_fetch_assoc($getMake)) {
                                    echo "<option value='" . $make['make'] . "'>" . $make['make'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <select name="model" id="model" class="form-control">
                                <option>Vehicle Model / Engine / Generation</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <div class="d-grid gap-2">
                                <input type="submit" value="Search" id="searchVeh" class="btn btn-danger">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-5">
            <?php
            if (isset($_GET['model'])) {
                $model = $_GET['model'];
                $info = mysqli_query($conn, "SELECT * FROM vehicles WHERE meg = '$model'");

                while ($vi = mysqli_fetch_assoc($info)) {
            ?>
                    <div class="card shadow mb-3">
                        <div class="card-header"><b><?php echo strtoupper($vi['make']) . ' ' . strtoupper($vi['meg']); ?></b></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"><img src="<?php echo $vi['logo']; ?>" width="100"></div>
                                <div class="col-md-4">
                                    <b>Standard BHP:</b> <?php echo $vi['hp']; ?><br>
                                    <b>Standard Torque:</b> <?php echo $vi['torque']; ?><br>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $vi['description']; ?>
                                </div>
                            </div>
                        </div>
                        <?php if (isLoggedIn()) { ?>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <div><a href="edit.php?id=<?php echo $vi['id']; ?>" class="btn btn-primary btn-sm">Edit</a></div>
                                    <div><a href="delete.php?id=<?php echo $vi['id']; ?>" class="btn btn-danger btn-sm">Delete</a></div>
                                </div>
                            </div>
                        <?php } else {
                        } ?>
                    </div>
            <?php }
            } else {
                // Display none
            }
            ?>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script>
        $(function() {
            $('#make').change(function() {
                $('#model').prop('disabled', false);

                // Add in model fetch from selected vehicle
                var vehicleMake = $('#make').val();
                $.ajax({
                    url: "models.php",
                    type: "POST",
                    data: {
                        vehicleMake: vehicleMake
                    },
                    success: function(data) {
                        $('#model').html(data);
                    }
                })
            })
        })
    </script>
</body>

</html>