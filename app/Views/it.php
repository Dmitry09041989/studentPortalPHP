<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>


    <!--todo -->

    <div class="it w-75 ">
        <div id="" class="it-container">

            <section class="card mt-0">

                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" value="<?= session()->get('student_email') ?>" name="sender_email" placeholder="name@example.com" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Issues</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="issue_type">
                                <option>Network</option>
                                <option>Laptop</option>
                                <option>Passwords</option>
                                <option>Access</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Message</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="issue_description" rows="3"><?= set_value('issue_description', '')?></textarea>
                        </div>
                        <?php if(session()->getFlashdata()) : ?>
                            <div class="alert alert-success m-2" role="alert">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>
                        <?php if(isset($validation)) : ?>
                            <div class="alert alert-danger m-2" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </section>
        </div>
    </div>


<?= $this->endSection() ?>