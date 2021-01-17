<!-- dropzone -->
<script type="text/javascript">
  
    Dropzone.autoDiscover = false;
  
    Dropzone.options.imageUpload = {
        maxFilesize:10,
        maxFiles: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif"
    };
      
</script>
<script>
// pusher
// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('bc8dcd0cc5777092288d', {
  cluster: 'ap1'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
//   alert(JSON.stringify(data));
console.log(data);
addData(data);
});
function addData(data){
    var str = '';
    var id = '';
    
    var banyakdata = data.length;
    for(var z in data){
        
        id = data[z].id_tread;
        var l = parseInt(z)+1;
        if(l != 1){
        }else{
            str = '<div><small> <b>'+data[z].nm_user+'</b></small><small> '+data[z].komentar+' </small></div>' 

        }
    }
    // alert(str);
    $('.isikoment'+id).append(str);
    $('.simen'+id).append(str);
    $('#input'+id).val('');
}
</script>
<!-- end pusher -->
<script >
$( "#eksekusi" ).click(function() {
    var posting = $('textarea#postingan').val();
    $.ajax({
        url : '<?= base_url('Home/posting') ?>',
        method : "POST",
        data : {posting:posting},
        datatype : "json",
    });

});
</script>
<script>
$( "#komentari" ).click(function() {
    var isi_komen = $('.isi_komen').val();
    alert('');
    // $.ajax({
    //     url : '<?= base_url('Home/posting') ?>',
    //     method : "POST",
    //     data : {posting:posting},
    //     datatype : "json",
    // });
});
</script>
<script>
$(".btn_post" ).on( "click", function() {
    var id = $(this).attr('idn');
    var tread = $('#input'+id).val();
    // $(this).hide();
    $.ajax({
        url : '<?= base_url('Home/komentar') ?>',
        method : "POST",
        data : {tread:tread,id:id},
        datatype : "JSON",
    });

});
</script>
</body>
</html>