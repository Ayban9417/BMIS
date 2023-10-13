<?php  require_once("./../DBConnection.php");require_once("./../DBConnection.php");
if(isset($_GET['id'])){
$qry = $conn->query("SELECT *,(lastname) as fullname,(firstname) as fname FROM clearance_list where clearance_id = '{$_GET['id']}'");
    foreach(mysqli_fetch_array( $qry ) as $k => $v){
        $$k = $v;
    }
}
?>
<?php
$position = $conn->query("SELECT * from `system_infos` where id = 1 ");
             $city = mysqli_fetch_array( $position );?>

<style>
    #uni_modal .modal-footer{
        display:none !important;
    }
</style>
<div class="container-fluid">
    <div id="outprint_modal">
        <p>
            <span class="ms-5"></span>This is to certify that <b><u class="px-1"><?php  session_start(); echo $fullname.', '.$fname.', '.$age ?></u></b> years old, and a bonafide resident of <?php  echo $city['baranggay'] ?> <?php  echo $city['city'] ?>, <?php  echo $city['province'] ?> is known to be of good moral character and law-abiding citizen in the community.
        </p>
        <p><span class="ms-5"></span>This Certification is being issued upon the request of the above-name person for the requirements of his/her <?php echo $purpose ?> .
 </p>
        <p><span class="ms-5">ISSUED this <b><u class="px-1"><?php echo date('dS',strtotime($date_created)) ?></u></b> day of <b><u class="px-1"><?php echo date('F Y',strtotime($date_created)) ?></u></b> at the Punong Baranggay Office <?php  echo $city['baranggay'] ?> <?php  echo $city['city'] ?>, <?php  echo $city['province'] ?> </p>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="d-flex w-100 justify-content-end">
            <?php 
            $position = $conn->query("SELECT position,position_id from `position_list` where is_approver = 1 ");
             $pos = mysqli_fetch_array( $position );
            if(isset($pos['position_id']))
            $official = $conn->query("SELECT CONCAT(lastname, ' ' ,firstname) as fullname from `official_list` where position_id = '{$pos['position_id']}' ");
            $lname = mysqli_fetch_array( $official)['fullname'];
       
            ?>
            
            <div class="col-4">
                <div class="w-100 text-center border-bottom border-dark"><?php echo isset($lname) ? $lname : ''  ?></div>
                <div class="w-100 text-center"><?php echo ($pos['position']) ? $pos['position'] : '' ?></div>
            </div>

        </div>
        
        <br>
        <br>
        <dl class="row">
            <dt class='col-auto'>OR #:</dt>
            <dd class='col-3 border-bottom'><?php echo $or_no ?></dd>
        </dl>
        <dl class="row">
            <dt class='col-auto'>Data Issued:</dt>
            <dd class='col-3 border-bottom'><?php echo date("M d,Y",strtotime($date_created)) ?></dd>
        </dl>
    </div>
    <div class="row justify-content-end border-top pt-2">
        <div class="col-auto me-1">
            <button class="btn btn-sm btn-success rounded-0" id='print_data' type="button"><i class="fa fa-print"></i> Print</button>
        </div>
        <div class="col-auto">
            <button class="btn btn-sm btn-dark rounded-0" data-bs-dismiss='modal' type="button"><i class="fa fa-times"></i> Close</button>
        </div>
    </div>    
    <div class="clearfix mb-1"></div>
</div>
<div id="noscript2" class="d-none">
    <div class="d-flex w-100 align-items-center">
        <div class="col-2 px-3">
            <center><img src="../uploads/VIOLETA.png" alt="Barangay Logo" class="img-fluid rounded-0" width="100px" height="100px"></center>
        </div>
        <div class="col-8 flex-grow-1 lh-1">
            <p class="m-0 text-center">Republic of the Philippines</p>
            <p class="m-0 text-center"><?php
        require_once("../DBConnection.php");

        $position = $conn->query("SELECT * from `system_infos` where id = 1 ");
             $city = mysqli_fetch_array( $position );
            
        ?><?php echo $city['city'] ?></p>
            <div class="clearfix"></div>
            <p class="fw-bold text-center"><large><?php echo $city['baranggay'] ?></large></p>
        </div>
        <div class="col-2">

        </div>
    </div>
    <hr>
    <br>
    <h2 class="fw-bold text-center">Certificate for Loan</h2>
    <br>
    <br>
    <br>
    <br>
</div>
<script>
$(function(){
    $('#print_data').click(function(){
        var _p = $('#outprint_modal').clone()
        var _h = $('head').clone()
        var _header = $('#noscript2').html()
        var el = $('<div>')
        el.append(_h)
        el.append(_header)
        el.append(_p)
        
        var nw = window.open("","_blank","width=1000,height=900,top=50,left=250")
                    nw.document.write(el.html())
                    nw.document.close()
                    setTimeout(() => {
                    nw.print()
                        setTimeout(() => {
                            nw.close()
                        }, 200);
                    }, 500);
    })
})
</script>