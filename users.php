<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
<style>

table {
    border-collapse: collapse;
    width: 100%;
    color:black;

    font-size: 25px;
    text-align: left;
}
th {
    background-color:#7cf6d1;
    color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
 


#sideNav{
    width: 250px;
    height: 100vh;
    position: fixed;
    right: -250px;
    top:0;
    background: #7cf6d1;
    z-index: 2;
    transition: .5s;
}
nav ul li{
    list-style: none;
    margin: 50px 20px;
}
nav ul li a{
    text-decoration: none;
    color: #fff;
}
#menuBtn{
    width: 50px;
    position: fixed;
    right: 65px;
    top: 35px;
    z-index: 2;
    cursor: pointer;
}
 
</style>
</head>
<body>
<div style="font-family: 'Gabriela', serif;   font-size: 40px;
    text-align: center;
    margin: 20px;
}">Bank's  Customers</div>
<table>
<tr>

<th>Name</th>
<th>Email</th>
<th>Gender</th>
<th>Balance</th>
<th>Transfer</th>
</tr>





<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "shubham";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}


$sql = "SELECT * FROM `shb`";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
$num = mysqli_num_rows($result);

// Display the rows returned by the sql query
if($num> 0){
    

    // We can fetch in a better way using the while loop
    while($row = mysqli_fetch_assoc($result)){
        // echo var_dump($row);
       
        
        echo "<tr>";
    echo '<form method ="post" action = "Details.php">';
    echo "<td>" . $row["Name"] . "</td>
    <td>" . $row["Email Id"] . "</td><td>" . $row["Gender"] . "</td><td>" . $row["Balence"] . "</td>";
    echo "<td ><a href='Details.php?user={$row["Name"]}&message=no' type='button' name='user'  id='users1' ><span>Transfer Now</span></a></td>";
    echo "</tr>";
}
echo "</table>";
}
?>
 </section>
        <nav id="sideNav">
            <ul>
                <li><a href="main.html">HOME</a></li>
                <li><a href="users.php">OUR CUSTOMERS</a></li>
                <li><a href="history.php">TRANSACTION HISTORY</a></li>
                <li><a href="users.php">TRANSFER MONEY</a></li>
                <li><a href="Register.php">NEW USER</a></li>
            </ul>
        </nav>
        <div id="hojaplz">
        <img src="images/menu.png" id="menuBtn">
</div>

        <script>
           let menuBtn = document.querySelector('#hojaplz');
            let sideNav = document.querySelector('#sideNav')
           
            let condition = true;

           menuBtn.addEventListener('click',function(){
               if(condition){
                   sideNav.style.right = '0px';
                   condition = false;
               }else{
                sideNav.style.right = '-250px';
                condition = true;
               }
           })
        </script>
</table>
</body>
</html>