<body style="font-family: 'Amatic SC', cursive; font-size: 30px;">
        
 <p style="padding-left:20px;padding-top:20px;">Enter your email address to receive a new password.</p>
    <div class="wrapper" style="width:350px;padding-left:20px;padding-top:20px;">
        
        <form action="" method="post">
                    
            <div class="form-group">
                <label>Your Email Address</label>
                <input type="email" name="email" class="form-control" autofocus="true" autocomplete='off' required>
                <span class="help-block"></span>
            </div> 
          
            <div class="form-group">
                <input type="submit" class="btn btn-info" name="reset-request-submit" value="Send me a password">
            </div>
        </form>
        <?php
            if (isset($_GET["reset"])){
                if ($_GET["reset"] == "success") {
                    echo '<p class="signupsuccess">Check your email!</p>';   
                }
            }
        ?>     
            
    </div> 
 
 <br>
     <p style="padding-left:20px;">
        Changed your mind? <a href="?controller=user&action=authUser">Return to login page</a>.<br>