<?php 
   include('connection.php');
    session_start();
    if(!isset($_SESSION['user_email'])){
        header('Location:signin.php');
    }
    else {
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
                <a href="home.php" class="brand-logo grey-text text-darken-4" style="font-size: 27px">Parcel Mate</a>                    
                <a href="#" class="sidenav-trigger" data-target="mobile-menu"><i class="material-icons grey-text text-darken-3">menu</i></a>
                    <ul class="right hide-on-med-and-down">
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
                </div>
            </nav>
        </div>
       
    </header>

    <!--Main content-->

    <main style="padding-top: 4vw;">
        <div class="container">
            <div class="row">
                <div class="col l3 hide-on-med-and-down">
                    <img src="./img/img1.png"  style="padding-top: 16px; " class="responsive-img">
                </div>

                <div class="col s12 l9">

                    <div class="form-start" style="padding-left: 10px;">
                        <h5>Search for a traveller</h5>
                        <div class="divider yellow darken-2"></div>
                    </div>
                    <form class="col s12 " method="POST" action='search.php'>
        
                        <div class="row" style="padding-top: 40px;"> 
                            <div class="input-field col s12 l3 ">
                                <input type="text" id="from" class="validate" placeholder="City or Country" style="padding-top:10px ;" name="from_location" required>
                                <label for="from" style="font-size: 25px;"> <i class="material-icons green-text">location_on</i>From</label>
                            </div>
                            <div class="input-field col s12 l3 ">
                                <input type="text" id="to" class="validate" placeholder="City or Country" style="padding-top:10px ;"  name="to_location" required>
                                <label for="to" style="font-size: 25px;"> <i class="material-icons red-text">location_on</i>TO</label>
                            </div>
                           
                        </div> 
                            <div class=" col s12 l3 input-field" >
                                <button class="btn grey darken-2 " name="submit" >Search</button>
                            </div>
                           
                    </form>
                    </div>
                </div>
                    <?php
                        if(isset($_POST['submit'])){

                            $from_location = $_POST['from_location'];
                            $to_location = $_POST['to_location'];
                            $cur_date = date("Y-m-d H:i:s");
                            
                            
                            $search_location_query=" SELECT * from  post where (from_location='$from_location' and to_location ='$to_location' ) or (from_location='$to_location' and to_location ='$from_location' ) or(stopover_location='$from_location' and to_location ='$to_location' )or(stopover_location='$to_location' and to_location ='$from_location' ) or (from_location='$from_location' and stopover_location ='$to_location' ) or (from_location='$to_location' and stopover_location ='$from_location' ) ;";
                            $run_search_location_query = mysqli_query($conn,$search_location_query);
                            if($run_search_location_query){
                                $result_arrays = mysqli_fetch_all($run_search_location_query,MYSQLI_ASSOC);
                                $num_rows = mysqli_num_rows($run_search_location_query);
                                $index=0;
                                
                                //Adding into search history
                                $search_history= " INSERT INTO search_his(from_location,to_location,cur_date,username) Values ('$from_location','$to_location','$cur_date','$active_user_username') ";
                                $run_search_history=mysqli_query($conn,$search_history);
                                if(!($run_search_history)){
                                    echo "Could not add into search history";
                                }
                                //End adding into history


                                if($num_rows==0){
                                    echo "No users";
                                }
                                else{
                                for($index=0 ;$index < $num_rows ; $index++ ){
                                    $user_username_alt=$result_arrays[$index]['user_username'];
                                    $fetch_user_query = "SELECT * from users where user_username='$user_username_alt'";
                                    $run_fetch_user_query = mysqli_query($conn,$fetch_user_query);
                                    $user = mysqli_fetch_array($run_fetch_user_query);
                                    $user_fname = $user['user_fname'];
                                    $user_lname = $user['user_lname'];
                                    $user_email = $user['user_email'];
                                    $user_username = $user['user_username'];
                                    $user_gender = $user['user_gender'];
                                    $user_from_location = $result_arrays[$index]['from_location'];
                                    $user_to_location = $result_arrays[$index]['to_location'];
                                    $user_stopover_location = $result_arrays[$index]['stopover_location'];
                                    $user_mode = $result_arrays[$index]['mode'];
                                    $qq1=" SELECT date_departure from post where from_location='$user_from_location' AND to_location='$user_to_location' AND stopover_location='$user_stopover_location' AND user_username='$user_username_alt'; ";
                                    $qq2=" SELECT date_arrival from post where from_location='$user_from_location' AND to_location='$user_to_location' AND stopover_location='$user_stopover_location' AND user_username='$user_username_alt'; ";
                                    $run1=mysqli_query($conn,$qq1);
                                    $run2=mysqli_query($conn,$qq2);
                                    
                                    $dep_date=mysqli_fetch_row($run1);
                                    $arr_date=mysqli_fetch_row($run2);

                                    $comp_seats="SELECT seats from comp where username='$user_username_alt' AND mode = $user_mode  ";
                                    $comp_fare ="SELECT fare from comp where username='$user_username_alt' AND mode = $user_mode  ";
                                    
                                    $hello=mysqli_query($conn,$comp_seats);
                                    $hii=mysqli_query($conn,$comp_fare);
//______________________________________________________________________________________________________
                                    //Fare 
                                    $fare=mysqli_fetch_row($hii);
                                    $seats=mysqli_fetch_row($hello);
                                    //Seats
//_____________________________________________________________________________________________________


                                    if($user_gender == 1){
                                        $gender= 'male';
                                    }
                                    else if ($user_gender ==2){
                                        $gender = 'female';
                                    }
                                    else $gender='circle';

                                    if($user_mode==1){
                                        $moode= 'car';
                                    }
                                    else if($user_mode==2){
                                        $moode= 'train';
                                    }
                                    else if($user_mode==3){
                                        $moode= 'bus';
                                    }
                                    else if($user_mode==4){
                                        $moode= 'plane';
                                    }
                            

                         ?>
                        

                            <div class='row'>
                                    <div class='col s12 '>
                                        <div class='card horizontal grey lighten-4' style='border: rgb(255, 196, 0) 2px solid;'>
                                        <div class='card-image'>
                                            <img src='./img/img_user.jpg' class='responsive-img' style='height: 180px;width: 180px;'>
                                            <div style="padding-left:35px; padding-top:10px ; padding-bottom:10px"><form method="POST" action="view_profile.php?user_username=<?php echo $user_username ?>"><button class='btn blue darken' style="padding-left:10px; " name="submit_profile">View Profile</button></form>
                                            </div>
                                        </div>
                                        <div class='card-stacked'>
                                            <span class='card-title' style='padding-left: 2vw;padding-top: 15px;'><i class='fas fa-<?php echo $gender; ?>'></i><span style='padding-left: 17px;'><?php echo "$user_fname $user_lname";?> <span style="padding-left:5vw">  <?php print_r($dep_date[0]); echo " ----> "; print_r($arr_date[0]);?>    </span>  </span><i class='fas fa-<?php echo $moode; ?> right' style='padding-right: 2vw;'></i><span>
                                                <div class='divider yellow darken-3'></div>
                                            <div class='card-content'>
                                                <div>
                                                    <i class='material-icons green-text prefix' style='padding-left: 2vw;'>location_on</i><span style='padding-left: 5px;'><?php echo "$user_from_location";?></span>
                                                    <span>
                                                
                                                    </span>
                                                    <span class='right' style='padding-right: 3vw;'><i class='material-icons red-text prefix'>location_on</i><span style='padding-left: 5px;'><?php echo "$user_to_location";?></span></span>
                                                </div>
                                                    <div class='center ' style='font-size: medium;'><?php if($user_stopover_location){ echo"<i class='material-icons blue-text prefix'>location_on</i>";}else echo""; ?><span style='padding-left: 5px;'><?php echo "$user_stopover_location";?></span></div>
                                            </div>
                                            <div class='divider yellow darken-3'> </div>
<!--________________________________________________________________________________________-->  
                                            <div style="padding-top: 15px;padding-left: 2vw" >Empty Seats: <?php print_r($seats[0]) ?> <span style="padding-left: 15vw;">Fare per Head: <?php print_r($fare[0]) ?> </span></div>
<!--________________________________________________________________________________________-->  

                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                }  
                            }
                                                            
                            }
                        }        

                    ?>

                
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
      $('.datepicker').pickadate();
    });
    $('.datepicker').datepicker({ 
        selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year
            format: 'yyyy-mm-dd'
        });
  </script>
    
</body>
</html>

<?php  } ?>
