<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>







<!--todo -->

    <div id="mainContent" class="grades__main__container container-fluid">

<!--Selected Year: 2019/2020 Term-->

        <div class="grades__header">
            <h3><a href="?term=<?= $prev ?>">&lt</a> Selected Year: <?= $year['term_year'] ?> Term <?= $_GET['term'] ?> <a href="?term=<?= $next ?>">&gt</a></h3>
        </div>
        <div class="table__container container-fluid">

            <table class="table table-borderless grades__table">
                <tr class="table-info">
                    <th>Module Code</th>
                    <th>Module Title</th>
                    <th>Grade</th>
                    <th>Credits</th>
                </tr>
                <tr>

                    <?php
                    foreach ($grades as $grade):

                                echo view_cell('\App\Libraries\Portal::postGrades', ['content' => $grade]);

                    endforeach;?>
            </table>

        </div>

    </div>

<?= $this->endSection() ?>