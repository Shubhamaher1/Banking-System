<?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $gender = $_POST['gender'];
                    $balance=$_POST['balance'];
                
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
                else{ 
                    // Submit these to a database
                    // Sql query to be executed 
                    $SELECT = "SELECT email From register Where email =? Limit 1";
                    $sql = "INSERT INTO `shb` (`Name`, `Email Id`, `Gender`, `Balance`) VALUES (?, ?, ?, ?)";
                    $result = mysqli_query($conn, $sql);
            
                    if($result){
                    echo "<div class='alert alert-success alert-dismissible fade show hide' role='alert'>
                    <strong>Success!</strong> Your entry has been submitted successfully!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span class='errorClose' aria-hidden='true'>×</span>
                    </button>
                    </div>";
                    }
                    else{
                        // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
                        echo "<div class='alert alert-danger alert-dismissible fade show hide' role='alert'>
                    <strong>Error!</strong> We are facing some technical issue and your entry was not submitted successfully! We regret the inconvinience caused!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span class='errorClose' aria-hidden='true'>×</span>
                    </button>
                    </div>";
                    }

                }

            }

                
        ?>