<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>

    <!--todo -->

    <div id="mainContent" class="container-fluid d-flex flex-col mt-4">



        <section class="card col-12">
            <div class="card-header mt-3">
                <h2 class="card-title"> <?= $content['tutor_first_name'].' '.$content['tutor_surname'] ?> </h2>
                <h5 class="card-subtitle">Your allocated tutor</h5>

            </div>
            <div class="card-body">
                <?php if(isset($content)): ?>

                    <img class = "w-50 h-50 float-left p-3" src="<?=$content['tutor_image_url'] ?>">

                <?php else:?>
                    <img class = "w-50 h-50 float-left p-3" src="../green.png">
                <?php endif;?>
                <p class="card-text mt-3">
                    <?= $content['tutor_about'] ?>
                </p>
            </div>
            <div class="card-footer mb-3">
                <a href="#" class="card-link"><?= $content['tutor_email'] ?></a>

            </div>
        </section>

    </div>


<?= $this->endSection() ?>


