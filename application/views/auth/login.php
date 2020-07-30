<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form action="<?= base_url('login') ?>" method="post">
                <div class="login-form-head">
                    <h4>Login</h4>
                    <p>Silahkan Login Terlebih Dahulu</p>
                </div>
                <div class="login-form-body">
                <?php if (!empty($this->session->flashdata('error'))) : ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
                <?php endif ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $input->username ?>">
                        <?= form_error('username', '<p class="text-danger">', '</p>');?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                            </div>
                        </div>
                        
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                       
                    </div>
                    <div class="form-footer text-center mt-5">
                        <!-- <p class="text-muted">Don't have an account? <a href="register.html">Sign up</a></p> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>