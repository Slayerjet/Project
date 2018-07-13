<?php
//set the title for the page
$title = 'VGHS - Sign in';
 include('header.php');
?>

    <br>
    <br>
    <br>
    <div class="container">

        <form method="post" action="server.php">
            <div style="color: red;">
           <?php 
           if(isset($_GET['addReview'])){
               echo "*You need to login before writing a review";
               echo '<br>';
           }  
            if(isset($_GET['addGame'])){
               echo "*You need to login before adding a game";
               echo '<br>';
           } 
            if(isset($_GET['addConsole'])){
               echo "*You need to login before adding a console";
               echo '<br>';
           } 
            
            if(isset($_SESSION['$errors'])){
            if(count($_SESSION['$errors']) > 0){
                echo "*Username or Password is missing or incorrect";
            }
//            var_dump($_SESSION);
            }
            ?>
               </div>

            <div class="form-group">
                <div>
                    <label>Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Username">
                </div>
                <br>
                <div>
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <br>
                <div class="input-group">
                    <button type="submit" class="btn btn-success" name="login_user">Login</button>
                </div>
                <br>
                <div>
                    Dont have an account? <a href="register.php">Register now!</a>
                </div>
            </div>
        </form>
</div>
<?php
    include('footer.php');
?>
