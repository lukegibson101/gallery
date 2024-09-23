<?php include("includes/header.php"); ?>
<?php include("includes/photo_library_modal.php"); ?>

<?php if(!$session->is_signed_in()) { redirect('login.php'); } ?>

<?php

if(empty($_GET['id'])) {

    redirect("users.php");

}

?>

<?php

$user = User::find_by_id($_GET['id']);

if(isset($_POST['update'])) {
    if($user) {
        $user->username = $_POST['username'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];

        if (!empty($_POST['password'])) {
            $user->password = $_POST['password'];
        }

        if(!empty($_FILES['user_image'])) {
            $user->set_file($_FILES['user_image']);
            $user->upload_photo();
        }
        $user->save();
        redirect("edit_user.php?id={$user->id}");
    }
}

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
                    <h1 class="page-header">
                        Edit User
                    </h1>
                    
                    <div class="col-md-6">
                        <a href="#" data-toggle="modal" data-target="#photo-library">
                            <img class="img-responsive" src="<?= $user->image_path_and_placeholder() ?>" alt="User image">
                        </a>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="file" name="user_image">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?= $user->username ?>">
                            </div>

                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="<?= $user->first_name ?>">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="<?= $user->last_name ?>">
                            </div>

                            <div class="form-group">
                                <label for="password">New Password <small>(Leave blank to keep old password)</small></label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <a class="btn btn-danger" href="delete_user.php?id=<?= $user->id ?>">Delete</a>
                                <input type="submit" name="update" class="btn btn-primary pull-right" value="Update">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>