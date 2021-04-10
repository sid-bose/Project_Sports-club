<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEE Live Score</title>
</head>
<body>
    <h1>See live Scores Here</h1>
    <h2>On going Matches</h2>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "match");

    if ($conn->connect_error) {
        die("Connection failed due to error in code : " . $conn->connect_error);
        }

    $sql="SELECT * FROM match_details";
    $result=$conn->query($sql);
    ?>
    <table class="content-table"  align="center" border="1px">
        <thead>
           <tr>
            <th>Event id</th>
            <th>Match Name</th>
            
           
          </tr>
        </thead>
    
    <?php
if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
 ?>         
            <tr>
                <td><?php echo $row['event_id'];?></td>
                <td><a href="display_stats.php"><?php echo $row['match_name'];?><a></td>
            
                
            </tr> 
       <?php     
        }
        
        
    }
    else{
        echo "no matches available";
    }
    ?>
    </table>

    <?php


$conn->close();










        ?>
        <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>