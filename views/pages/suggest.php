<div class="row" style='margin-right: 10px; margin-left: 10px'>
    <div class="leftcolumn" style="width: 50%; text-align: center" >
            <h2 style='font-size: 50px; font-family: "Amatic SC", cursive;'>Send us an e-mail:</h2>
            
            <form method="post" name="contactform" action="contact_form_handler_suggestion.php"> 
                Your Name: <br>
                <input type="text" name="name"><br>
                Email Address: <br>
                <input type="text" name="email"><br>
                Suggestion:<br>
                <textarea name="message"></textarea><br><br>
                <input type="submit" value="Submit">
            </form>
            
            <script language=”JavaScript”>
    var frmvalidator = new Validator("contactform"); 
    frmvalidator.addValidation("name","req","Please provide your name"); 
    frmvalidator.addValidation("email","req","Please provide your email"); 
    frmvalidator.addValidation("email","email", "Please enter a valid email address"); 
</script>

    </div>
    <div class="rightcolumn" style="width: 50%" >
        <div style='font-size: 30px; font-family: "Amatic SC", cursive;'>
            <p> Would like a different category? More events? Drop us an e-mail and we'll get back to you as soon as possible!</p></br>
            <p> Happy Stitching!</p>
        </div>
    </div>

</div>
