<?php
//include auth_session.php file on all user panel pages
session_start();
if (isset($_SESSION["users_id"])) {
    
    $mysqli = require __DIR__ . "/db.php";
    
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["users_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
else {
    header ("Location: signup.php");
}  

$host = "localhost";
$dbname = "LoginSystem";
$username = "root";
$password = "";

// Create a connection
$conn = new mysqli(hostname: $host,
                    username: $username,
                    password: $password,
                    database: $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
                
$userID = $_SESSION['users_id'];
$sql = "SELECT user_agent, blocked FROM users WHERE id = $userID";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/style.css">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Smart Classroom Threat Modelling Framework | Student Dashboard</title>
        <meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	
		<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/style.css">
		<!-- skin -->
		<link rel="stylesheet" href="skin/default.css">

        <style>
        * {
            color: white;
        }
        .user-info {
            border: 1px solid #ccc;
            padding: 5px;
            margin-bottom: 20px;
            max-width: 600px;
        }

        .user-info h2 {
            color: #ccc;
        }

        .user-info p {
            margin: 5px 0;
            color: #fff;
        }
    </style>
    </head>
    <body>
    <?php
        include('header.php');
    ?>
    <section class="featured" style="margin-top: -50px;">
			<div class="container"> 
				<div class="row mar-bot15">
					<div class="col-md-6 col-md-offset-3">
                    <div class="align-center">
                        <h3 class="slogan">Smart Classroom Threat Modelling Framework</h3>

                        <h3 style="color: white;" class="text-bold">Welcome to your dashboard.</h3>
                        <p style="color: red;" class="text-bold hide">⚠️ This browser does not support the Web Bluetooth API. Please try a different browser</p>
                        <p style="color: green;" class="text-bold deviceName"></p>
                        <br>
                        <?php if (!empty($user['matricnumber'])) : ?>
                        <div class="user-info">
                            <h2>User Profile</h2>
                            <p><strong>Name:</strong> <?php echo $user['firstname'] . ' ' . $user['lastname']; ?></p>
                            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                            <p><strong>Matriculation Number:</strong> <?php echo $user['matricnumber']; ?></p>
                            <p><strong>Gender:</strong> <?php echo $user['gender']; ?></p>
                            <p><strong>Date of Birth:</strong> <?php echo $user['dob']; ?></p>
                            <p><strong>Faculty:</strong> <?php echo $user['faculty']; ?></p>
                            <p><strong>Department:</strong> <?php echo $user['department']; ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                    <button class="connect btn btn-info">Connect to Bluetooth</button>

                    <a type="button" class="btn btn-primary" href="updateprofile.php">Update Your Profile</a>
                  <!--  <a type="button" class="btn btn-primary" href="changepassword.php">Change Password</a> -->
                </div>

            </div>
            <div class="align-center">
                <a href="logout.php" class="text-bold" style="color: white;">Logout</a>
            </div>
            
        </div>
    </section>

    <section id="footer" class="section footer" style="padding: 140px;">
		<div class="container">

			<div class="row align-center copyright">
					<div class="col-sm-12"><p>&copy; 2024 Smart Classroom Threat Modelling Framework</p></div>
			</div>
		</div>

	</section>

    <script>
        let device;
        let server;
        const connectBTN = document.querySelector(".connect");
        const errorTxt = document.querySelector(".hide");
        const deviceNameSpan = document.querySelector(".deviceName");
        

        async function requestDevice() {
            const options = {
                acceptAllDevices: true,
                optionalServices: ['battery_service', "162348d9-d5a8-4870-8086-8e152fd06a92"]
            };
            device = await navigator.bluetooth.requestDevice(options);

            deviceNameSpan.textContent = `Device Name: ${device.name}`;

            device.addEventListener("gattserverdisconnected", connectBluetooth);
        }

        async function connectBluetooth() {
       
            if (!device.gatt.connected) {
                server = await device.gatt.connect();
                console.log("Connected to GATT server");
            }
            if (server) {
                const service = await server.getPrimaryService("battery_service");

                batteryService = await service.getCharacteristic("battery_level");
                console.log("Connected");
            }
        }

        async function init() {
            if (!navigator.bluetooth) {
                errorTxt.classList.remove("hide");
                return;
            }
            
            try {
                await requestDevice();
                connectBTN.textContent = "Connecting...";
                
                await connectBluetooth();
                connectBTN.textContent = "Done";
                deviceNameSpan.textContent = `Connected to: ${device.name}`;
            } catch (error) {
                    console.error('Error during initialization:', error);
                    connectBTN.textContent = "Coundn't Connect";
                    deviceNameSpan.style.color = 'red';
                    deviceNameSpan.textContent = 'Bluetooth permission denied';
                }
            }


        connectBTN.addEventListener("click", init);
    </script>
    </body>
</html>