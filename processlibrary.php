<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        </head>
        <body>
            
        



            <?php

            if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['fname'])
            && isset($_POST['lname']) && isset($_POST['phone'])){      
            $first = htmlspecialchars($_POST['fname']);
            $last = htmlspecialchars($_POST['lname']);
            $email = htmlspecialchars($_POST['email']);
            $phone =htmlspecialchars($_POST['phone']);
            $pass = htmlspecialchars($_POST['pass']);
            $date = htmlspecialchars(new DateTime('now'));
            $role = htmlspecialchars($_POST['role']);

        }
        if(!isset($_POST['email']) || !isset($_POST['pass']) || !isset($_POST['fname'])
            || !isset($_POST['lname']) || !isset($_POST['phone'])){
            echo "<p> You have not entered all the required details.</p>";
            //Please go back and try again.</p>";
            //exit;
            }
            
            $db = new mysqli('localhost', 'root', '', 'restApp');
            
           if (mysqli_connect_errno()){
               echo '<p>Error: Could not connect to database.<br/>
               please try again later.<p>';
           }
           $dateString = $date->format("Y-m-d\ T H:i:s");

           if(isset($role)){
            $query = "INSERT INTO User1(FirstName, LastName, Email, Phone, Password, CreatedOn, Role) VALUES ('$first', '$last', '$email', '$phone', '$pass', '$dateString', '$role');";
           }else{
           $query = "INSERT INTO User1(FirstName, LastName, Email, Phone, Password, CreatedOn) VALUES ('$first', '$last', '$email', '$phone', '$pass', '$dateString');";
           }
           mysqli_query($db, $query);
           if($db->affected_rows > 0){
            echo "<p>User Created Successfully.<br/>";
        
         
           }else{
               echo "User not created successfully";
           }
           $db->close();

            ?>
            <p><a href = "loginPage.html">Go back to login</a></p>
            </body>
            </html>