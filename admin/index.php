<?php include "includes/adm_header.php";  ?>


    <div id="wrapper">


    



<!--Navigation-->
<?php include "includes/adm_navigation.php";  ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin 
                            <small><?php if($connection) echo "Fuck the social medias"; ?></small>
                        </h1>
                    </div>
                </div>
                
                <div class="col-xs-6">
                <form action="">
                 <div class="form-group">
                     <label for="cat_title">Add Category</label>
                     <input type="text" class="form-control" name="cat_title">
                 </div>
                 <div class="form-group">
                     
                     <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                 </div>     
                </form>
                </div>
                
                
                
                
                
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/adm_footer.php"; ?>

