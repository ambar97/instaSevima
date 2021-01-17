<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>style_login.css">
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Daftar Akun Baru</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?= base_url('Register/daftar') ?>" method="post">
                            <h3 class="text-center text-info">Ambaraif</h3>
                            <div class="form-group">
                                <label for="nama" class="text-info">Nama Lengkap</label><br>
                                <input type="text" name="nama" required id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email</label><br>
                                <input type="email" name="email" id="email" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="notelp" class="text-info">No Telp</label><br>
                                <input type="text" name="notelp" id="notelp" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Username</label><br>
                                <input type="text" name="username" id="username" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password</label><br>
                                <input type="password" name="password" id="password" required class="form-control">
                            </div>
                            <div class="form-group float-right">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Daftar">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
