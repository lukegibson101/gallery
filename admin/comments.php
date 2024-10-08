<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) { redirect('login.php'); } ?>

<?php

$comments = Comment::find_all();

?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <?php include("includes/top_nav.php"); ?>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php include("includes/side_nav.php"); ?>

        <!-- /.navbar-collapse -->
    </nav>




    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <p class="bg-success"><?= $message ?></p>
                    <h1 class="page-header">
                        Comments
                    </h1>

                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Body</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($comments as $comment): ?>
                                <tr>
                                    <td><?= $comment->id ?></td>
                                    <td>
                                        <?= $comment->author ?>
                                        <div class="actions_links">
                                            <a href="delete_comment.php?id=<?= $comment->id ?>">Delete</a>
                                        </div>
                                    </td>
                                    <td><?= $comment->body ?></td>
                                </tr>
                            <?php endforeach; ?>
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

<?php include("includes/footer.php"); ?>