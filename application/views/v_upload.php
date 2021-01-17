
    <?php $this->load->view('core/header'); ?>
    <div class="container awalan" >
        <section>
        <div class="container">
            <form action="<?= base_url('Upload/kontent') ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6"><br>
                    <label for="">Image</label>
                    <div class="center">
                        <div class="form-input">
                        <div class="preview">
                            <img id="file-ip-1-preview">
                        </div>
                        <label for="file-ip-1">Upload Photo</label>
                        <input type="file" name="ght" id="file-ip-1" accept="image/*" onchange="showPriview(event)">
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6">
                <div class="caption">
                        <label for="">Caption</label>
                        <textarea name="caption" id="" cols="30" class="form-control" rows="10"></textarea>
                        <button type="submit" class="btn btn-primary float-right btn-sm mt-2" >Post Now</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
        </section>
    </div>
    <script>
        $('.caption').hide();
  function showPriview(event){
      if(event.target.files.length > 0){
          var src = URL.createObjectURL(event.target.files[0]);
          var preview = document.getElementById('file-ip-1-preview');
          preview.src = src;
          preview.style.display = "block"
          $('.caption').show();
      }
  }
  </script>
    <?php $this->load->view('core/footer'); ?>