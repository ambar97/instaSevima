<?php $this->load->view('core/header'); ?>
<div class="awalan-fluida">
<div class="row">
    <div class="col-md-8 meneng">
        <img src="<?= base_url().$kontent['img_tread'] ?>" class="img-fluid" alt="">
    </div>
    <div class="col-md-3" style="margin-left: 20px;">
        <div class="card ">
            <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
            <?php $ambil = $this->db->get_where('user',array('id_user'=>$kontent['id_user']))->row_array(); ?>
            <div class="card-header">
                <span><?= $ambil['nm_user'] ?></span> <br>
                <small><?= date('d M Y H:i',strtotime($kontent['timestamp'])) ?></small>
            </div>
            <div class="card-body">
            <!-- <h5 class="card-title">Card title</h5> -->
            <p class="card-text"><?= $kontent['posting'] ?></p>
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            <hr>
            <?php $id_user = $this->session->userdata('id_login');
                                    $cek = $this->db->get_where('like',array('id_tread'=>$kontent['id_tread'],'id_user'=>$id_user))->num_rows();
                                ?>
            <small><a><i class="fa fa-heart like-it <?php if($cek > 0){ echo "like";} ?>" idna="<?= $kontent['id_tread'] ?>" style="margin-right: 10px;"> </i></a>
            <a ><i class="fa fa-comments-o comment"></i></a> 
                </small><br>
            <small id="jmlike<?= $kontent['id_tread'] ?>"><?= $kontent['like'] ?> Menyukai</small>
            </div>
            <div class="card-footer scroll">
            <!-- <small>Komentar sebelumnya</small> -->
            <!-- list komentar -->
            <?php foreach ($komen as $koment) { ?>
                <div><small> <b> <?= $koment['nm_user'] ?></b></small><small> <?= $koment['komentar'] ?> </small></div>
            <?php } ?>
            <div class="simen<?= $kontent['id_tread'] ?>"></div>
            <br>
            <div class="row" >
                <div class="col-9">
                    <input type="text" class="form-control isi_komen" id="input<?= $kontent['id_tread'] ?>" placeholder="komentar disini" style="height: 30px; border: none;">
                </div>
                <div class="col-1">
                    <a type="button" idn="<?= $kontent['id_tread'] ?>" class="btn_post" style="margin-left: -20px; color: gray;">Post</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
        $(document).ready(function(){
            $(".like-it").click(function(){
                var tread_id = $(this).attr('idna');
                $(this).toggleClass("like");
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url('Home/like') ?>",
                    data: {tread_id:tread_id},
                    dataType: "json",
                    success: function(resultData) {
                          $('#jmlike'+tread_id).html(resultData+" menyukai");
                    }
                });
            }); 
        });
    </script>
<?php $this->load->view('core/footer'); ?>