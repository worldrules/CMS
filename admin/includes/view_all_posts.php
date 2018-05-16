<?php
/**
 * Created by PhpStorm.
 * User: Leonardo
 * Date: 07/05/2018
 * Time: 03:54
 */
?>

<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>

    <?php

    $query = "SELECT * FROM posts "; // LIMIT 3 PODE COLOCAR LIMITE NA ROW
    $select_posts = mysqli_query($con, $query);

    while($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $posts_tags = $row['posts_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];

        echo "<tr>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_title}</td>";


            $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}  "; // LIMIT 3 PODE COLOCAR LIMITE NA ROW
            $select_categories_id = mysqli_query($con, $query);

            while($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

                echo "<td>{$cat_title}</td>";
                echo "<td>{$cat_title}</td>";
            }

        echo "<td>{$post_status}</td>";
        echo "<td><img width='100' src='../images/$post_image'alt='Image'></td>";
        echo "<td>{$posts_tags}</td>";
        echo "<td>{$post_comment_count}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "</tr>";



    }


    ?>




<!--    <td>10</td>-->
<!--    <td>Bootstrap</td>-->
<!--    <td>Status</td>-->
<!--    <td>Image</td>-->
<!--    <td>Tags</td>-->
<!--    <td>Comments</td>-->
<!--    <td>Date</td>-->
<!--    <td>Leonardo Nunes Carvalho</td>-->
<!--    <td>Dev</td>-->





    </tbody>
</table>


<?php

if(isset($_GET['delete'])) {


    $the_post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
    $delete_query = mysqli_query($con, $query);
    header("Location: posts.php");
}

?>

