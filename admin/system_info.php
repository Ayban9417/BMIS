<?php
require_once("../DBConnection.php");
if(isset($_GET['id'])){
$qry = mysqli_query($conn,"SELECT * FROM `system_infos` where id = '{$_GET['id']}'");
    foreach(mysqli_fetch_array( $qry ) as $k => $v){
        $$k = $v;
    }
}
?>

<style>
    #logo-img{
        width:100px;
        height:100px;
        object-fit:scale-down;
        background : var(--bs-light);
        object-position:center center;
        border:1px solid var(--bs-dark);
        border-radius:50% 50%;
    }
</style>
<div class="container py-3">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Barangay and System Information Management
            </h3>
        </div>
        <div class="card-body">
            <form action="" id="sys-info" name="sys-info">
            <input type="hidden" name="id" value="1">
                <div class="form-group">
                    <label for="baranggay" class="control-label">Baranggay Name</label>
                    <input type="text" name="baranggay" class="form-control form-control-sm rounded-0" value="<?php echo isset($baranggay) ? $baranggay : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="city" class="control-label">City/Municipality</label>
                    <input type="text" name="city" class="form-control form-control-sm rounded-0" value="<?php echo isset($city) ? $city : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="province" class="control-label">Province</label>
                    <input type="text" name="province" class="form-control form-control-sm rounded-0" value="<?php echo isset($province) ? $province : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="code" class="control-label">Zip Code</label>
                    <input type="text" name="code" class="form-control form-control-sm rounded-0" value="<?php echo isset($code) ? $code : '' ?>" required>
                </div>
                <!-- <div class="form-group">
                    <label for="logo" class="control-label">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control form-control-sm rounded-0" accept="image/png,image/jpeg" onclick="display_img(this)">
                </div> -->
                <div class="form-group text-center mt-2">
                    <img src="../uploads/VIOLETA.png" id="logo-img" alt="Barangay Logo">
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <button class="btn btn-sm btn-primary rounded-0" type="submit" form="sys-info">Save</button>
            <button class="btn btn-sm btn-dark rounded-0" type="reset" form="sys-info">Reset</button>
        </div>
    </div>
</div>
<script>


    $(function(){
        $('#sys-info').submit(function(e){
            e.preventDefault();
            $('.pop_msg').remove()
            var _this = $(this)
            var _el = $('<div>')
                _el.addClass('pop_msg')
            $('.card button').attr('disabled',true)
            $('.card button[type="submit"]').text('saving data...')
            $.ajax({
                url:'./../Actions.php?a=system',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                error:err=>{
                    console.log(err)
                    _el.addClass('alert alert-danger')
                    _el.text("An error occurred.")
                    _this.prepend(_el)
                    _el.show('slow')
                     $('.card button').attr('disabled',false)
                     $('.card button[type="submit"]').text('Save')
                },
                success:function(resp){
                    if(resp.status == 'success'){
                            location.reload()
                    }else{
                        _el.addClass('alert alert-danger')
                    }
                    _el.text(resp.msg)

                    _el.hide()
                    _this.prepend(_el)
                    _el.show('slow')
                     $('.card button').attr('disabled',false)
                     $('.card button[type="submit"]').text('Save')
                }
            })
        })
    })
</script>