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
                            <small>Author Name</small>
                        </h1>
                    
                    
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
                </div><!--Add Category Form-->
                    
                    
                <div class="col-xs-6">
               <?php
               
                
                $query = "SELECT * FROM categories "; // LIMIT 3 PODE COLOCAR LIMITE NA ROW
                $select_categories = mysqli_query($connection, $query);
                
                ?>
                
                <table class="table table-bordered table-hover">
                    <thread>
                        <tr>
                            <th>Id</th>
                            <th>Category Title</th>
                        </tr>
                    </thread>
                    <tbody>
                        <tr>
                           
                           <?php
                           
                //enquanto achar row de id e title , printa na tela criando um td           
                
                while($row = mysqli_fetch_assoc($select_categories)) {
                
                    $cat_id = $row['cat_id'];
                
                    $cat_title = $row['cat_title'];
                
                echo "<tr></tr>";
                echo "<td>{$cat_id}</td>";
                echo "<td>{$cat_title}</td>";
                echo "<tr></tr>";
                

                } ?>
                           
                           
                           
                           
                           
                           
                           
                                                    
                        </tr>
                    </tbody>
                </table>
                    
                    
                </div>  
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/adm_footer.php"; ?>

