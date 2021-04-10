<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direction Verify</title>
</head>
<body>
    <h1>This portal is to verify match</h1>
    <form action="direct_verify.php" method="post">
    <p>event-id</p>
    <input type="text" name="event_id">
    <input type="submit" value="verify">
    </form>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>

<?php

$conn = mysqli_connect("localhost", "root", "", "match");

if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }

    $conn1 = mysqli_connect("localhost", "root", "", "co-ordinator");

    if ($conn1->connect_error) {
        die("Connection failed due to error in code : " . $conn1->connect_error);
        }

        

    
session_start();

$event_id = filter_input(INPUT_POST, 'event_id');
$sql="SELECT * FROM match_details";
$result=$conn->query($sql);
$flag=true;
if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            if($row['event_id']==$event_id)
            {
                $flag=true;
                $_SESSION['event_id']=$event_id;
                break;
            }
            else{
                $flag=false;
            }
        }

    }
if($flag==true)
{
    echo"Successfully verified";
    $sql="SELECT * FROM coordinator_reg";
    $result=$conn1->query($sql);
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            if($row['sports']=='Cricket')
            {
                echo "<script> window.location.assign('toss.php'); </script>";
            }
        }
    
    }
}
else{
    echo"Wrong event id entered";
}

?>