<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>


            <?php
//            $user = new User();
//            $user->username = "gibbo the second";
//            $user->password = "123";
//            $user->first_name = 'Luke';
//            $user->last_name = 'Gibson';
//
//            $user->create()

//            $user = User::find_user_by_id(1);
//            $user->last_name = "Williams";
//
//            $user->update();

            $user = User::find_user_by_id(4);
            $user->delete();
            ?>

            <ul class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ul>
        </div>
    </div>
    <!-- /.row -->

</div>