<?php
require_once("./../DBConnection.php");
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM `cutting_trees` where cutting_id = '{$_GET['id']}'");
    foreach(mysqli_fetch_array($qry)as $k => $v){
        $$k = $v;
    }
}
?>
<div class="container-fluid">
    <form action="" id="cutting-form">
        <input type="hidden" name="id" value="<?php echo isset($cutting_id) ? $cutting_id : '' ?>">
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
        <div class="form-group col-md-4">
            <label for="age" class="control-label">Age</label>
            <input type="text" pattern="[0-9]+" name="age" id="age" class="form-control form-control-sm rounded-0 col-md-6" value="<?php echo isset($age) ? $age : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="contact" class="control-label">Contact #</label>
            <input type="text" pattern="[0-9]+" name="contact" id="contact" class="form-control form-control-sm rounded-0 col-md-6" value="<?php echo isset($contact) ? $contact : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="or_no" class="control-label">OR #</label>
            <input type="text" pattern="[0-9]+" name="or_no" id="or_no" class="form-control form-control-sm rounded-0 col-md-6" value="<?php echo isset($or_no) ? $or_no : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="purpose" class="control-label">Purpose</label>
            <select class="form-control" id="purpose" placeholder="Purpose" name="purpose" required value="">
                                    <option value="Financial Assistance" >Financial Assistance</option>
                                    <option value="Medical Services" >Medical Services</option>
                                    <option value="Hospitalisation Assistance" >Hospitalisation Assistance</option>
                                    
                                </select>
        </div>
    </form>
</div>
<script>
    $(function(){
        $('#cutting-form').submit(function(e){
           // ----------------------------REQUIRED FIELD---------------------------------
         let x = document.forms["cutting-form"]["lastname"].value;
            let y = document.forms["cutting-form"]["firstname"].value;
  if (x == "" || y == "") {
    alert("Name must be filled out");
    
  } else {
    // ---------------------------END------------------------------------------------
            e.preventDefault();
            $('.pop_msg').remove()
            var _this = $(this)
            var _el = $('<div>')
                _el.addClass('pop_msg')
            $('#uni_modal button').attr('disabled',true)
            $('#uni_modal button[type="submit"]').text('submitting form...')
            $.ajax({
                url:'./../Actions.php?a=save_cutting',
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
// ---------------------------------------SUMPAY NI SA REQUIRD FIELD--------------------------------------------
        } return false;
        })
    })
</script>