<?php ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Project</title>
    <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            

    <style>
         body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    }

    main {
        flex: 1 0 auto;
    }
    </style>
</head>
<body>

    <?php  include('connection.php')?>

        <!--navbar-->

    <header>
        <div class="navbar">
            <nav class="navbar-wrapper grey lighten-2">
                <div class="container">
                <a href="home.php" class="brand-logo grey-text text-darken-4" style="font-size: 27px">Parcel Mate</a>
                    <a href="#" class="sidenav-trigger" data-target="mobile-menu"><i class="material-icons grey-text text-darken-3">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="post.php" class="grey-text text-darken-4">Post your trip</a></li>
                        <li><a href="search.php" class="grey-text text-darken-4">Search for traveller</a></li>

                    </ul>
                    <ul class="sidenav grey lighten-2 " id="mobile-menu">
                        <li><a href="post.php"class="grey-text text-darken-4" >Post your trip</a></li>
                        <li><a href="search.php" class="grey-text text-darken-4">Search for traveller</a></li>
                    </ul>
                </div>
            </nav>
        </div>
       
    </header>

    <!--Main content-->

    <main style="padding-top: 4vw;">
        <div class="container">
            <div class="row">
                <div class="form-start" style="padding-left: 10px;"">
                    <h5>Please Login to Continue!</h5>
                </div>
                <form class="col s12 l6" method="POST">
    
                    <div class="row">
                        <div class="input-field col s12 ">
                            <i class="material-icons prefix">email</i>
                            <input type="email" id="email" class="validate" name="email" required >
                            <label for="email">Your email</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">vpn_key</i>
                            <input type="password" id="password" class="validate"  name="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-end">
                            <p style="padding-left: 10px;">Not a member yet ?<a href="signup.php"> Register here</a></p>
                        </div>
                        <div class="input-field col s12">
                            <button class="btn right grey darken-2" name="submit">Log In</button>
                        </div>
                </form>
                    <?php 
                            session_start();
                            if(isset($_POST['submit'])){
                                $email= htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
                                $password= htmlentities(mysqli_real_escape_string($conn,$_POST['password']));

                                $email_check_query = "SELECT * from users where user_email= '$email' and user_password='$password'";
                                $run_email_check_query= mysqli_query($conn,$email_check_query);
                                $get_rows= mysqli_num_rows(($run_email_check_query));

                                if($get_rows==1){
                                    $_SESSION['user_email']= $email;
                                    $update_user_status_query="UPDATE users set user_login='online' where user_email='$email';";
                                    $run_update_user_status_query=mysqli_query($conn,$update_user_status_query);

                                    $fetching_user_query="SELECT * from users where user_email='$email';";
                                    $run_fetching_user_query= mysqli_query($conn,$fetching_user_query);

                                    $user_row = mysqli_fetch_array($run_fetching_user_query);
                                    $username_active = $user_row['user_username'];

                                    echo "<script> window.open('home.php', '_self')</script>";
                                }
                                else {
                                    
                                    echo "<script>alert('Check Email and Password')</script>";
                        
                                }
                        }
                    
                    ?>
            
            </div>
            <div class="col l6 right">
                <img src="./logo.png">
                </div>
        </div>
        
    </main>

        <!--footer-->

        <footer class="page-footer grey lighten-2" >
            <div class="container">
                <div class="row">
                    <div class="col s12 l6 grey-text text-darken-4">
                        <h5 >About Us</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque assumenda ipsum, quam voluptate magni dolor aut beatae facilis adipisci </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque assumenda ipsum, quam voluptate magni dolor aut beatae facilis adipisci </p>
                    </div>
                    <div class="col s12 l4 offset-l2 grey-text text-darken-4">
                        <h5>Connect</h5>
                        <ul>
                            <li><i class="fab fa-facebook "></i>  <span>Facebook</span></li>
                            <li><i class="fab fa-instagram "></i>  <span>Instagram</span></li>
                            <li><i class="fab fa-twitter "></i>  <span>Twitter</span></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
            <div class="container grey-text text-darken-4 center"><p>&copy;Friend Shipper 2020</p></div>
            </div>
        </footer>

    <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.sidenav').sidenav();
      $('select').formSelect();
    });
  </script>
    
</body>
</html>