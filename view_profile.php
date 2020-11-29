<?php 
    include('connection.php');
    $user_username =$_GET['user_username'];
    $select_user_query = "SELECT * from users where user_username= '$user_username';";
    $run_select_user_query = mysqli_query($conn,$select_user_query);
    if($run_select_user_query){
        $user_row= mysqli_fetch_array($run_select_user_query);
        $fname = $user_row['user_fname'];
        $lname = $user_row ['user_lname'];
    }
    $select_profile_query ="SELECT * from profilee where username='$user_username';";
    $run_select_profile_query = mysqli_query($conn,$select_profile_query);
    if($run_select_profile_query){
        $profile_row= mysqli_fetch_array($run_select_profile_query);

        $bio=$profile_row['bio'];
        $local_adress= $profile_row['loc_dd'];
        $hometown= $profile_row['hometown'];
        $location1 = $profile_row['loc1'];
        $location2 = $profile_row['loc2'];
        $location3 = $profile_row['loc3'];
        $location4 = $profile_row['loc4'];

    }

    $select_search_query = "SELECT * from search_his where username='$user_username';";
    $run_select_search_query =mysqli_query($conn,$select_search_query);
    if($run_select_search_query){
        $search_arrays= mysqli_fetch_all($run_select_search_query);
        $num_search_arrays=mysqli_num_rows($run_select_profile_query);
        $from_loc1 = $search_arrays[0][0];
        $from_loc2 = $search_arrays[1][0];
        $from_loc3 = $search_arrays[2][0];

        $to_loc1 = $search_arrays[0][1];
        $to_loc2 = $search_arrays[1][1];
        $to_loc3 = $search_arrays[2][1];

        

    }
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
                        <li><a href="searh.php" class="grey-text text-darken-4">Search for traveller</a></li>
                        <li><a href="update_profile.php" class="grey-text text-darken-4">Update Profile</a></li>

                    </ul>
                    <ul class="sidenav grey lighten-2 " id="mobile-menu">
                        <li><a href="post.php"class="grey-text text-darken-4" >Post your trip</a></li>
                        <li><a href="search.php" class="grey-text text-darken-4">Search for traveller</a></li>
                        <li><a href="update_profile.php" class="grey-text text-darken-4">Update Profile</a></li>
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
                            <div class="card-title" style="font-size: 30px;"><?php echo $fname." ".$lname; ?></div>
                            <div class="divider yellow darken-2"></div>
                            <div>
                                <h6 style="font-size: 20px;"><strong>About: </strong></h6>
                                <p style="padding-left: 1vw;font-size: 18px;"><?php echo $bio ?></p>
                            </div>
                            
                            <div>
                                <h6 style="font-size: 20px;"><strong>Hometown</strong></h6>
                                <p style="padding-left: 1vw;font-size: 18px;"><?php echo $hometown ?></p>

                            </div>
                            <div>
                                <h6 style="font-size: 20px;"><strong>Local Adress: </strong></h6>
                                <p style="padding-left: 1vw;font-size: 18px;"><?php echo $local_adress ?></p>
                            </div> 
                            <div>
                                <h6 style="font-size: 20px;"><strong>Places of frequent travel</strong></h6>
                                <ul style="padding-left: 2vw;font-size: 18px;">
                                    <li style="list-style:square"><?php echo $location1 ?></li>
                                    <li style="list-style:square"><?php echo $location2 ?></li>
                                    <li style="list-style:square"><?php echo $location3 ?></li>
                                    <li style="list-style:square"><?php echo $location4 ?></li>



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
                                            <td><?php echo $from_loc1 ?></td>
                                            <td><?php echo $to_loc1 ?></td>
                                          </tr>
                                          <tr>
                                            <td><?php echo $from_loc2 ?></td>
                                            <td><?php echo $to_loc2 ?></td>
                                          </tr>
                                          <tr>
                                            <td><?php echo $from_loc3 ?></td>
                                            <td><?php echo $to_loc3 ?></td>
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