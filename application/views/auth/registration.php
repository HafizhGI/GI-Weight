<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<body style="background: url('<?= base_url('assets/img/PT. Globalindo Intimates.jpg'); ?>') no-repeat center center fixed; background-size: cover;">

    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">

        <div class="col-lg-7">
            <div class="card o-hidden border-0 shadow-lg my-5" style="max-width: 450px; width: 100%;">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="p-5">
                        <div class="text-center">
                            <img src="<?= base_url('assets/img/logo-globalindo.png'); ?>" alt="Login" style="max-width: 300px; margin-bottom: 20px;">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>

                        <?= $this->session->flashdata('message'); ?>
                        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name"
                                    placeholder="Full name" value="<?= set_value('name'); ?>">
                                <?= form_error('name', '<small class="text-danger mt-1 pl-3 d-block text-left">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <!-- Password -->
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="togglePassword1" style="border-radius: 0 50px 50px 0;">
                                                    <i class="bi bi-eye" id="icon-eye1"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <?= form_error('password1', '<small class="text-danger pl-3 d-block text-left">', '</small>'); ?>
                                    </div>

                                    <!-- Repeat Password -->
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="togglePassword2" style="border-radius: 0 50px 50px 0;">
                                                    <i class="bi bi-eye" id="icon-eye2"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <?= form_error('password2', '<small class="text-danger pl-3 d-block text-left">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register Account
                                        </button>
                                    </div>

                                </div>
                            </div>

                        </form>

                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?php echo site_url('Auth/index') ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword1 = document.querySelector('#togglePassword1');
        const password1 = document.querySelector('#password1');
        const iconEye1 = document.querySelector('#icon-eye1');

        togglePassword1.addEventListener('click', function() {
            const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
            password1.setAttribute('type', type);
            iconEye1.classList.toggle('bi-eye');
            iconEye1.classList.toggle('bi-eye-slash');
        });

        const togglePassword2 = document.querySelector('#togglePassword2');
        const password2 = document.querySelector('#password2');
        const iconEye2 = document.querySelector('#icon-eye2');

        togglePassword2.addEventListener('click', function() {
            const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
            password2.setAttribute('type', type);
            iconEye2.classList.toggle('bi-eye');
            iconEye2.classList.toggle('bi-eye-slash');
        });
    </script>

</body>