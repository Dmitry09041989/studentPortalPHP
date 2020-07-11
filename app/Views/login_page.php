<?= $this->extend('layouts/login_layout') ?>

<?= $this->section('content') ?>

    <!--todo -->

    <div class="container col-8 col-sm-7 col-md-5 col-xl-4 ">

        <img src="../images/logo-no-bg.png" class="img-fluid h-80 w-80  mb-3 mt-0 " alt=""  >


        <form action="" method="post" class="">

            <div class="form-group row">
                <label class="col-form-label col-lg-3">Login: </label>
                <div class="form-group col-lg-9">
                    <input class="form-control" name="email" value="<?= set_value('email', '')?>" type="email" placeholder="Your E-mail">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-lg-3">Password: </label>
                <div class="form-group col-lg-9">
                    <input class="form-control" name="password" type="password" placeholder="Password">
                    <?php if(isset($validation)) : ?>
                        <div class="alert alert-danger mt-2" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div> <!--password row-->



            <div class="">
                <div class="form-group text-center">
                    <input class="btn-lg btn-success " type="submit" value="Sign in">
                </div>
                <a class="form-text text-muted text-center" href="/login/passwordReset">FORGOT YOUR PASSWORD?</a>
            </div>
        </form>
    </div>


<?= $this->endSection() ?>