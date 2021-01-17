
    <?php $this->load->view('core/header'); ?>
    <div class="container awalan">
        <section>
            <div class="row">
                <div class="col-md-1">
                    <div></div>
                </div>
                <div class="col-md-7 m-auto">
                    <br>
                    <div id="posting" class="postinganku">
                        <?php foreach ($tread as $data) { ?>
                            <div class="card" style="padding: 15px; margin-bottom: 10px;" id="<?= $data['id_tread'] ?>">
                                <?php $ambil = $this->db->get_where('user',array('id_user'=>$data['id_user']))->row_array(); ?>
                                <div class="card-header">
                                    <span><?= $ambil['nm_user'] ?></span> <br>
                                    <small><?= date('d M Y H:i',strtotime($data['timestamp'])) ?></small>
                                </div>
                                <img src="<?= base_url().$data['img_tread'] ?>" alt="" class="img-fluid">
                                <p class="mt-2"><?= $data['posting'] ?></p>
                                <input type="hidden" value="<?= $data['id_tread'] ?>">
                                <small>
                                <?php $id_user = $this->session->userdata('id_login');
                                    $cek = $this->db->get_where('like',array('id_tread'=>$data['id_tread'],'id_user'=>$id_user))->num_rows();
                                ?>
                                <a><i class="fa fa-heart like-it <?php if($cek > 0){ echo "like";} ?>" idna="<?= $data['id_tread'] ?>" style="margin-right: 10px;"> </i></a>
                                <a href="<?= base_url('Detail/posting/'.$data['id_tread']) ?>" style="color: black;"><i class="fa fa-comment comment"></i></a> 
                                  </small>
                                <small id="jml_like<?= $data['id_tread'] ?>"><?= $data['like'] ?> Menyukai</small>
                                <hr>
                                <!-- isi komentar -->
                                <?php $get_ = $this->M_insta->komentar($data['id_tread'])->result_array(); 
                                ?>
                                    <?php foreach ($get_ as $koment) { ?>
                                        <div><small> <b> <?= $koment['nm_user'] ?></b></small><small> <?= $koment['komentar'] ?> </small></div>
                                    <?php } ?>
                                <div class="isikoment<?= $data['id_tread'] ?>"></div>
                                <div class="float-right">
                                <?php if(count($get_) != 0 ){ ?>
                                    <a href="<?= base_url('Detail/posting/'.$data['id_tread']) ?>" class="float-right" style="color: gray;"><small>Lihat semua komentar ..</small></a>
                                <?php } ?>
                                </div>
                                <!-- end isi komentar -->
                                <hr>
                                <small>Komentar</small>
                                <div class="row">
                                    <div class="col-11">
                                        <input type="text" style="border:none; font-size: 12px;" class="form-control isi_komen" id="input<?= $data['id_tread'] ?>" placeholder="Add a comment .." style="height: 30px;">
                                    </div>
                                    <div class="col-1">
                                        <a type="button" idn="<?= $data['id_tread'] ?>" class="btn_post" style="margin-left: -20px; color: gray;">Post</a>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </div>
                <div class="col-md-3 upload">
                <br>
                <div id="pesan" class="card fixed-bottom float-right ngawang" >
                        <span></span>
                        <a href="<?= base_url('Upload') ?>" class="btn btn-primary"> BUAT KONTENT</a>
                        <!-- <small>Tulikan Sesuatu yang kamu rasakan</small>
                        <textarea name="" id="postingan" cols="20" rows="4" class="form-control"></textarea>
                        <div style="margin-top: 7px;">
                            <button class="btn btn-primary btn-sm float-right" id="eksekusi">POST</button>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
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
                          $('#jml_like'+tread_id).html(resultData+" menyukai");
                    }
                });
            }); 
        });
    </script>
    <?php $this->load->view('core/footer'); ?>