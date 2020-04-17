<div style="font-family: 'Amatic SC', cursive; font-size: 30px;">
    <p style="padding-left:20px;padding-top:20px;">Update a category</p>

    <div class="wrapper" style="width:350px;padding-left:20px;padding-top:20px;">


        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">

               
                <div class="form-group ">
                    <label>Category</label>
                    <input type="text" name="category" class="form-control" value="<?= $category->category; ?>">
                    <span class="help-block"></span>
                </div>               

                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Update Category">
                    <input type="reset" class="btn btn-outline-info" value="Reset">
                </div>
            </div>
        </form>
    </div>    
</div>
