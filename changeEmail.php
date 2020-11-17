<!DOCTYPE html>
<html>
    <head>
        <title>Email Change Results</title>
        </head>
        <body>
            

            <?php
           

            if(isset($_POST['prevEmail']) && isset($_POST['newEmail'])&& isset($_POST['newEmail2'])){

            
           $prevEmail = htmlspecialchars($_POST['prevEmail']);
           $newEmail = htmlspecialchars($_POST['newEmail']);
           $verifyEmail = htmlspecialchars($_POST['newEmail2']);
           
            }

            $oldEmail = $prevEmail;

           if (!$prevEmail || !$newEmail || !$verifyEmail) {
               echo '<p>You have not entered one of the login fields.<br/>
               Please go back and try again</p>';
               exit;
           }
        
           $db = new mysqli('localhost', 'root', '', 'restApp');
           if (mysqli_connect_errno()){
               echo '<p>Error: Could not connect to database.<br/>
               please try again later.<p>';
           }

           $query = "select Email from user1 where Email ='".$prevEmail."'";
           $result = $db->query($query);
           if($result->num_rows > 0){
           $obj = $result->fetch_object();
           $oldPass = $obj->Email;
           }else{
               $oldEmail = $prevEmail;
               $newEmail = $oldEmail;
            echo "That previous Email is not valid";
            exit; 
           }

           $query2 = "UPDATE user1 SET Email = '".$newEmail."' WHERE Email = '".$oldEmail."'";
           $result2 =$db->query($query2);

           if($query2 == true){
               echo "Email successfully changed from $prevEmail to $newEmail<br/>";
           }


           ?>
           <a href ="profile.html">Back to Profile</a>
           </body>
           </html>