<?php
require_once("./../DBConnection.php");
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM `household_list` where household_id = '{$_GET['id']}'");
    foreach(mysqli_fetch_array($qry) as $k => $v){
        $$k = $v;
    }
}
?>
<script type="text/javascript">
    function EnableDisableTextBox(ddlModels) {
        var selectedValue = ddlModels.options[ddlModels.selectedIndex].value;
        var txtOther = document.getElementById("vaccine_id");
        txtOther.disabled = selectedValue == "Fully Vaccine" ? false : true && selectedValue == "First Dose" ? false : true ;
        if (!txtOther.disabled || !txtOthers.disabled) {
            txtOther.focus();
        }
    }
</script>
<div class="container-fluid">
    <form action="" id="household-form">
        <input type="hidden" name="id" value="<?php echo isset($household_id) ? $household_id : '' ?>">
        <div class="form-group">
            <label for="house_no" class="control-label">Household #</label>
            <input type="text" maxlength="4" pattern="\d{4}" name="house_no" id="house_no" class="form-control form-control-sm rounded-0 col-md-6" value="<?php echo isset($house_no) ? $house_no : '' ?>" required>
        </div>
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
        <div class="form-group row">
        <div class="col-md-4">
            <label for="contact" class="control-label">Birthday</label>
            <input type="date" pattern="[0-9]+" name="birthday" id="birthday" class="form-control form-control-sm rounded-0 col-md-6" value="<?php echo isset($birthday) ? $birthday : '' ?>" required>
        </div>
        <div class="col-md-4">
            <label for="contact" class="control-label">Contact #</label>
            <input type="text" maxlength="11" pattern="[0-9]+" name="contact" id="contact" class="form-control form-control-sm rounded-0 col-md-6" value="<?php echo isset($contact) ? $contact : '' ?>" required>
        </div>
        <div class="col-md-4">
            <label for="email" class="control-label">Email</label>
            <input type="email" name="email" id="email" class="form-control form-control-sm rounded-0 col-md-6" value="<?php echo isset($email) ? $email : '' ?>" required>
</div>
        <div class="form-group">
            <label for="occupation" class="control-label">Occupation</label>
            <input type="text" name="occupation" id="occupation" class="form-control form-control-sm rounded-0 col-md-6" value="<?php echo isset($occupation) ? $occupation : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="vaccineInfo" class="control-label">Vaccination Info</label>
            <select type="text" name="vaccineInfo" onchange = "EnableDisableTextBox(this)" id="vaccineInfo" class="form-control form-control-sm rounded-0 col-md-6" value="<?php echo isset($VaccineInfo) ? $VaccineInfo : '' ?>" required>
            <option value="First Dose">First Dose</option>
            <option value="Fully Vaccine">Fully Vaccine</option>
                <option value="Unvaccinated">Unvaccinated</option>
        </select>
        <br>
        <label for="purok_id" class="control-label">Vaccine</label>
            <select name="vaccine_id" id="vaccine_id" class="form-select form-select-sm rounded-0 select2">
                <option value="" disabled <?php echo !isset($purok_id) ? 'selected' : '' ?>></option>
                <?php 
                $vaccine =  mysqli_query($conn,"SELECT * FROM vaccine_list");
                while($row =mysqli_fetch_array( $vaccine )):
                ?>
                <option value="<?php echo $row['vaccine_id'] ?>" <?php echo isset($vaccine_id) && $vaccine_id == $row['vaccine_id'] ? 'selected' : "" ?>><?php echo $row['vaccine'] ?></option>
                <?php endwhile; ?>
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
    </form>
</div>
<script>
    $(function(){
        $('#household-form').submit(function(e){
             // ----------------------------REQUIRED FIELD---------------------------------
         let x = document.forms["household-form"]["lastname"].value;
            let y = document.forms["household-form"]["firstname"].value;
            let z = document.forms["household-form"]["house_no"].value;
  if (x == "" || y == "") {
    alert("Name must be filled out");
    
  } else if (z == "") {
    alert("Household Number must be filled out");}
    else {
    // ---------------------------END------------------------------------------------
            e.preventDefault();
            $('.pop_msg').remove()
            var _this = $(this)
            var _el = $('<div>')
                _el.addClass('pop_msg')
            $('#uni_modal button').attr('disabled',true)
            $('#uni_modal button[type="submit"]').text('submitting form...')
            $.ajax({
                url:'./../Actions.php?a=save_household',
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