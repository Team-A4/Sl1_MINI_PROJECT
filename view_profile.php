<?php 
    include('connection.php');
    $user_username =$_GET['user_username'];
    $select_user_query = "SELECT * from users where user_username= '$user_username';";
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
                    <a href="#"  class="brand-logo grey-text text-darken-4">Crowd Shipping</a>
                    <a href="#" class="sidenav-trigger" data-target="mobile-menu"><i class="material-icons grey-text text-darken-3">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="#" class="grey-text text-darken-4">Post your trip</a></li>
                        <li><a href="#" class="grey-text text-darken-4">Search for traveller</a></li>
                        <li><a href="#" class="grey-text text-darken-4">Register</a></li>
                        <li><a href="#" class="grey-text text-darken-4">Login</a></li>

                    </ul>
                    <ul class="sidenav grey lighten-2 " id="mobile-menu">
                        <li><a href="#"class="grey-text text-darken-4" >Post your trip</a></li>
                        <li><a href="#" class="grey-text text-darken-4">Search for traveller</a></li>
                        <li><a href="#" class="grey-text text-darken-4">Register</a></li>
                        <li><a href="#" class="grey-text text-darken-4">Login</a></li>
                    </ul>
                </div>
            </nav>
        </div>
       
    </header>

    <!--Main content-->

    <main style="padding-top: 40px;" >
        <div class="container ">
            <div class="row">
                <div class="col s12 m12 l10 offset-l1">
                    <div class="card horizontal" style="border: rgb(255, 208, 0) 1px solid;">
                      <div class="card-image">
                        <img src="./img/img2.jpeg" style="height: 300px;width: 300px;border-radius: 300px;margin-top:100px;margin-left: 2vw;border: rgb(255, 217, 0) 2px solid;">
                      </div>
                      <div class="card-stacked">
                        <div class="card-content" style="padding-left: vw;">
                            <div class="card-title" style="font-size: 30px;">Akshad Agrawal</div>
                            <div class="divider yellow darken-2"></div>
                            <div>
                                <h6 style="font-size: 20px;"><strong>About: </strong></h6>
                                <p style="padding-left: 1vw;font-size: 18px;">Student at Pict</p>
                            </div>
                            
                            <div>
                                <h6 style="font-size: 20px;"><strong>Hometown</strong></h6>
                                <p style="padding-left: 1vw;font-size: 18px;"> Pune, India</p>

                            </div>
                            <div>
                                <h6 style="font-size: 20px;"><strong>Local Adress: </strong></h6>
                                <p style="padding-left: 1vw;font-size: 18px;">Pune Institue of computer Technology, Katraj, Pune-411043</p>
                            </div> 
                            <div>
                                <h6 style="font-size: 20px;"><strong>Places of frequent travel</strong></h6>
                                <ul style="padding-left: 2vw;font-size: 18px;">
                                    <li style="list-style:square">Beed</li>
                                    <li style="list-style:square">Nashik</li>
                                    <li style="list-style:square">Nanded</li>


                                </ul>
                            </div>  
                            <div>
                                <h6 style="font-size: 20px;"><strong>Recent Searches</strong></h6>
                                <ul style="padding-left: 2vw;">
                                    <table>
                                        <thead style="font-size: 16px;">
                                          <tr>
                                              <th >From</th>
                                              <th >To</th>
                                          </tr>
                                        </thead>
                                
                                        <tbody style="font-size: 14px;">
                                          <tr >
                                            <td>Beed</td>
                                            <td>Pune</td>
                                          </tr>
                                          <tr>
                                            <td>Nashik</td>
                                            <td>Nanded</td>
                                          </tr>
                                          <tr>
                                            <td>Jalna</td>
                                            <td>Pune</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                            


                                </ul>
                            </div>                           


                          
                        </div>
                        <div class="card-action ">
                            <a href="twitter.com" class="right"><i class="fab fa-twitter" style="color: rgb(61, 81, 114);font-size:20px ;"></i></a>
                            <a href="facebook.com"class="right"><i class="fab fa-facebook" style="color: rgb(23, 104, 235);font-size:20px ;"></i></a>
                            <a href="gmail.com"class="right"><i class="fas fa-envelope" style="color: rgb(235, 214, 23);font-size:20px ;"></i></a>

                          <a href="instagram.com"class="right"><i class="fab fa-instagram" style="color: red;font-size:20px ;"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
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