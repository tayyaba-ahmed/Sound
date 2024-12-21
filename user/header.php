<?php
session_start();
include("connection.php");
$q = "select * from artist";
$result = mysqli_query($connect, $q);
$q1 = "select * from language";
$result1 = mysqli_query($connect, $q1);
$q2 = "select * from genre";
$result2 = mysqli_query($connect, $q2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sound</title>
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="oneMusic-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                        <!-- Nav brand -->
                        <a href="index.php" class="nav-brand"><img src="img/sound.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="music.php">Music</a></li>
                                    <li><a href="video.php">Videos</a></li>
                                    <li><a href="album.php">Album</a></li>
                                    <li><a href="#">Artist <i class="fas fa-chevron-down"></i></a>
                                        <ul class="dropdown">
                                            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                                                <li><a href="artist.php?artistid=<?php echo $data['artist_ID']; ?>"><?php echo $data['artist_name'] ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li><a href="#">Language <i class="fas fa-chevron-down"></i></a>
                                        <ul class="dropdown">
                                            <?php while ($data1 = mysqli_fetch_assoc($result1)) { ?>
                                                <li><a href="language.php?languageid=<?php echo $data1['language_ID']; ?>"><?php echo $data1['language_name'] ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li><a href="#">Genre <i class="fas fa-chevron-down"></i></a>
                                        <ul class="dropdown">
                                            <?php while ($data2 = mysqli_fetch_assoc($result2)) { ?>
                                                <li><a href="genre.php?genreid=<?php echo $data2['genre_ID']; ?>"><?php echo $data2['genre_name'] ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                </ul>


                                <div class="login-register-cart-button d-flex align-items-center" style=" gap:20px;">
                                    <!-- Search Bar -->
                                    <form action="search.php" method="GET" style="display: flex; align-items: center;">
                                        <input type="text" name="query" placeholder="Search..."
                                            style="padding: 6px; border: 2px solid rgba(255, 77, 77, 0.5); border-radius: 5px; outline: none; transition: border-color 0.3s; width: 150px; background-color: transparent; color: white;"
                                            onfocus="this.style.borderColor='#ff1a1a';"
                                            onblur="this.style.borderColor='rgba(255, 77, 77, 0.5)';">
                                        <button type="submit" class="fa fa-search" style="background-color: #780606; border: none; color: white; padding: 10px; border-radius: 5px; cursor: pointer; margin-left: 5px; transition: background-color 0.3s;"
                                            onmouseover="this.style.backgroundColor='#ff1a1a';"
                                            onmouseout="this.style.backgroundColor='#ff4d4d';">
                                        </button>
                                    </form>
                                    <div class="login-register-btn mr-10">
                                        <ul style="list-style-type: none; padding: 0; margin: 0; display: flex;">
                                            <?php
                                            if (isset($_SESSION['user_ID'])) {
                                                echo '<li style="margin-right: 15px;"><a href="logout.php" style="text-decoration: none; padding: 10px 15px; background-color: #780606 ; color: white; border-radius: 5px; transition: background-color 0.3s;">Logout</a></li>';
                                            } else {
                                                echo '<li style="margin-right: 15px;"><a href="login.php" style="text-decoration: none; 
                                            padding: 10px 15px; background-color: #780606; color: white; border-radius: 5px; transition: background-color 0.3s;">Login</a></li>';
                                                echo '<li style="margin-right: 15px;"><a href="signup.php" style="text-decoration: none; 
                                            padding: 10px 15px; background-color: #780606; color: white; border-radius: 5px; transition: background-color 0.3s;">Signup</a></li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Nav End -->
                            </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->