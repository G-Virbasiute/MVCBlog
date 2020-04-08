<body style="font-family: 'Amatic SC', cursive; font-size: 30px;">
        
 <p style="padding-left:20px;padding-top:20px;">Complete the form to register as a member.</p>
    <div class="wrapper" style="width:350px;padding-left:20px;padding-top:20px;">
        
        <form action="" method="post" enctype="multipart/form-data">
            
            <div class="form-group ">
                <label>Username</label>
                <input type="text" name="username" class="form-control" autofocus="true" autocomplete='off' required>
                <span class="help-block">
            </div>            
            
             
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstname" class="form-control" autocomplete='off' required>
                <span class="help-block"></span>
            </div>     
            
            <div class="form-group">
                <label>Surname</label>
                <input type="text" name="surname" class="form-control" autocomplete='off' required>
                <span class="help-block">
            </div> 
            
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" autocomplete='off' required>
                <span class="help-block"></span>
            </div> 
 
            <div class="form-group">
                <label>Upload Profile Picture
                <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                <input type="file" id="profilepic" name="profilepic" accept="image/jpeg" class="form-control" onchange="Filevalidation()" required>
                <span class="help-block"></span>
            </div> 
            
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="psw" name="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                <span class="help-block"></span>
            </div>
            
            <div id="message">
                <h3>Password must contain the following:</h3>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
            
            
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" id="conf-psw"name="confirm_password" class="form-control">
                <span class="help-block"></span>
            </div>
            
            
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Register" onclick="return Validate()">
                <input type="reset" class="btn btn-outline-info" value="Reset">
            </div>
        </form>
    </div>    
    <p style="padding-left:20px;">Already have an account? <a href="?controller=user&action=authUser">Login here</a>.</p>
    
    
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

    function Validate() {
        var password = document.getElementById("psw").value;
        var confirmPassword = document.getElementById("conf-psw").value;
       if (password != confirmPassword) {
            alert("Your passwords do not match, please try again");
            return false;
        }
        return true;
    }
    
    Filevalidation = () => { 
        const fi = document.getElementById('profilepic'); 
        // Check if any file is selected. 
        if (fi.files.length > 0) { 
            for (const i = 0; i <= fi.files.length - 1; i++) { 
  
                const fsize = fi.files.item(i).size; 
                const file = Math.round((fsize / 1024)); 
                // The size of the file. 
                if (file >= 5120) { 
                    alert( 
                      "Your picture exceeds the size limit. Please select a file less than 5mb in size"); 
                }
            } 
        } 
    } 
</script>

</body>

