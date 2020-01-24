<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include 'db.php';
session_start();
if (isset($_POST['login'])) {

    //Getting Input value
    $username = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    if (empty($username) && empty($password)) {
    } else {

        //Checking Login Detail
        $result = mysqli_query($con, "SELECT * FROM `admin` WHERE email='$username' AND password='$password'") or die(mysql_error());
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        $usid = $row['sno'];
        if ($count == 1) {
            $_SESSION['user'] = array(
                'username' => $row['email'],
                'userna' => $row['name'],
                'password' => $row['password'],
                'uid' => $row['sno'],
            );
?>
            <script>
                alert("Login Successfull");
            </script>
            <script>
                window.location.href = "Add_student.php";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Invalid login");
            </script>
            <script>
                window.location.href = "index.php";
            </script>
    <?php
        }
    }
}
//Checking User Logged or Not
//Restrict User or Moderator to Access Admin.php page

if (empty($_SESSION['user'])) {

    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="tab-content">
            <div id="login" class="container tab-pane active"><br>
                <form id="logininto" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="pass" required>
                    </div>
                    <input type="submit" class="btn btn-primary" name="login" />
                </form>
            </div>
        </div>
    </body>

    </html>
<?php
} elseif ($_SESSION['user']['username'] && $_SESSION['user']['password']) {
    header('location:dashboard.php');
}
?>