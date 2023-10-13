<?php
require_once("./../DBConnection.php");
if(isset($_GET['id'])){
$qry = $conn->query("SELECT h.*,(h.lastname) as fullname,(h.firstname) as firstn, p.purok FROM household_list h inner join `purok_list` p on h.purok_id = p.purok_id where h.household_id = '{$_GET['id']}'");
    foreach(mysqli_fetch_array($qry) as $k => $v){
        $$k = $v;
    }
}
?>
<style>
    #uni_modal .modal-footer{
        display:none !important;
    }
    #footers {
        display: none;  
}

</style>
<div class="container-fluid">
    <div id="outprint_modal">
        <dl class="row w-100">
            <dt class="text-muted col-md-4">Household #:</dt>
            <dd class="col-md-8"><?php echo $house_no ?></dd>
            <dt class="text-muted col-md-4">Resident Lastname:</dt>
            <dd class="col-md-8"><?php echo $fullname ?></dd>
            <dt class="text-muted col-md-4">Resident Firstname:</dt>
            <dd class="col-md-8"><?php echo $firstn ?></dd>
            <dt class="text-muted col-md-4">Contact #:</dt>
            <dd class="col-md-8"><?php echo $contact ?></dd>
            <dt class="text-muted col-md-4">Email:</dt>
            <dd class="col-md-8"><?php echo $email ?></dd>
            <dt class="text-muted col-md-4">Occupation:</dt>
            <dd class="col-md-8"><?php echo $occupation ?></dd>
            <dt class="text-muted col-md-4">Address:</dt>
            <dd class="col-md-8"><?php echo $purok ?>, <?php
        require_once("../DBConnection.php");

        $position = $conn->query("SELECT * from `system_infos` where id = 1 ");
             $city = mysqli_fetch_array( $position );
            
        ?><?php echo $city['baranggay'] ?>, <?php echo $city['city'] ?>, <?php echo $city['province'] ?>, <?php echo $city['code'] ?></dd>
        </dl>
    </div>
    <div class="row justify-content-end">
        <div class="col-auto me-1">
            <button class="btn btn-sm btn-success rounded-0" id='print_data' type="button"><i class="fa fa-print"></i> Print</button>
        </div>
        <div class="col-auto">
            <button class="btn btn-sm btn-dark rounded-0" data-bs-dismiss='modal' type="button"><i class="fa fa-times"></i> Close</button>
        </div>
    </div>    
    <div class="clearfix mb-1"></div>
</div>
<noscript>
    <div class="d-flex w-100 align-items-center">
        <div class="col-2 px-3">
            <center><img src="<?php echo is_file('./../uploads/logo.png') ? './../uploads/logo.png' : './../images/no-image-available.png' ?>" alt="Barangay Logo" class="img-fluid rounded-0" width="100px" height="100px"></center>
        </div>
        <div class="col-8 flex-grow-1 lh-1">
            <p class="m-0 text-center">Republic of the Philippines</p>
            <p class="m-0 text-center"><?php echo $city['city'] ?></p>
            <div class="clearfix"></div>
            <p class="fw-bold text-center"><large><?php echo $city['baranggay'] ?></large></p>
            <p class="fw-bold text-center">Household Resident Information</p>
        </div>
        <div class="col-2">

        </div>
    </div>
    <hr>
</noscript>
<div id="footer" class="d-flex w-100 justify-content-end">
            <?php 
            $position = $conn->query("SELECT position,position_id from `position_list` where is_approver = 1 ");
             $pos = mysqli_fetch_array( $position );
            if(isset($pos['position_id']))
            $official = $conn->query("SELECT CONCAT(lastname, ' ' ,firstname) as fullname from `official_list` where position_id = '{$pos['position_id']}' ");
            $lname = mysqli_fetch_array( $official)['fullname'];
       
            ?>
            
            <div class="col-4">
                <div id="footers"  class="w-100 text-center border-bottom border-dark"><?php echo isset($lname) ? $lname : ''  ?></div>
                <div  id="footers" class="w-100 text-center"><?php echo ($pos['position']) ? $pos['position'] : '' ?></div>
            </div>

        </div>
        
        <br>
        <br>
        <dl class="row">
            
        </dl>
        <dl class="row">
            
        </dl>
    </div>
<script>
$(function(){
    $('#print_data').click(function(){
        var linebreak = document.createElement("br");
        var _p = $('#outprint_modal').clone()
        var _footer = $('#footer').css('right','20px');
        var _h = $('head').clone()
        var _header = $('noscript').html()
        var el = $('<div>')
        el.append(_h)
        el.append(_header)
        el.append(_p)
        el.append(linebreak)
            el.append($("<br />"))
            el.append($("<br />"))
            el.append($("<br />"))
            el.append($("<br />"))
            el.append($("<br />"))
            el.append(_footer)
        
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