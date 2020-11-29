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

    <!--link rel = "icon"  href ="https://www.dreamstime.com/happy-three-friends-line-style-logo-happy-three-friends-logo-joyful-people-embrace-together-line-style-sign-image114496803" type = "image/x-icon">      
    <-->
    <link href="img/icc.png" rel="icon" type="image/x-icon" />
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
                <div class="form-start" style="padding-left: 10px;">
                    <h5>Not a member yet ? Register here !</h5>
                </div>
                <form class="col s12 l6" method="POST">
    
                    <div class="row">
                        <div class="input-field col s12 l6 ">
                            <i class="material-icons prefix">person_outline</i>
                            <input type="text" id="first_name" class="validate" required name="first_name" >
                            <label for="first_name">First name</label>
                        </div>
                        <div class="input-field col s12 l6 ">
                            <i class="material-icons prefix">person_outline</i>
                            <input type="text" id="last_name" class="validate" required name="last_name" >
                            <label for="last_name">Last name</label>
                        </div>
                        <div class="input-field col s12 ">
                            <i class="material-icons prefix">email</i>
                            <input type="email" id="email" class="validate" required name="email" >
                            <label for="email">Your email</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">person</i>
                            <input type="text" id="username" class="validate" required name="username">
                            <label for="username">Your username</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">vpn_key</i>
                            <input type="password" id="password" class="validate" required name="password" >
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field col s12 l6">
    
                            <select id="gender" name="gender">
                                <option value="" disabled selected>Choose your gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Other</option>
                              </select>
                              <label for="gender">Gender</label>  
                        </div>
                        <div class="input-field col s12 l6">
                            <i class="material-icons prefix">phone</i>
                            <input type="text" id="phone_number" name="phone_number">
                            <label for="phone_number">Phone Number</label>
                        </div>
                        <div class="form-end">
                            <p style="padding-left: 10px;">Already a user ? <a href="signin.php">Login</a></p>
                        </div>
                        <div class="input-field col s12">
                            <button class="btn right grey darken-2" name="submit">Sign Up</button>
                        </div>  
                </form>
               

                <?php 

                if(isset($_POST['submit'])){
                    $first_name= htmlentities(mysqli_real_escape_string($conn,$_POST['first_name']));
                    $last_name= htmlentities(mysqli_real_escape_string($conn,$_POST['last_name']));
                    $email= htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
                    $password= htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
                    $username= htmlentities(mysqli_real_escape_string($conn,$_POST['username']));
                    $gender= htmlentities(mysqli_real_escape_string($conn,$_POST['gender']));
                    $phone_number= htmlentities(mysqli_real_escape_string($conn,$_POST['phone_number']));

                    $check_mail_query = "SELECT * from user where email= $email ";
       
                    if(mysqli_query($conn,$check_mail_query)){
                        echo "<script>alert('Email already exists login to continue')</script>";
                        echo "<script>window.open('signup.php','_self')</script>";
                        exit();
                    };  
                    
                    $insert_user_query = "INSERT INTO users(user_username,user_password,user_email,user_gender,user_phone,user_fname,user_lname,user_login) values ('$username','$password','$email','$gender',$phone_number,'$first_name','$last_name','offline'); ";  
                    $run_query = mysqli_query($conn,$insert_user_query);

                    if($run_query){
                        $update_table_query="INSERT into profilee values('$username','-','-','-','-','-','-','-','-','-');";
                        $run_update_query = mysqli_query($conn,$update_table_query);
                        echo "<script>alert('Congratulations $first_name,your account is created! Please Login to continue')</script>";
                        echo "<script>window.open('signin.php','_self')</script>";
                    }else{
                        echo "<script>alert('Registration failed ')</script>";
                        echo "<script>window.open('signup.php','_self')</script>";
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
