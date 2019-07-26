<!DOCTYPE html>

<?php
    $menuActive_about = "active";
    define("MY_INC_CODE", 888);
    define("APPLICATION_PATH", "app");
    define("VIEW_PATH", APPLICATION_PATH . "/view");
    include (APPLICATION_PATH . "/inc/config.inc.php");
?>

<html lang="en">
    
<head>
    
<?php include (VIEW_PATH . "/head.php"); ?>
    
</head>

<body>
        
<!-- HEADER ------------------------------------------------>
        
<?php 
    echo "<header>";
    include (VIEW_PATH . "/public/banner.php");
    echo "</header>";
    
    include (APPLICATION_PATH . "/inc/db.inc.php");
?>
        
<!-- MAIN CONTENT ------------------------------------------>
<main class="margin-top-6 horizontal-center">    
<div class="container"> 
<br>
<div class="card card-container mx-auto">
    
    <!-- to see what the form sends out change action="showPageRequest.php" 
         rather than action="userExistsCheck.php"
    -->
    
    <form class="form-signin" action="userExistsCheck.php" method="POST">
        <h2>Request Access</h2><br>
        <input type="text" id="email" name="email" 
        class="form-control" placeholder="Email" 
        required autofocus><br>
        <input type="password" id="password" name="password" 
        class="form-control" placeholder="Password" 
        required><br>

        <div id="remember" class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <br><br>
        <button class="btn btn-lg btn-mute btn-secondary btn-block btn-signin" type="submit">Sign in</button>
        <br>
    </form>
    <form class="form-registerin" action="registration.php" method="POST">
        <button class="btn btn-sm btn-mute btn-secondary btn-block btn-signin" type="submit">Register</button>
    </form>
    //debugging
    <a href="showUserTable.php" class="forgot-password">
        debug: view user table 
    </a>
</div><!-- /card-container -->
</div> <!-- END container-->    
</main>

<!-- FOOTER ------------------------------------------------>
<footer>
    <?php include (VIEW_PATH . "/public/footer.php"); ?>
</footer>
        
<!-- all content above this line -->    
<?php include (VIEW_PATH . "/foot.php"); ?>
        
</body>
</html>


    