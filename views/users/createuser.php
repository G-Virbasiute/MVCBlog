<html>
    <head>
        <title>Sign Up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
        <link href="carouselcss.css" rel="stylesheet" type="text/css"/>
    </head>
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
</html>

