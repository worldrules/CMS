<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                   <?php
                   
                    if(isset($_POST['submit'])) {
                        
                    $search = $_POST['search'];
                    
                    
                    $query = "SELECT * FROM posts WHERE posts_tags LIKE '%$search%'";
                    $search_query = mysqli_query($con, $query);
                    
                    if(!$search_query) {
                        die("QUERY FAILED" . mysqli_error($con));
                    }    
                    
                    $count = mysqli_num_rows($search_query);
                        
                        if($count == 0) {
                            
                          
                            echo "<h1> NO RESULT</h1>";
                            
                        } else {
                            
                            echo "<h1>SOME RESULT</h1>";
                        }
                        
                    }
                   
                   
                                      
                   ?>
                 
                    <h4>Blog Search</h4>
                    <div class="input-group">
                       <form action="" method="post">
                       <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name= "submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                        </form>

                    <!-- /.input-group -->
                </div>

               
               
               
               
               
               
               
               
               
               
               
               
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
              