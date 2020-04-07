
    <body style="font-family: 'Amatic SC', cursive; font-size: 30px;">
        
        
    <p style="padding-left:20px;padding-top:20px;">Complete the form to register as a member.</p>
    <div class="wrapper" style="width:350px;padding-left:20px;padding-top:20px;">
        
        <form action="" method="post" enctype="multipart/form-data">
            
            <div class="form-group ">
                <label>Username</label>
                <input type="text" name="username" class="form-control" autofocus="true" autocomplete='off'>
                <span class="help-block">
            </div>            
            
             
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstname" class="form-control" autocomplete='off'>
                <span class="help-block"></span>
            </div>     
            
            <div class="form-group">
                <label>Surname</label>
                <input type="text" name="surname" class="form-control" autocomplete='off'>
                <span class="help-block">
            </div> 
            
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" autocomplete='off'>
                <span class="help-block"></span>
            </div> 
 
            <div class="form-group">
                <label>Upload Profile Picture</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                <input type="file" name="profilepic" accept="image/*" class="form-control">
                <span class="help-block"></span>
            </div> 
            
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"></span>
            </div>
            
            
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"></span>
            </div>
            
            
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Register">
                <input type="reset" class="btn btn-outline-info" value="Reset">
            </div>
        </form>
    </div>    
    <p style="padding-left:20px;">Already have an account? <a href="login.php">Login here</a>.</p>
</body>

