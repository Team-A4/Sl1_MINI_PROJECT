<?php 
session_start();

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
                        <?php
                            if($_SESSION['user_email']){
                        ?>
                        <li><a href="post.php" class="grey-text text-darken-4">Post your trip</a></li>
                        <li><a href="search.php" class="grey-text text-darken-4">Search for traveller</a></li>
                        <li><a href="update_profile.php" class="grey-text text-darken-4">Update Profile</a></li>
                        <li><a href="home.php" class="grey-text text-darken-4">Logout</a></li>
                    </ul>
                    <ul class="sidenav grey lighten-2 " id="mobile-menu">
                        <li><a href="post.php"class="grey-text text-darken-4" >Post your trip</a></li>
                        <li><a href="search.php" class="grey-text text-darken-4">Search for traveller</a></li>
                        <li><a href="update_profile.php" class="grey-text text-darken-4">Update Profile</a></li>
                        <li><a href="home.php" class="grey-text text-darken-4">Logout</a></li>
                    </ul>
                        <?php }else {?>

                        <li><a href="post.php" class="grey-text text-darken-4">Post your trip</a></li>
                        <li><a href="search.php" class="grey-text text-darken-4">Search for traveller</a></li>
                        <li><a href="signup.php" class="grey-text text-darken-4">Register</a></li>
                        <li><a href="signin.php" class="grey-text text-darken-4">Login</a></li>

                    </ul>
                    <ul class="sidenav grey lighten-2 " id="mobile-menu">
                        <li><a href="post.php"class="grey-text text-darken-4" >Post your trip</a></li>
                        <li><a href="search.php" class="grey-text text-darken-4">Search for traveller</a></li>
                        <li><a href="signup.php" class="grey-text text-darken-4">Register</a></li>
                        <li><a href="signin.php" class="grey-text text-darken-4">Login</a></li>
                    </ul>
                        <?php  } ?>

                                

                </div>
            </nav>
        </div>
       
    </header>
    <main>
        
        <div class="row">
           
        </div>
        <div class="row" style="margin-left: 60px;">
            <div class="col s12 m3">
              <div class="card" style="width: 18rem;height: 25rem;">
                <div class="card-image">
                  <img src="./img/FAST.jpeg">
                  
                </div>
                <div class="card-content" style="margin-top: 0px;padding-top: 0px;">
                    <h5><center>FAST</center></h5>
                  <p>As fast as your traveller's plane! You can track your parcel until its delivery and our services are making sure your parcel is delivered within reasonnable time.</p>
                </div>
               
              </div>
            </div>
            <div class="col s12 m3">
                <div class="card" style="width: 18rem;height: 25rem;">
                  <div class="card-image">
                    <img src="./img/eco.jpeg">
                    
                  </div>
                  <div class="card-content" style="margin-top: 0px;padding-top: 0px;">
                    <h5><center>ECONOMICAL</center></h5>
                    <p>Our innovative platform was designed to optimize every aspect of your experience. Very intuitive, VALIOS is the fairest solution for international shipments!</p>
                  </div>
                 
                </div>
              </div>
              <div class="col s12 m3">
                <div class="card" style="width: 18rem;height: 25rem;">
                  <div class="card-image">
                    <img src="./img/SECURE.jpeg">
                    
                  </div>
                  <div class="card-content" style="margin-top: 0px;padding-top: 0px;">
                    <h5><center>SECURE</center></h5>
                    <p>Your transactions are secured by our platform. We use technology to provide you the highest level of security for each step of your experience.</p>
                  </div>
                 
                </div>
              </div>
              <div class="col s12 m3">
                <div class="card" style="width: 18rem;height: 25rem;">
                  <div class="card-image">
                    <img src="./img/ECOLOGICAL.jpeg">
                    
                  </div>
                  <div class="card-content" style="margin-top: 0px;padding-top: 0px;">
                    <h5><center>ECOLOGICAL</center></h5>
                    <p>VALIOS follows through with its convictions and support associations all over the world to fight climate change. </p>
                  </div>
                 
                </div>
              </div>
          </div>
          <div class="row">
            <div class="carousel carousel-slider center">
    <div class="carousel-fixed-item center">
    
    </div>
    <div class="carousel-item red black-text" href="#one!" style="width: 40rm; height: 30rem;">
        <div class="col s12 m6 offset-m3">
            <h2 class="header">OUR TEAM</h2>
            <div class="card horizontal" style="border-block: 5px;">
              <div class="card-image">
                <img src="./img/img2.jpeg">
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p><h1>AKSHAD AGARWAL</h1></p>
                </div>
                <div class="card-action">
                  <a href="#">This is a link</a>
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="carousel-item amber black-text" href="#two!">
        <div class="col s12 m6 offset-m3">
            <h2 class="header">OUR TEAM</h2>
            <div class="card horizontal">
              <div class="card-image">
                <img src="./img/img4.jpeg">
              </div>
              <div class="card-stacked">
                <div class="card-content">
                    <p><h1>Abhishek Mundada</h1></p>
                </div>
                <div class="card-action">
                  <a href="#">This is a link</a>
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="carousel-item green black-text" href="#three!">
        <div class="col s12 m6 offset-m3">
            <h2 class="header">OUR TEAM</h2>
            <div class="card horizontal">
              <div class="card-image">
                <img src="./img/img5.jpeg">
              </div>
              <div class="card-stacked">
                <div class="card-content">
                    <p><h1>Ajinkya Bramhankar</h1></p>
                </div>
                
              </div>
            </div>
          </div>
    </div>
    <div class="carousel-item blue black-text" href="#four!">
        <div class="col s12 m6 offset-m3">
            <h2 class="header">OUR TEAM</h2>
            <div class="card horizontal">
              <div class="card-image">
                <img src="./img/img6.jpeg">
              </div>
              <div class="card-stacked">
                <div class="card-content">
                    <p><h1>Anant Khandelwal</h1></p>
                </div>
                <div class="card-action">
                  <a href="#">This is a link</a>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>
              </div>

    </main>
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
  $('.datepicker').pickadate();
});
$('.datepicker').datepicker({ 
    selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year
        format: 'yyyy-mm-dd'
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.carousel').carousel();
  });
  var instance = M.Carousel.init({
    fullWidth: true,
    indicators: true
  });

  // Or with jQuery

  $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>

</body>
</html>
