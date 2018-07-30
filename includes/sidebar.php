<?php

//        checkIfUserIsLoggedInAndRedirect('cmsheroku/admin');



        if(ifItIsMethod('post')) {


            if (isset($_POST['login'])) {

                if (isset($_POST['username']) && isset($_POST['password'])) {


                    login_user($_POST['username'], $_POST['password']);


                } else {


                    redirect('/cmsheroku/index.php');

                }


            }

        }


?>





        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">


            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <form action="search.php" method="post">
                <div class="input-group">
                    <input name="search" type="text" class="form-control">
                    <span class="input-group-btn">
                        <button name="submit" class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </button>
                    </span>
                </div>
                </form><!-- Search Form -->       
                <!-- /.input-group -->
                </div>


            <!-- Login -->
            <div class="well">

                <?php if(isset($_SESSION['user_role'])):?>

                <h4>Logged in as <?php echo $_SESSION['username']?></h4>
                    <a href="includes/logout.php" class="btn btn-primary">Logout</a>


                <?php else:?>

                <h4>Login</h4>
                    <form action="" method="post">
                        <div class="form-group">
                            <input name="username" type="text" class="form-control" placeholder="Enter Username">
                            <span class="input-group-btn">
                        </div>

                        <div class="input-group">
                            <input name="password" type="password" class="form-control" placeholder="Enter Password">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" name="login" type="submit">Submit</button>

                            </div>
                        <div class="form-group"></div>
                        <a href="forgot.php?forgot=<?php echo uniqid(true); ?>">Forgot Password</a>
                        </form><!-- Search Form -->
                        <!-- /.input-group -->
                    </div>


                <?php endif;  ?>





                    <!-- Blog Categories Well -->
        <div class="well">

            <?php


            $query = "SELECT * FROM categories "; // LIMIT 3 PODE COLOCAR LIMITE NA ROW
            $select_categories_sidebar = mysqli_query($con, $query);


            ?>         <h4>Blog Categories</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-unstyled">
                                   <?php 
                               
                                   
        while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];

        echo "<li><a href='/CMSHeroku/category/$cat_id'>{$cat_title}</a></li>";

        }
                                    ?>
                                        
                                </ul>
                            </div>
                            
                            
                            
                          
                        </div>
                        
                        <!-- /.row -->
                    </div>

                   
                    <!-- Side Widget Well -->
                    <?php  include "widget.php" ?>



                </div>
