<?php
require_once("../DBConnection.php");
if(isset($_GET['id'])){
$qry = mysqli_query($conn,"SELECT * FROM `vaccine_list` where vaccine_id = '{$_GET['id']}'");
    foreach(mysqli_fetch_array( $qry ) as $k => $v){
        $$k = $v;
    }
}
?>
<div class="container-fluid">
    <form action="" id="vaccine-form">
        <input type="hidden" name="id" value="<?php echo isset($vaccine_id) ? $vaccine_id : '' ?>">
        <div class="form-group">
            <label for="vaccine" class="control-label">Vaccine</label>
            <input type="text" autofocus name="vaccine" id="vaccine" required class="form-control form-control-sm rounded-0" value="<?php echo isset($vaccine) ? $vaccine : '' ?>">
        </div>
    </form>
</div>

<script>
    $(function(){
        $('#vaccine-form').submit(function(e){
            e.preventDefault();
            $('.pop_msg').remove()
            var _this = $(this)
            var _el = $('<div>')
                _el.addClass('pop_msg')
            $('#uni_modal button').attr('disabled',true)
            $('#uni_modal button[type="submit"]').text('submitting form...')
            $.ajax({
                url:'./../Actions.php?a=save_vaccine',
                method:'POST',
                data:$(this).serialize(),
                dataType:'JSON',
                error:err=>{
                    console.log(err)
                    _el.addClass('alert alert-danger')
                    _el.text("An error occurred.")
                    _this.prepend(_el)
                    _el.show('slow')
                     $('#uni_modal button').attr('disabled',false)
                     $('#uni_modal button[type="submit"]').text('Save')
                },
                success:function(resp){
                    if(resp.status == 'success'){
                        _el.addClass('alert alert-success')
                        $('#uni_modal').on('hide.bs.modal',function(){
                            location.reload()
                        })
                        if("<?php echo isset($purok_id) ?>" != 1)
                        _this.get(0).reset();
                    }else{
                        _el.addClass('alert alert-danger')
                    }
                    _el.text(resp.msg)

                    _el.hide()
                    _this.prepend(_el)
                    _el.show('slow')
                     $('#uni_modal button').attr('disabled',false)
                     $('#uni_modal button[type="submit"]').text('Save')
                }
            })
        })
    })
</script>