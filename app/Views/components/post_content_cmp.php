<section class="card">
    <div class="card-header">

        <h2 class="card-title"><?= $content['module_name'] ?> </h2>
        <h5 class="card-subtitle"><?= $content['module_description'] ?> </h5>
    </div>
    <div class="card-body">
        <p class="card-text ">
            <?= $content['module_content']?>
    </div>
    <div class="card-footer">
        <a href="#" class="card-link">Open in WILDE</a>
        <a href="/portal/grades?term=<?= $content['module_level'] ?>" class="card-link">Go to Grades</a>
    </div>
</section>

