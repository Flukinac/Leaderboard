<?php
     require 'dbh.inc.php';           
   
?> 
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="Leaderboard.css">
              
	
</head>
    <body class="main-wrapper">
        
            <?php
                $sql = "SELECT * FROM user_info"; 
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                echo "<table border=2px><br>";
                $i = 0;
                
                while($i < $resultCheck ){
                        $i++;
                        $sql2 = "SELECT * FROM `user_info` WHERE ID ='$i'"; 
                        $user = mysqli_query($conn, $sql2);
                        $row = mysqli_fetch_assoc($user);
                        echo "<tr><td>".$row['user_id']."</td><td>".$row['user_score']."</td><td>".$row['user_amount']."</td></tr>";

                  }
                echo "<br></table>"
            ?> 
       
    </body>
</html>
