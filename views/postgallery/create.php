<body style="font-family: 'Amatic SC', cursive; font-size: 30px;">
    <div class="row" style='margin-right: 10px; margin-left: 10px'>
        <div class="leftcolumn" >
            <div class="card">
                <p style="padding-left:20px;padding-top:20px;">Select pictures to use in the blog gallery:</p>
                <div class="wrapper" style="width:350px;padding-left:20px;padding-top:20px;">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class = "form-group">
                            <label>Image 1</label>
                            <input type="text" name="img1desc" class="form-control" placeholder="Describe image 1 in your gallery" required autofocus>
                        </div>    
                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                        <input type = "file" name = "blogpic[]" accept="image/*" class="form-control" />
                        <span class="help-block"></span></br>
                        <div class="form-group">
                            <label>Image 2</label>
                            <input type="text" name="img2desc" class="form-control" placeholder="Describe image 2 in your gallery" required autofocus>
                        </div>    
                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                        <input type = "file" name = "blogpic[]" accept="image/*" class="form-control" />
                        <span class="help-block"></span></br>
                        <div class="form-group">
                            <label>Image 3</label>
                            <input type="text" name="img3desc" class="form-control" placeholder="Describe image 3 in your gallery" required autofocus>
                        </div>    
                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                        <input type = "file" name = "blogpic[]" accept="image/*" class="form-control" />
                        <span class="help-block"></span></br>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Create my post!">
                    <!--<input type="reset" class="btn btn-outline-info" value="Reset">-->
                </div>
            </div>