<?php
include("connection.php");
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



        /* Responsive styling */
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
                <p>The only music that matters</p>
            </div>
        </div>
        <div class="right-panel">
            <div class="form-container">
                <h2>Sign Up</h2>
                <form action="#" method="post">
                    <input type="text" placeholder="Username" required name="username">
                    <input type="email" placeholder="Email Address" required name="email">
                    <input type="password" placeholder="Password" required name="password">
                    <input type="tel" placeholder="Phone Number" required name="phone">
                    <input type="text" placeholder="Address" required name="address">
                    <label class="form-check-label">
                        <input type="checkbox" required class="form-check-input">
                        &nbsp;I agree to Terms & Conditions
                    </label>
                    <button type="submit" class="submit-btn" name="signup">Sign up</button>
                    <br>
                    <p>Already have an account? <a href="login.php">Click here to log in</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $roleq = "select * from role where role_name = 'User'";
    $roleresult = mysqli_query($connect, $roleq);
    $roledata = mysqli_fetch_assoc($roleresult);
    $roleid = $roledata['role_ID'];
    $checkq = "SELECT * from user where username = '$username' OR email = '$email'";
    $resultq = mysqli_query($connect, $checkq);
    if (mysqli_num_rows($resultq) > 0) {
        echo "<script>alert('Username or Email already exists'); window.location.href='signup.php';</script>";
    } else {
        $q = "INSERT INTO user (role_ID_FK,username, password, email, phone, address) VALUES ('$roleid','$username', '$password', '$email', '$phone', '$address')";
        $result = mysqli_query($connect, $q);
        if ($result) {
            echo "<script>alert('Registration Successful. Please login'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Signup failed, Please try again'); window.location.href='signup.php';</script>";
        }
    }
}
?>