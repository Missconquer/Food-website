 <?php
        session_start();
     ?>



<html>
    <head>
        <link rel="stylesheet" href="style2.css">
    </head>
    <body>
        <form action="" method="POST">
            <h1>Log in FODMS</h1>
            <div class="reg">
                <label for="email" name=" email">email<label><br/>
                        <input type="text" name="email"required placeholder="Enter your email"><br/>
            </div>
            <div class="reg">
                <label for="password" name="password"> password<label><br/>
                        <input type="password" name="password"required placeholder="Enter your password"><br/>
            </div>
            <div class="button">
                <input type="submit" name="submit" value="login now"/>      
            </div>
            <p  text-color:white>
                don't you have account??
                <a href="register.php">register here</a>
                
            </p>

        </form>
        <br/>
        <?php
        if(isset($_POST['submit'])){
            $link= mysqli_connect('localhost', 'root', '', 'fodms');
            //capture
            $Email=$_POST['email'];
            $Password=$_POST['password'];
            
            //validate
            if($Email!="" && $Password!=""){
                $query="select *from login where email='$Email' AND password='$Password'";
                $result= mysqli_query($link, $query);
                
                //check if exist 
            if(mysqli_num_rows($result)){
                //registre session \
                $_SESSION['email']=$Email;
                $_SESSION['password']=$Password;
                
                //fetch from the database 
                $rows= mysqli_fetch_array($result);
                
                //authorisation
                if($rows['role']=="admin"){
                    header("location: Admin.php");
                    
                }
                elseif($rows['role']=="client"){
                    header("location: user.php");

                }
            else {
      header("location: deliver.php");
             }
            }
            else{
                echo 'Invalid email and password';
            }
            }else{
                echo 'Please fill both filled for email and password';
            }
        }
        ?>
 </body>
</html>
