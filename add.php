<?php
include('config.php');

if (!isLoggedIn()) {
    header("location: index.php");
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
    <?php include("nav.php"); ?>
    <!-- Page content-->
    <div class="container mt-5 ">
        <div class="card shadow">
            <div class="card-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="vehMake" placeholder="Vehicle Make">
                    <small>Vehicle Make (i.e; Acura)</small>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="vehMeg" placeholder="Vehicle Model Engine Gen">
                    <small>Vehicle Model/Engine/Generation format: *Model | Engine (Generation)*</small>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="vehLogo" placeholder="Vehicle Logo">
                    <small>Logo can be obtained from mychiptuningfiles.com - copy and paste the link to the logo <b>only</b>.</small>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="vehHp" placeholder="Vehicle HP">
                    <small>Vehicle HP: *number* hp.</small>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="vehTorque" placeholder="Vehicle Torque">
                    <small>Vehicle Torque: *number* Nm.</small>
                </div>
                <div class="mb-3">
                    <textarea name="" class="form-control" id="vehDesc" rows="4" placeholder="Vehicle Description"></textarea>
                    <small>Any additional information you wish to provide for this vehicle here.</small>
                </div>
                <div class="mb-3">
                    <button class="btn btn-danger" id="addVeh">Add</button>
                </div>
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
    <script>
        $(function() {
            $('#addVeh').click(function() {
                var vehMake = $('#vehMake').val();
                var vehMeg = $('#vehMeg').val();
                var vehLogo = $('#vehLogo').val();
                var vehHp = $('#vehHp').val();
                var vehTorque = $('#vehTorque').val();
                var vehDesc = $('#vehDesc').val();
                $.ajax({
                    url: "veh.php",
                    type: "POST",
                    data: {
                        vehMake: vehMake,
                        vehMeg: vehMeg,
                        vehLogo: vehLogo,
                        vehHp: vehHp,
                        vehTorque: vehTorque,
                        vehDesc: vehDesc
                    },
                    success: function(data) {
                        // alert('Success');

                        // $('#vehMake').val('');
                        // $('#vehMeg').val('');
                        // // $('#vehLogo').val('');
                        // $('#vehDesc').val('');
                        // $('#vehHp').val('');
                        // $('#vehTorque').val('');
                    }
                })
            })
        })
    </script>
</body>

</html>