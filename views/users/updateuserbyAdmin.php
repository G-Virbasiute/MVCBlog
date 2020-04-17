    <body style="font-family: 'Amatic SC', cursive; font-size: 30px;">
        <p style="padding-left:20px;padding-top:20px;">Update user details</p>

        <div class="wrapper" style="width:350px;padding-left:20px;padding-top:20px;">


            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    
                    <div class="form-group ">
                        <label>User Type</label>
                            <select name="usertype" required>
                                    <option value="Member">Member</option>
                                    <option value="Writer">Writer</option>
                                    <option value="Administrator">Administrator</option>
                            </select>                        
                    </div>   

                    <div class="form-group ">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $user->username; ?>" readonly>
                        <span class="help-block">
                    </div>               

                    <div class="form-group">
                        <label>Update First Name</label>
                        <input type="text" name="firstname" class="form-control"  value="<?= $user->firstName; ?>">
                        <span class="help-block"></span>
                    </div>     

                    <div class="form-group">
                        <label>Update Surname</label>
                        <input type="text" name="surname" class="form-control" value="<?= $user->lastName; ?>">
                        <span class="help-block">
                    </div> 

                    <div class="form-group">
                        <label>Update Email Address</label>
                        <input type="email" name="email" class="form-control" value="<?= $user->emailAddress; ?>">
                        <span class="help-block"></span>
                    </div> 

                    <div class="form-group">
                        <input type="submit" class="btn btn-info" value="Update User">
                        <input type="reset" class="btn btn-outline-info" value="Reset">
                    </div>
            </form>
        </div>    

    </body>
</html>