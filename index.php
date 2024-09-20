<?php include("includes/header.php"); ?>

<?php

$page = $_GET['page'] ?? 1;
$page = (int)$page;

$items_per_page = 2;

$items_total_count = Photo::count_all();

$photos = Photo::find_all();

?>

<div class="row">
    <div class="col-md-12">
        <div class="thumbnails row">
            <?php foreach($photos as $photo): ?>
                <div class="col-xs-6 col-md-3">
                    <a class="thumbnail" href="photo.php?id=<?= $photo->id ?>">
                        <img class="home-page-picture img-responsive" src="admin/<?= $photo->picture_path(); ?>" alt="">
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- /.row -->

<?php include("includes/footer.php"); ?>
