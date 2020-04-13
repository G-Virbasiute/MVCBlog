<div class="row" style='margin-right: 10px; margin-left: 10px'>
    <div class="leftcolumn" style="width: 50%; text-align: center" >
            <h2 style='font-size: 50px; font-family: "Amatic SC", cursive;'>Send us an e-mail:</h2>
            
            <form method="post" name="contactform" action="contact_form_handler.php"> 
                Your Name: <br>
                <input type="text" name="name"><br>
                Email Address: <br>
                <input type="text" name="email"><br>
                Message:<br>
                <textarea name="message"></textarea><br><br>
                <input type="submit" value="Submit">
            </form>
            
            <script language=”JavaScript”>
    var frmvalidator = new Validator("contactform"); 
    frmvalidator.addValidation("name","req","Please provide your name"); 
    frmvalidator.addValidation("email","req","Please provide your email"); 
    frmvalidator.addValidation("email","email", "Please enter a valid email address"); 
</script>

<!--
            <form action="mailto:lifesa2020stitch@gmail.com" method="post" enctype="text/plain">
                Name:<br>
                <input type="text" name="name"><br>
                E-mail:<br>
                <input type="text" name="mail"><br>
                Comment:<br>
                <textarea type="text" name="comment" size="50"></textarea><br><br>
                <input type="submit" value="Send">
                <input type="reset" value="Reset">
            </form>
-->

    </div>
    <div class="rightcolumn" style="width: 50%" >
        <div style='font-size: 30px; font-family: "Amatic SC", cursive;'>
            <p> Have any issues with the website? Would like to become a writer? Drop us an e-mail and we'll get back to you as soon as possible!</p></br>
            <p> Happy Stitching!</p>
        </div>
    </div>

</div>
