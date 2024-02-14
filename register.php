<html>
    <head>
    
        <meta charset="UTF-8">
        <title>document</title>
        <link rel="stylesheet" href="style2.css">
    </head>
    <body>
        <form action="" method="POST">
            <h1>register now</h1>
            
            <div class="reg">
                <label for="fullname" name="fullname">Fullname</label><br/>
                <input type="text" name="fullname" required placeholder="Enter your name"><br/>
            </div>
            
            <div class="reg">    
                <label for="phonenumber" name="phonenumber">Phonenumber</label><br/>
                <input type="phonenumber" name="phonenumber" required placeholder="Enter your phonenumber"><br/>
            </div>
                       
            <div class="reg">
                <label for="email" name="email">email</label><br/>
                <input type="text" name="email" required placeholder="Enter your email"><br/>
            </div>
            
            <div class="reg">
                <label for="password" name="password">Password</label><br/>
                <input type="password" name="password" required placeholder="Enter your password"><br/>
            </div>
            
            <div class="reg">
                <label for="location" name="location">location</label><br/>
                <input type="text" name="location" required placeholder="Enter your location"><br/>
            </div>
           
            <div class="button">
                 <input type="submit" name="submit" value="register here">
            </div>
            <p  text-color:white>
               already registered?
               <a href="login.php ">log in here</a>
                
            </p>
            <div class="log">
                <center>    <?php
        if(isset($_POST['submit'])){
            
            //connection
        
        $link= mysqli_connect("localhost", "root","","fodms");
       
            //capture form data
            
                $fullname=$_POST['fullname'];
                $phonenumber=$_POST['phonenumber'];
                $email=$_POST['email'];
                $password=$_POST['password'];
                $location=$_POST['location'];
                
                if(!empty($fullname) && !empty($phonenumber) && !empty($email) && !empty($password) && !empty($location)){
                    //sql statement
                 $query="INSERT INTO client(fullname,phonenumber,email,password,location) values ('$fullname','$phonenumber', "
                            . "'$email','$password','$location')";
                 
                 $result= mysqli_query($link,$query);
                 
                    //check sql statement
                 
             if($result){
                 echo 'data saved saccessfully';
                }
 else {
                    
      echo mysqli_error($link);          }
        }
        
 } else {
     
     echo ' please fill in all field';
 }
 
  ?>
                </center>
                <div/>
        </form>

    </body>
</html>
