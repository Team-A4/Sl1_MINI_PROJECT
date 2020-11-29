<?php
    include('connection.php');
    session_start();
    if(!isset($_SESSION['user_email'])){
        header("Location:signin.php");
    }
    else{
        $active_user_email=$_SESSION['user_email'];
        $fetch_active_user_details = "SELECT * from users where user_email= '$active_user_email';";
        $run_fetch_active_user_details= mysqli_query($conn,$fetch_active_user_details);
        $active_user_array = mysqli_fetch_array($run_fetch_active_user_details);
        $active_user_username = $active_user_array['user_username'];
?>

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
        <!--navbar-->

    <header>
        <div class="navbar">
            <nav class="navbar-wrapper grey lighten-2">
                <div class="container">
                    <a href="home.php"  class="brand-logo grey-text text-darken-4">Crowd Shipping</a>
                    <a href="#" class="sidenav-trigger" data-target="mobile-menu"><i class="material-icons grey-text text-darken-3">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="post.php" class="grey-text text-darken-4">Post your trip</a></li>
                        <li><a href="search.php" class="grey-text text-darken-4">Search for traveller</a></li>
                        <li><a href="update_profile.php" class="grey-text text-darken-4">Update Profile</a></li>
                        <li><a href="home.php" class="grey-text text-darken-4">Logout</a></li>
                    </ul>
                    <ul class="sidenav grey lighten-2 " id="mobile-menu">
                        <li><a href="post.php" class="grey-text text-darken-4">Post your trip</a></li>
                        <li><a href="search.php" class="grey-text text-darken-4">Search for traveller</a></li>
                        <li><a href="update_profile.php" class="grey-text text-darken-4">Update Profile</a></li>
                        <li><a href="home.php" class="grey-text text-darken-4">Logout</a></li>
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
                    <h5>Update your profile in a few steps !!</h5>
                </div>
                <div class="divider yellow darken-3"></div>
                <form method="POST" class="col s12 l6" style="padding-top: 30px;">
    
                    <div class="row">
                        <div class="col s6 ">
                            <img src="img/img_user.jpg" style="border: 1px black solid; height: 200px;width: 200px;"  alt="">
                        </div>
                        <div class="input-field col s6 pull-s2" style="padding-top: 160px;padding-left: 160px;" >
                            <input type="file" id="image" name="image" accept="image/*" >
                        </div>

                        <div class="input-field col s12">
                            <textarea id="textarea" class="materialize-textarea" name="bio"></textarea>
                            <label for="textarea" >Update your Bio..</label>
                          </div>
                          <div class="input-field col s12">
                            <textarea id="hometown" class="materialize-textarea" name="hometown"></textarea>
                            <label for="hometown">Add Hometown</label>
                          </div>

                          <div class="input-field col s12">
                            <textarea id="address" class="materialize-textarea" name="loc_add"></textarea>
                            <label for="address">Add Local Adress</label>
                          </div>

                        <div class="input-field col s12  ">
                            <i class="fab fa-instagram prefix pink-text" ></i>
                            <input type="text" id="instagram" class="validate" name="insta_id">
                            <label for="instagram">Add Instagram ID</label>
                        </div>
                        <div class="input-field col s12 ">
                            <i class="fab fa-facebook prefix blue-text text-darken-3" ></i>
                            <input type="text" id="facebook" class="validate"  name="fb_id" >
                            <label for="facebook">Add Facebook ID</label>
                        </div>
                       
                        <div class="col s12">
                            <i class="material-icons blue prefix" style="border-radius: 20px;height: 25px;width: 25px;margin-top: 10px;">add</i><span style="padding-left: 10px;font-size: 20px;">Add frequent travel locations</span><br>
                        </div>
                        <div class="input-field col s5">
                            <i class="material-icons prefix">location_on</i>
                            <input type="text" id="location1" name="loc1">
                            <label for="location1">Location 1</label>  
                        </div>
                        <div class="input-field col s5">
                            <i class="material-icons prefix">location_on</i>
                            <input type="text" id="location2" name="loc2">
                            <label for="location2">Location 2</label> 
                        </div> 
                        <div class="input-field col s5">
                            <i class="material-icons prefix">location_on</i>
                            <input type="text" id="location3" name="loc3">
                            <label for="location3">Location 3</label>  
                        </div>
                        <div class="input-field col s5">
                            <i class="material-icons prefix">location_on</i>
                            <input type="text" id="location4" name="loc4">
                            <label for="location4">Location 4</label>  
                        </div>
                        <div class="input-field col s12">
                            <button class="btn right grey darken-2" type='submit' name="submit">Update</button>
                        </div>
                </form>


                <?php 

                if(isset($_POST['submit']))
                {
                    $bio= htmlentities(mysqli_real_escape_string($conn,$_POST['bio']));
                    $loc_add= htmlentities(mysqli_real_escape_string($conn,$_POST['loc_add']));
                    $insta_id= htmlentities(mysqli_real_escape_string($conn,$_POST['insta_id']));
                    $fb_id= htmlentities(mysqli_real_escape_string($conn,$_POST['fb_id']));
                    $twitter_id= htmlentities(mysqli_real_escape_string($conn,$_POST['twitter_id']));
                    $loc1= htmlentities(mysqli_real_escape_string($conn,$_POST['loc1']));
                    $loc2= htmlentities(mysqli_real_escape_string($conn,$_POST['loc2']));
                    $loc3= htmlentities(mysqli_real_escape_string($conn,$_POST['loc3']));
                    $loc4= htmlentities(mysqli_real_escape_string($conn,$_POST['loc4']));
                    $hometown = htmlentities((mysqli_real_escape_string($conn,$_POST['hometown'])));
                    $update_query= "UPDATE profilee SET  bio= '$bio', loc_dd= '$loc_add' , insta_id='$insta_id', fb_id='$fb_id' ,loc1='$loc1' ,loc2='$loc2',loc3='$loc3',loc4='$loc4', hometown= '$hometown' WHERE username='$active_user_username'";
                    $kk=mysqli_query($conn,$update_query);
                    
                    if($kk)
                    {
                        echo "<script>alert('User details updated succcessfully !!') </script>";
                        echo "<script>window.open('home.php','_self')</script>";
                    }

                }

                ?>

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
                <div class="container grey-text text-darken-4 center"><p>&copy;crowd shipping 2020</p></div>
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

<?php } ?>