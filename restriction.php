<?php 
    
   //this is restriction for normal user to access admin panel
   session_start();
   if($_SESSION['customer_role']!='normal'){
   header("location:../index.php?User");
  }

  ?>