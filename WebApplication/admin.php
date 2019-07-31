<!DOCTYPE html>

<?php
    define("MY_INC_CODE", 888);
    define("APPLICATION_PATH", "app");
    define("VIEW_PATH", APPLICATION_PATH . "/view");
    include (APPLICATION_PATH . "/inc/config.inc.php");
    include (APPLICATION_PATH . "/inc/db.inc.php");   
    
    $menuActive_home = "active";
//    $menuActive_privatepage1 = "active";
//    $menuActive_privatepage2 = "active";
//    $menuActive_privatepage3 = "active";
?>

<html lang="en">
    
<head>
    
<?php include (VIEW_PATH . "/head.php"); ?>
    
<!-- needed for the header image -->
<style> 
html,
body,
header {
    height: 100%;
}
</style>
    
</head>

<body class="intro">
        
<!-- HEADER ------------------------------------------------>
        
<?php 
    
    echo '<header>';
    include (VIEW_PATH . "/private/admin/nav-admin.php"); 
    echo "<header>";
?>
        
<!-- MAIN CONTENT ------------------------------------------>
<?php
    include (VIEW_PATH . "/public/welcome.php"); 
?>
<main class="margin-top-6">  
<div class="container">

        <!-- .................................................... --> 
        <div class="row">
            <div class="col-sm-12">
                <?php
                    if( $_GET != NULL && !empty($_GET['login']))
                    {
                        $loginStatus = $_GET['login'];
                        if($loginStatus == 'nouser')
                            {echo '<p class="text-danger">Invalid user or password</p>';}
                        elseif($loginStatus == 'dbfail')
                            {echo '<p class="text-danger">Database connection issue</p>';}
                        elseif($loginStatus == 'empty')
                            {echo '<p class="text-info">Either username or password empty</p>';} 
                        else
                            {echo '';}
                    }
                ?>
            </div><!-- column -->
        </div><!-- row -->
        <!-- .................................................... -->

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

