<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a><b>App </b>Perpus</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('auth') ?>" method="post" class="user">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?= set_value('email'); ?>">
                    <small class="text-danger"><?= form_error('email') ?></small>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                    <small class="text-danger"><?= form_error('password') ?></small>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->