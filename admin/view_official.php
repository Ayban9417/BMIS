<?php
require_once("./../DBConnection.php");
if(isset($_GET['id'])){
$qry =  $conn->query("SELECT o.*,(o.lastname) as fullname, (o.firstname) as firstn,(o.middlename) as middlen, official_image, p.position FROM official_list o inner join `position_list` p on o.position_id = p.position_id where o.official_id = '{$_GET['id']}'");
    foreach(mysqli_fetch_array( $qry ) as $k => $v){
        $$k = $v;
    }
}
?>
<style>
    #uni_modal .modal-footer{
        display:none !important;
    }
</style>
<div class="container-fluid">
    <div id="outprint">
        <dl class="row w-100">
        <!-- <dt>Profile Image:</dt> -->
            <dd><?php echo $official_image ?></dd>
            <dt>Appointed Official Last Name:</dt>
            <dd><?php echo $fullname ?></dd>
            <dt>First Name:</dt>
            <dd><?php echo $firstn ?></dd>
            <dt>Middlename:</dt>
            <dd><?php echo $middlen ?></dd>
            <dt>Contact #:</dt>
            <dd><?php echo $contact ?></dd>
            <dt>Position:</dt>
            <dd><?php echo $position ?></dd>
            
        </dl>
    </div>
    <div class="row justify-content-end">
        <div class="col-auto">
            <button class="btn btn-sm btn-dark rounded-0" data-bs-dismiss='modal' type="button"><i class="fa fa-times"></i> Close</button>
        </div>
    </div>    
    <div class="clearfix mb-1"></div>
</div>
<script>
$(function(){
   
})
</script>