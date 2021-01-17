<?php $this->load->view('core/header')?>
<div class="container awalan-akun">
    
    <div class="card mb-4">
    <form method="POST" action="<?= base_url('Profile/update') ?>">
    <div class="card-header">
        <div class="row">
            <div class="col-10"><span>Ubah Data Profile</span></div>
            <div class="col-2"><button type="submit" class="btn btn-primary btn-sm float-right">PERBARUI</button></div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid" >
            
            <div class="form-group">
                <label for="exampleInputnm">Nama Lengkap</label>
                <input type="text" name="nm_lengkap" class="form-control" value="<?= $profile['nm_user'] ?>" id="exampleInputnm" aria-describedby="emailHelp" placeholder="Enter email">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $profile['email'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="inputpasw">No Telp</label>
                <input type="text" name="notelp" class="form-control" value="<?= $profile['phone_number'] ?>" id="inputpasw" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea name="bio" id="" cols="30" rows="5" class="form-control"><?= $profile['tentang'] ?></textarea>
            </div>
            <hr>
            <b><span>Data Login</span></b><hr>
            <div class="form-group">
                <label for="inputusername">Username</label>
                <input type="text" name="username" class="form-control" value="<?= $profile['username'] ?>" id="inputusername" aria-describedby="emailHelp" placeholder="Enter email">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="row">
                <div class="col-md-10">
                    <label class="form-check-label" for="exampleCheck1">Password</label>
                    <input type="password" value="********" disabled class="form-control" id="exampleCheck1">
                </div>
                <div class="col-md-2">
                    <label for=""></label><br>
                    <a href="">Ubah Password</a>
                </div>
            </div>
            <br>
        </div>
    </div>
    </form>
    </div>
    <div class="card mb-5">
        <div class="card-body">
            <form action="<?= base_url('Profile/update_foto') ?>" method="post" enctype="multipart/form-data">
                <input type="file" name="ght" accept="image/*" class="form-control"><br><br>
                <button class="btn btn-primary btn-sm float-right">Perbarui Foto Profile</button>
            </form>
        </div>

    </div>
</div>
<?php $this->load->view('core/footer')?>