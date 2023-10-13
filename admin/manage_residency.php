<?php
require_once("./../DBConnection.php");
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM `residency_list` where residency_id = '{$_GET['id']}'");
    foreach(mysqli_fetch_array($qry)as $k => $v){
        $$k = $v;
    }
}
?>
<div class="container-fluid">
    <form action="" id="residency-form">
        <input type="hidden" name="id" value="<?php echo isset($residency_id) ? $residency_id : '' ?>">
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
            <label for="birthdate" class="control-label">Birthdate</label>
            <input type="date"  name="birthdate" id="birthdate" class="form-control form-control-sm rounded-0 col-md-6" value="<?php echo isset($birthdate) ? $birthdate : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="birthdate" class="control-label">Purpose</label>
            <select class="form-control" id="purpose" placeholder="Purpose" name="purpose" required value="">
                                    <option value="" disabled <?php echo !isset($purpose) ? 'selected' : '' ?>></option>
                                    <option value="Business Establishment" >Business Establishment</option>
                                    <option value="Financial Transactions" >Financial Transactions</option>
                                    <option value="Purchase" >Purchase</option>
                                    <option value="Job Seekers" >Job Seekers</option>
                                    
                                </select>
        </div>
        <div class="form-group">
            <label for="purok_id" class="control-label">Purok</label>
            <select name="purok_id" id="purok_id" class="form-select form-select-sm rounded-0 select2">
                <option value="" disabled <?php echo !isset($purok_id) ? 'selected' : '' ?>></option>
                <?php 
                $purok =  mysqli_query($conn,"SELECT * FROM purok_list");
                while($row =mysqli_fetch_array( $purok )):
                ?>
                <option value="<?php echo $row['purok_id'] ?>" <?php echo isset($purok_id) && $purok_id == $row['purok_id'] ? 'selected' : "" ?>><?php echo $row['purok'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="birthplace" class="control-label">Birthplace</label>
            <textarea rows="2" name="birthplace" id="birthplace" class="form-control form-control-sm rounded-0 col-md-6" required style="resize:none"><?php echo isset($birthplace) ? $birthplace : '' ?></textarea>
        </div>
    </form>
</div>
<script>
    $(function(){
        $('#residency-form').submit(function(e){
            // ----------------------------REQUIRED FIELD---------------------------------
         let x = document.forms["residency-form"]["lastname"].value;
            let y = document.forms["residency-form"]["firstname"].value;
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
                url:'./../Actions.php?a=save_residency',
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