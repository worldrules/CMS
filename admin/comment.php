<?php
/**
 * Created by PhpStorm.
 * User: Leonardo
 * Date: 06/05/2018
 * Time: 15:46
 */
?>



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
                        CMS
                        <small>Comments</small>
                    </h1>

                    <table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response to</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>


    </tr>
    </thead>
    <tbody>

    <?php
//seleciona comments aonde post id pega mais a conexao , junto com get de ID

    //$query = "SELECT * FROM comments WHERE comment_post_id =" . mysqli_real_escape_string($con, $_GET['id']. "");
    $query = "SELECT * FROM comments WHERE comment_post_id =" . mysqli_real_escape_string($con,$_GET['id']). " ";
    $select_comments = mysqli_query($con, $query);

    while($row = mysqli_fetch_assoc($select_comments)) {
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_email = $row['comment_email'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];


        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";

//
//        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}  "; // LIMIT 3 PODE COLOCAR LIMITE NA ROW
//        $select_categories_id = mysqli_query($con, $query);
//
//        while($row = mysqli_fetch_assoc($select_categories_id)) {
//            $cat_id = $row['cat_id'];
//            $cat_title = $row['cat_title'];
//
//            echo "<td>{$cat_title}</td>";
//        }

        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_status}</td>";

        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
        $select_post_id_query = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($select_post_id_query)) {

            $post_id = $row['post_id'];
            $post_title = $row['post_title'];

            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

        }





        echo "<td>{$comment_date}</td>";


        echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
        echo "<td><a href='comment.php?delete=$comment_id&id=" . $_GET['id'] ."'>Delete</a></td>";
        echo "</tr>";



    }


    ?>




    </tbody>
</table>



<?php
// query para aprovar um comentario e fazer update
if(isset($_GET['approve'])) {

    $the_comment_id = $_GET['approve'];

    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = '$the_comment_id' ";
    $approve_comment_query = mysqli_query($con, $query);
    header("Location: comments.php");
}


//------------------------------------------------------------------------------------------------------------------//
// query para nao aprovar um comentario e fazer update
if(isset($_GET['unapprove'])) {


    $the_comment_id = $_GET['unapprove'];

    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = '$the_comment_id' ";
    $unapprove_comment_query = mysqli_query($con, $query);
    header("Location: comments.php");
}



//------------------------------------------------------------------------------------------------------------------//
// query para deletar um comentario

if(isset($_GET['delete'])) {


    $the_comment_id = $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
    $delete_query = mysqli_query($con, $query);
    header("Location: comment.php?id=".$_GET['id']."");
}

?>


</div>
<!-- /.row -->

<hr>

<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">


            <?php include "includes/adm_footer.php"; ?>
