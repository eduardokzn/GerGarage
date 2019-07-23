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

    include (VIEW_PATH . "/public/banner.php"); 
    include (APPLICATION_PATH . "/inc/db.inc.php");
?>
        
<!-- MAIN CONTENT ------------------------------------------>
<?php
    $userFn = $userLn =$address = $mobile = $email = $password1 = $password2 = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
    }
    if (empty($_POST["email"])) {} else {       $email = test_input($_POST["email"]);        }
    if (empty($_POST["userFn"])) {} else {      $userFn = test_input($_POST["userFn"]);        }
    if (empty($_POST["userLn"])) {} else {      $userLn = test_input($_POST["userLn"]);        }
    if (empty($_POST["address"])) {} else {     $address = test_input($_POST["address"]);        }
    if (empty($_POST["mobile"])) {} else {      $mobile = test_input($_POST["mobile"]);        }
    if (empty($_POST["password1"])) {} else {   $password1 = test_input($_POST[hash("ekzn" +"password1")]);    }
    if (empty($_POST["password2"])) {} else {   $password2 = test_input($_POST[hash("ekzn" +"password2")]);    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    
?>
<main class="margin-top-6 center">    
<div class="container"> 
<br>
<div class="card card-container mx-auto">
          
<h2 class="text-center">Registration</h2>
    
    <form action="registerUser.php" method="POST" id="registration1">

        <input type="email" id="email" name="email"
        class="form-control" placeholder="yourself@yourprovider.ie" 
        value="<?php echo $email;?>" required autofocus><br>

        <input type="text"  id="userFn"  name="userFn"
        class="form-control" placeholder="First name" 
        value="<?php echo $userFn;?>" required ><br>

        <input type="text"  id="userLn"  name="userLn"
        class="form-control" placeholder="Surname" 
        value="<?php echo $userLn;?>" required ><br>

        <input type="text"  id="address"  name="address"
        class="form-control" placeholder="Address" 
        value="<?php echo $address;?>" required ><br>

        <input type="text"  id="mobile"  name="mobile"
        class="form-control" placeholder="mobile number" 
        value="<?php echo $mobile;?>" required ><br>

        <input type="password" id="password1"  name="password1"
        class="form-control" placeholder="password" 
        value="<?php echo $password1;?>"required ><br>

        <input type="password" id="password2"  name="password2"
        class="form-control" placeholder="confirm password" 
        value="<?php echo $password2;?>" required ><br>
        
        <button class="btn btn-lg btn-mute btn-block btn-signin" type="submit">Register</button>
    </form>

    <p>
    <!-- if there is an issue with registration, 
         return here with a registration parameter so we can show a status
    -->
    <?php
        //$('registration').load("registration.php");
        if( $_GET != NULL && !empty($_GET['registration']))
        {
            $regStatus = $_GET['registration'];

            if($regStatus == 'exists')
                {echo '<p>Username or email already exists</p>';}
            elseif($regStatus == 'dbfail')
                {echo '<p>Database connection issue</p>';}
            //elseif($regStatus == 'empty')
            //    {echo '<p>Either mobile, email or password are empty</p>';}   
            elseif($regStatus == 'pass')
                {echo '<p>Password does not match</p>';}
            elseif($regStatus == 'ok')
                {echo '<p>registration was sucessful</p>';}     
            else
                {echo $regStatus;}
        }
    ?>
    </p>

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
