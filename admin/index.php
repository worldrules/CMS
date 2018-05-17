<?php include "includes/adm_header.php" ?>





<div id="wrapper">


        <!-- Navigation -->


    <?php include "includes/adm_navigation.php" ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">


                        <h1 class="page-header">
                            Welcome to Admin
<!-- Isso náo era pra estar aqui mais fodace .-->
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>


                    </div>
                </div>

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

<?php
//Seleciona a quantidade de postagens que tem no site--------------------------------------//

$query = "SELECT * FROM posts";

$select_all_post = mysqli_query($con, $query);
$post_count = mysqli_num_rows($select_all_post);

echo "<div class='huge'>{$post_count}</div>";

?>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

<?php
//Seleciona a quantidade de comentarios que tem no site--------------------------------------//
$query = "SELECT * FROM comments";

$select_all_comments = mysqli_query($con, $query);
$comment_count = mysqli_num_rows($select_all_comments);

echo "<div class='huge'>{$comment_count}</div>"
?>


                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">


<?php
//Seleciona a quantidade de usuários que tem no site--------------------------------------//
$query = "SELECT * FROM users";

$select_all_users = mysqli_query($con, $query);
$users_count = mysqli_num_rows($select_all_users);

echo "<div class='huge'>{$users_count}</div>"
?>

                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

<?php
//Seleciona a quantidade de categorias que tem no site--------------------------------------//
$query = "SELECT * FROM categories";

$select_all_categories = mysqli_query($con, $query);
$category_count = mysqli_num_rows($select_all_categories);

echo "<div class='huge'>{$category_count}</div>"
?>

                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <?php
//seleciona só os posts drafts e conta numero de linhas--------------------------------------------------------------/
                $query = "SELECT * FROM posts WHERE post_status = 'draft' ";

                $select_all_draft_posts = mysqli_query($con, $query);
                $post_draft_count = mysqli_num_rows($select_all_draft_posts);

//seleciona só os posts drafts e conta numero de linhas--------------------------------------------------------------/
                $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";


                $unapproved_comments_query = mysqli_query($con, $query);
                $unapproved_comment_count = mysqli_num_rows($unapproved_comments_query);


//seleciona só os posts drafts e conta numero de linhas--------------------------------------------------------------/
                $query = "SELECT * FROM users WHERE user_role = 'Subscriber' ";

                $select_all_subscribers = mysqli_query($con, $query);
                $subscriber_count = mysqli_num_rows($select_all_subscribers);


                ?>








                <div class="row">

                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data', 'count'],

                <?php

// Cria duas variaveis que sao arrays, uma com os indices outra com os counts
// Loop , pega cada elemento do array em cada passada do loop , tanto num indice quanto no outro e coloca dentro do array principal
                    $element_text = ['Active Posts','Draft Posts','Comments','Pending Comments','Users','Subscribers','Categories'];
                    $element_count = [$post_count,$post_draft_count,$comment_count,$unapproved_comment_count,$users_count,$subscriber_count,$category_count];

                    for($i = 0; $i < 7; $i++){

                        echo "['{$element_text[$i]}' " . "," . "{$element_count[$i]}],";

                    }

                ?>



                                // ['Posts ', 1000],

                            ]);

                            var options = {
                                chart: {
                                    title: '',
                                    subtitle: '',
                                }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>

                    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>



                </div>

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/adm_footer.php" ?>
