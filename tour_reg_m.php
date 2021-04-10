


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Event Register</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/>
    <link href="style3.css" rel="stylesheet"/>
</head>
<body>
<section class="text-gray-400 bg-gray-900 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
    <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
      <h1 class="title-font font-medium text-3xl text-white">Register for Events</h1>
      <p class="leading-relaxed mt-4"></p>
    </div>
    <div class="lg:w-2/6 md:w-1/2 bg-gray-800 bg-opacity-50 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
      <h2 class="text-white text-lg font-medium title-font mb-5">Event Registration</h2>
      <form action="tour_reg_m.php" method="post">
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Name</label>
        <input type="text" id="full-name" name="name" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-400">Sports Name</label>
        <input type="text" id="email" name="sports_cat" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <button  class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Register</button>
      <p class="text-xs mt-3">*Sports club All rights Reserved*</p>
    </div>
    </form>
  </div>
</section>

<header class="text-gray-400 bg-gray-900 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">IIITG SPORTS CLUB</span>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <!-- <a class="mr-5 hover:text-white">First Link</a>
      <a class="mr-5 hover:text-white">Second Link</a>
      <a class="mr-5 hover:text-white">Third Link</a>
      <a class="mr-5 hover:text-white">Fourth Link</a> -->
    </nav>
    <form action="tournament_m.php" method="post">
    <button class="inline-flex items-center bg-gray-800 border-0 py-1 px-3 focus:outline-none hover:bg-gray-700 rounded text-base mt-4 md:mt-0">Go Back
    <form>
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg>
    </button>
  </div>
</header>
<script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>

<?php
$host="localhost";
$user="root";
$password="";


$conn=mysqli_connect($host,$user,$password,"event_create");
if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }
$sql="SELECT sports_type from creator";
$result=$conn->query($sql);


$conn1=mysqli_connect($host,$user,$password,"event_register");
if ($conn1->connect_error) {
    die("Connection failed due to error in code : " . $conn1->connect_error);
    }
$sql1="SELECT * from mem_reg";
$result1=$conn1->query($sql1);



$conn2=mysqli_connect($host,$user,$password,"registration");
if ($conn2->connect_error) {
    die("Connection failed due to error in code : " . $conn1->connect_error);
    }
    $sql2="SELECT Name , username from registration_details";
$result2=$conn2->query($sql2);

session_start();
$name=filter_input(INPUT_POST, 'name');
$sports_type_m=filter_input(INPUT_POST, 'sports_cat');

if ($result2->num_rows > 0) 
{
    while($row = $result2->fetch_assoc())
    {
        if($row['username']==$_SESSION['username'])
        {
            $real_name=$row['Name'];
            break;
        }
    }

}

// if(isset($_POST['name'])){
    
//     $uname=$_POST['name'];
//     $pass=$_POST['sports_cat'];
    
    
//     $sql1="SELECT * from mem_reg where name='".$uname."'AND sports_type='".$pass."' limit 1";
   
//     $result1=$conn1->query($sql1);
//    // $result1=$conn->query("SELECT sports1 from registration_details where username='".$uname."'AND password='".$password."'");
//     //$sports1=$result1->fetch_assoc();
//     if(mysqli_num_rows($result)==1){
//         $flag=true;
//        // $_SESSION['sports1']=$sports1[1];
//     }
//     else{
//         $flag=false;
//     }
// }





if($result)
{
    $counter=mysqli_num_rows($result);
}

// echo "$counter";

 if ($result->num_rows > 0) 
{
if($real_name==$name)
  {
    //   if($flag==true)
    //   {
   while($row = $result->fetch_assoc())
  {
     if($row['sports_type']==$sports_type_m)
      {
            $sql1=" INSERT INTO mem_reg (`name`, `sports_type`) VALUES ('$name','$sports_type_m')";
           if($conn1->query($sql1))
           {
               echo"<p class='login_wrong'>SUCCESSFULLY REGISTERED<p>";
              
            }
           else
           {
                echo"<p class='login_wrong'>REGISTRATION ERROR<p>";
           }            break;
      }
         else if($row['sports_type']!=$sports_type_m && $counter==1)
          {
                             echo"<p class='login_wrong'>SPORTS FIELD DOES'NT MATCH<p>";
               break;
         }
         else{
             $counter=$counter-1;
         }
    }
    //  }else{
    //      echo"you have already registered for this sport once";
    //   }
    }
    else{
        echo"<p class='login_wrong'>ENTER YOUR NAME ONLY<p>";
    }

 }
 else{
     echo"<p class='login_wrong'>You cannont register as there are no events<p>";
 }

 $conn->close();
 $conn1->close();
 $conn2->close();
?>



