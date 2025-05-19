<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<body
    style="background: url('<?= base_url('assets/img/PT. Globalindo Intimates.jpg'); ?>') no-repeat center center fixed; background-size: cover;">

    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5"
                style="max-width: 450px; width: 100%; border-radius: 15px;">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="p-5">
                        <div class="text-center">
                            <img src="<?= base_url('assets/img/logo-globalindo.png'); ?>" alt="Login"
                                style="max-width: 300px; margin-bottom: 20px;">
                            <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                        </div>
                        <div class="container" style="text-align:center;">

                            <?= $this->session->flashdata('message'); ?>

                            <form class="user" method="post" action="<?= site_url('Auth/login'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="name"
                                        placeholder="Enter Name...">
                                    <?= form_error('name', '<small class="text-danger mt-1 pl-3 d-block text-left">', '</small>'); ?>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control form-control-user" id="password"
                                        name="password" placeholder="Password">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword"
                                            style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                            <i class="bi bi-eye" id="icon-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <?= form_error('password', '<small class="text-danger mt-1 pl-3 d-block text-left">', '</small>'); ?>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>

                            <hr>

                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= site_url('auth/registration'); ?>">Create an Account!</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const iconEye = document.querySelector('#icon-eye');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Ganti icon
            if (type === 'password') {
                iconEye.classList.remove('bi-eye-slash');
                iconEye.classList.add('bi-eye');
            } else {
                iconEye.classList.remove('bi-eye');
                iconEye.classList.add('bi-eye-slash');
            }
        });
    </script>

</body>