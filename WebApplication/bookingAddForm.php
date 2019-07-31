<!DOCTYPE html>
    <!--<body>-->
        <!--<main class="margin-top center">-->    
            <div class="container">
                <div class="card card-container mx-auto">
                    <form action="BookingAdd.php" method="POST" id="registration1">
                        <!--<label for="type">Vehicle Type:</label>-->
                        <input type="date" 
                            class="form-control" 
                            id="bk_date" name="bk_date" 
                            required autofocus
                        >
                        <br> 
                        <select 
                            class="form-control" 
                            required
                            id="bk_type"
                            name="bk_type"
                            selected 
                            >
                            <?php
                                include ("sqlTypeBk.php");
                            ?>
                        </select>
                        <br>
                        <input type="text" 
                            class="form-control" 
                            id="bk_note" name="bk_note"
                            placeholder="Give us some previus information here"
                        >
                        <br>
                        <button class="btn btn-lg btn-mute btn-block btn-signin" type="submit">Register</button>
                    </form>
                </div><!-- /card-container -->
            </div> <!-- END container-->      
        <!--</main>-->
<!--    </body>-->
</html>
