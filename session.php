<?php
   include('config.php');
   //session_start();
   
  /* $user_check = $_SESSION['user'];
   
   $ses_sql = mysqli_query($db,"select username from admin where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['user'])){
      header("location:logged-index.php");
      die();
   }*/
   if(isset($_POST['but_submit'])){

      $uname = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqlli_real_escape_string($db,$_POST['password']);
      if($uname != "" && $password != ""){
         $sql_query = "select count(*) as cntUser from admin where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($db,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['user'] = $uname;
            header('Location: logged-index.php');
        }else{
            echo "Invalid username and password";
        }
      }
   }
?>