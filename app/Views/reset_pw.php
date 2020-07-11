<?= $this->extend('layouts/login_layout') ?>

<?= $this->section('content')?>

    <!--todo -->


    <div class="container col-10 col-sm-8 col-md-6 col-xl-5">
        <div class="forgotPassword">
            <h1 class="my-5 text-center">
                RESET PASSWORD
            </h1>

            <form action="" method="post" class="">

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Enter email: </label>
                    <div class="form-group col-lg-10">
                        <?php if(session()->get('isLoggedIn')&&!set_value('email')):?>
                            <input class="form-control" name="email" value="<?= (session()->get('isLoggedIn')) ? session()->get('student_email') : '' ?>" type="email" placeholder="Your E-mail" disabled>
                        <?php else:?>
                             <input class="form-control" name="email" value="<?= set_value('email')?>" type="email" placeholder="Your E-mail">
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Password: </label>
                    <div class="form-group col-lg-10">
                        <input class="form-control" name="password" type="password" placeholder="Password">
                    </div>
                </div> <!--password row-->

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">New Password: </label>
                    <div class="form-group col-lg-10">
                        <input class="form-control" name="new_password" type="password" placeholder="New Password">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Confirm Password: </label>
                    <div class="form-group col-lg-10">
                        <input class="form-control" name="new_password_confirm" type="password" placeholder="Confirm New Password">
                        <?php if(isset($validation)) : ?>
                            <div class="alert alert-danger mt-2" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>


                <div class="">
                    <div class="form-group text-center">
                        <input class="btn-lg btn-success my-2" type="submit" value="Reset Password">
                        <p class="my-3">Enter your email and type a new password to reset your password.</p>
                    </div>

                </div>
                <?php if(session()->get('isLoggedIn')): ?>
                    <div class="form-group text-center">
                        <a class="form-text text-info text-center" href="/">RETURN TO THE HOMEPAGE</a>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>

    </div>


<?= $this->endSection() ?>