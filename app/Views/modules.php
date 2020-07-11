<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>

<div id="mainContent" class="container-fluid mt-4 px-2">



    <?php foreach ($contentData as $data) : ?>

        <?= view_cell('\App\Libraries\Portal::postContent', ['content' => $data]) ?>

    <?php endforeach; ?>

</div>

<?= $this->endSection() ?>