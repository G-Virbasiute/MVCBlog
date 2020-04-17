    <body style="font-family: 'Amatic SC', cursive; font-size: 30px;">
        <div class="wrapper" style=width:350px;padding:20px;>
            <form action="" method="post">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" autocomplete='off' autofocus="true" required>
                </div>    
                <div>
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Login">
                </div>
                
            </form>
                <img height="27px" width="auto" src="views/images/fbutton.png">
                <img height="31px" width="auto" src="views/images/gbutton.png">                       

        </div>
        
        <p style="padding-left:20px;">
            Don't have an account? <a href="?controller=user&action=createUser">Sign up now</a>.<br>
            <a href="?controller=user&action=forgotPassword">Forgot Your Password?</a><br>

        </p>
        
    </body>
</html>

