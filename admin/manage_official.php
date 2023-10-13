<?php
require_once("./../DBConnection.php");
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM `official_list` where official_id = '{$_GET['id']}'");
    foreach(mysqli_fetch_array($qry) as $k => $v){
        $$k = $v;
    }
}
?>
<style>
  .form-div { margin-top: 100px; border: 1px solid #e0e0e0; }
#profileDisplay { display: block; height: 210px; width: 60%; margin: 0px auto; border-radius: 50%; }
.img-placeholder {
  width: 60%;
  color: white;
  height: 100%;
  background: black;
  opacity: .7;
  height: 210px;
  border-radius: 50%;
  z-index: 2;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  display: none;
}
.img-placeholder h4 {
  margin-top: 40%;
  color: white;
}
.img-div:hover .img-placeholder {
  display: block;
  cursor: pointer;
}
</style>



<div class="container-fluid">
    <form action="" id="official-form">
        <input type="hidden" name="id" value="<?php echo isset($official_id) ? $official_id : '' ?>">
        <div class="form-group row">
            <div class="col-md-4">
                <label for="lastname" class="control-label">Last Name</label>
                <input type="text" name="lastname" id="lastname" class="form-control form-control-sm rounded-0" value="<?php echo isset($lastname) ? $lastname : '' ?>" required>
            </div>
            <div class="col-md-4">
                <label for="firstname" class="control-label">Firstname</label>
                <input type="text" name="firstname" id="firstname" class="form-control form-control-sm rounded-0" value="<?php echo isset($firstname) ? $firstname : '' ?>" required>
            </div>
            <div class="col-md-4">
                <label for="middlename" class="control-label">Middlename</label>
                <input type="text" name="middlename" id="middlename" class="form-control form-control-sm rounded-0" value="<?php echo isset($middlename) ? $middlename : '' ?>" placeholder="(optional)">
            </div>
        </div>
        <div class="form-group">
            <label for="contact" class="control-label">Contact #</label>
            <input type="text" pattern="[0-9]+" name="contact" id="contact" class="form-control form-control-sm rounded-0 col-md-6" value="<?php echo isset($contact) ? $contact : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="position_id" class="control-label">Position</label>
            <select name="position_id" id="position_id" class="form-select form-select-sm rounded-0 select2">
                <option value="" disabled <?php echo !isset($position_id) ? 'selected' : '' ?>></option>
                <?php 
                $position = $conn->query("SELECT * FROM position_list");
                while($row =mysqli_fetch_array( $position )):
                ?>
                <option value="<?php echo $row['position_id'] ?>" <?php echo isset($position_id) && $position_id == $row['position_id'] ? 'selected' : "" ?>><?php echo $row['position'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <!-- <div class="form-group">
        <label for="Photo" class="control-label">Photo</label>
        <input type="file" class="form-control form-control-sm rounded-0" name="image" value="<?php echo isset($official_image) ? $official_image : '' ?>" required />
            </div> -->
    </form>
       
    
   
</div>
<script>
      
       
    $(function(){
        $('#official-form').submit(function(e){
     
            
            e.preventDefault();
            $('.pop_msg').remove()
            var _this = $(this)
            var _el = $('<div>')
                _el.addClass('pop_msg')
            $('#uni_modal button').attr('disabled',true)
            $('#uni_modal button[type="submit"]').text('submitting form...')
            $.ajax({
                url:'./../Actions.php?a=save_official',
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
                     $('#uni_modal button').attr('disabled',false)
                     $('#uni_modal button[type="submit"]').text('Save')
                },
                success:function(resp){
                    if(resp.status == 'success'){
                        location.reload()
                    }else{
                        _el.addClass('alert alert-danger')
                        _el.text(resp.msg)
                        _el.hide()
                        _this.prepend(_el)
                        _el.show('slow')
                    }
                     $('#uni_modal button').attr('disabled',false)
                     $('#uni_modal button[type="submit"]').text('Save')
                }
            })
        })
    })
</script>