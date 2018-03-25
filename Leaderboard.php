<?php
    require 'dbh.inc.php';  
     
    if(isset($_GET['zoek'])) {
        $zoek = $_GET['zoek'];
        $sql = "SELECT * FROM user_info WHERE `user_id`='$zoek'"; 
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();    
    }
    if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            echo "Connection error";
        } 
                
        $sql = "SELECT * FROM user_info";  
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

?> 
<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="Leaderboard.css">
        <script>
            function searchFor(){
                var temp = document.getElementById("search").value;
                document.location = "Leaderboard.php?zoek="+temp;
            }
              
	</script>
</head>
    <body class="main-wrapper">
        
        <div class="header"><h2 class="titel-tekst">LEADERBOARD</h2>
            <a class="button" href=" ../loginsystem/signup.php">Terug</a>
            <input type="search" id="search" placeholder="zoek user">
            <input type="button" id="searchButton" onclick="searchFor()" value="zoek">
        </div>
        
        <div class="main-container">
            <div class="titel-scorecontainer">
                <table><?php
                        echo '<td class="titel-scoretabel"><h3 class="titeltekst-scoretabel" >'.$row['ID'].'</h3></td>
                        <td class="titel-scoretabel"><h3 class="titeltekst-scoretabel" >'. $row['user_id'].' </h3></td>
                        <td class="titel-scoretabel"><h3 class="titeltekst-scoretabel" >'. $row['user_score'].'</h3></td>
                        <td class="titel-scoretabel"><h3 class="titeltekst-scoretabel" >'. $row['user_amount'].'</h3></td>';
                        ?>
                </table>
            </div>
                <table class='tabel-container'><br>
                    <thead>
                        <td class="titel-scoretabel"><h3 class="titeltekst-scoretabel">RANG</h3></td>
                        <td class="titel-scoretabel"><h3 class="titeltekst-scoretabel">NAAM</h3></td>
                        <td class="titel-scoretabel"><h3 class="titeltekst-scoretabel">SCORE</h3></td>
                        <td class="titel-scoretabel"><h3 class="titeltekst-scoretabel">Akg</h3></td>
                    </thead>
                    
            <?php
                $i = 0;

                while($i < $resultCheck ){
                        $i++;
                        $sql2 = "SELECT * FROM `user_info` WHERE ID ='$i'"; 
                        $user = mysqli_query($conn, $sql2);
                        $row = mysqli_fetch_assoc($user);
                        echo "<tbody><tr><td class='tableColom' id=".$row['ID'].">".$row['ID']."
                                    <td class='tableColom' id=".$row['user_id'].">".$row['user_id']."
                                    </td><td class='tableColom' id=".$row['user_score'].">".$row['user_score']."
                                    </td><td class='tableColom' id=".$row['user_amount'].">".$row['user_amount']."
                                    </td></tr></tbody>";

                  }
                echo "<br></table>"
            ?> 
        </div>
    </body>
</html>



<!--//            function searchFor(){
//               var searchValue = document.getElementById("search").value; 
//               var xh = new XMLHttpRequest();
//               xh.onreadystatechange = function(){
//                   if(this.readyState === 4 && this.status === 200){
//                       
//                   rij(this.responseText);
//                   
//                   //console.log(this.responseText);
//                   };
//               };
//               xh.open("GET","LeaderboardSearch.php?zoek="+searchValue,true);
//               xh.send();   
//            };
//            function rij(ontvangen){
//                var temp = ontvangen;
//               alert(temp);
//            }-->