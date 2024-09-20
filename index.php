<?php include("includes/header.php"); ?>

<?php

$page = $_GET['page'] ?? 1;
$page = (int)$page;

$items_per_page = 2;

$items_total_count = Photo::count_all();

$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM photos ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";

$photos = Photo::find_by_query($sql);



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

        <div class="row">
            <ul class="pagination">

                <?php if ($paginate->page_total() > 1): ?>
                    <?php if ($paginate->has_previous()): ?>
                        <li class="previous">
                            <a href="index.php?page=<?= $paginate->previous() ?>">
                                <<
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php for ($i=1; $i <= $paginate->page_total(); $i++) : ?>
                        <?php if ($i == $paginate->current_page): ?>
                            <li class="active"><a href="index.php?page=<?= $i ?>"><?= $i ?></a></li>
                        <?php else: ?>
                            <li><a href="index.php?page=<?= $i ?>"><?= $i ?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ($paginate->has_next()): ?>
                        <li class="next">
                            <a href="index.php?page=<?= $paginate->next() ?>">
                                >>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>


            </ul>
        </div>
    </div>
</div>
<!-- /.row -->

<?php include("includes/footer.php"); ?>
