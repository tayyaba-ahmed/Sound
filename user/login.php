<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sound</title>
    <link rel="icon" href="img/icon.png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #2a2a2a;
        }

        .container {
            display: flex;
            width: 800px;
            background-color: #333;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .left-panel {
            background: linear-gradient(135deg, #ff1a1a, #ff4d4d);
            width: 50%;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 30px;
            text-align: center;
        }

        .left-panel .icon {
            font-size: 80px;
            margin-bottom: 20px;
        }

        .left-panel h2 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .left-panel p {
            font-size: 1em;
            margin-bottom: 30px;
        }

        .sign-up-btn {
            padding: 10px 20px;
            border: none;
            background-color: #fff;
            color: #ff1a1a;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .sign-up-btn:hover {
            background-color: #ff4d4d;
        }

        .right-panel {
            width: 50%;
            padding: 30px;
            position: relative;
            background-color: #1e1e1e;
            color: #fff;
        }

        .right-panel header {
            display: flex;
            justify-content: flex-end;
        }

        .login-btn {
            background: none;
            color: #ff1a1a;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container h2 {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        form input {
            background-color: #333;
            border: 1px solid #555;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
            color: #fff;
            font-size: 1em;
        }

        form input::placeholder {
            color: #888;
        }

        .terms {
            display: flex;
            align-items: center;
            font-size: 0.9em;
            color: #888;
            margin-bottom: 15px;
        }

        .terms input {
            margin-right: 10px;
        }

        .submit-btn {
            background-color: #ff4d4d;
            border: none;
            color: #fff;
            padding: 10px;
            font-size: 1em;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background-color: #ff1a1a;
        }

        form p {
            font-size: 0.9em;
            color: #888;
        }

        form p a {
            color: #ff4d4d;
            text-decoration: none;
        }

        form p a:hover {
            text-decoration: underline;
        }

        .social-signup {
            text-align: center;
            margin-top: 20px;
        }

        .social-signup p {
            font-size: 0.9em;
            color: #888;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                width: 90%;
            }

            .left-panel,
            .right-panel {
                width: 100%;
                padding: 20px;
            }

            .left-panel {
                border-bottom: 2px solid #444;
            }

            .left-panel .icon {
                font-size: 60px;
            }

            .left-panel h2 {
                font-size: 1.8em;
            }

            .left-panel p {
                font-size: 0.9em;
            }

            .sign-up-btn {
                padding: 8px 16px;
                font-size: 0.9em;
            }

            .form-container h2 {
                font-size: 1.4em;
            }

            form input {
                font-size: 0.9em;
            }

            .submit-btn {
                font-size: 0.9em;
                padding: 8px;
            }


        }

        @media (max-width: 480px) {
            .left-panel .icon {
                font-size: 50px;
            }

            .left-panel h2 {
                font-size: 1.5em;
            }

            .left-panel p {
                font-size: 0.8em;
            }

            .form-container h2 {
                font-size: 1.3em;
            }

            .submit-btn {
                padding: 6px;
            }

            .terms {
                font-size: 0.8em;
            }

            .social-signup p {
                font-size: 0.8em;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left-panel">
            <div class="content">
                <div class="icon"><img src="img/icon.png" alt="" style="width: 20%;"></div>
                <h2>Join us</h2>
                <p>Welcome back, rockstar! Ready to jam?</p>
            </div>
        </div>
        <div class="right-panel">
            <div class="form-container">
                <h2>Log In</h2>
                <p style="margin: 0 0 20px 0;">Don’t keep the music waiting—log in now!</p>
                <form action="#" method="post">
                    <input type="text" placeholder="Username" required name="username">
                    <input type="password" placeholder="Password" required name="password">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        &nbsp;Keep me signed in
                    </label>
                    <button type="submit" class="submit-btn" name="login">Log In</button>
                    <br>
                    <p class="text-center mb-0">Don't have an Account? <a href="signup.php">Sign Up</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $roleq = "select * from role join user on user.role_ID_FK = role.role_ID
    where role_name = 'User'";
    $roleresult = mysqli_query($connect, $roleq);
    $roledata = mysqli_fetch_assoc($roleresult);
    $roleid = $roledata['role_ID'];


    $q = "SELECT * FROM user WHERE username='$username' AND password='$password ' AND role_ID_FK=$roleid";
    $result = mysqli_query($connect, $q);
    $rows = mysqli_num_rows($result);
    if ($rows > 0) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $username;
        $_SESSION['user_ID'] = $data['user_ID'];
        echo "<script>alert('Login successful'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Invalid username or password'); window.location.href='login.php';</script>";
    }
}
?>