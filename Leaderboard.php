<?php
     require 'dbh.inc.php';  
     
   
?> 
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="Leaderboard.css">
              
	
</head>
    <body class="main-wrapper">
        <div class="header"><h2 class="titel-tekst">LEADERBOARD</h2></div>
        <div class="main-container">
            <div class="titel-scorecontainer"><table><td class="titel-scoretabel"><h3 class="titeltekst-scoretabel">NAAM</h3></td><td class="titel-scoretabel"><h3 class="titeltekst-scoretabel">SCORE</h3></td><td class="titel-scoretabel"><h3 class="titeltekst-scoretabel">Akg</h3></td></table></div>
            <?php
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    echo "Connection error";
                } 

                $sql = "SELECT * FROM user_info";  
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                echo "<table class='tabel-container'><br>";
                $i = 0;

                while($i < $resultCheck ){
                        $i++;
                        $sql2 = "SELECT * FROM `user_info` WHERE ID ='$i'"; 
                        $user = mysqli_query($conn, $sql2);
                        $row = mysqli_fetch_assoc($user);
                        echo "<tr><td class='tableColom'>".$row['user_id']."</td><td class='tableColom'>".$row['user_score']."</td><td class='tableColom'>".$row['user_amount']."</td></tr>";

                  }
                echo "<br></table>"
            ?> 
        </div>
    </body>
</html>
