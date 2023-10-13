
<style>
    .logo-img{
        width:45px;
        height:45px;
        object-fit:scale-down;
        background : var(--bs-light);
        object-position:center center;
        border:1px solid var(--bs-dark);
        border-radius:50% 50%;
    }
    #footers {
        display: none;  
}

</style>
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3 class="card-title">Appointed Officials List</h3>
        <div class="card-tools align-middle">
            <a class="btn btn-dark btn-sm py-1 rounded-0" href="javascript:void(0)" id="create_new">Add New</a>
            <button class="btn btn-success btn-sm py-1 rounded-0" type="button" id="print"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
    <div class="card-body">
        <div id="outprint">
        <table class="table table-hover table-striped table-bordered" id="tbl-list">
            <colgroup>
                <col width="5%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="15%">
            </colgroup>
            <thead>
                <tr>
                    <th class="text-center p-0">#</th>
                    <th class="text-center p-0">Name</th>
                    <th class="text-center p-0">Last Name</th>
                    <th class="text-center p-0">Contact</th>
                    <th class="text-center p-0">Position</th>
                    <th class="text-center p-0">Remarks</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = "SELECT o.*,(o.firstname) as fullname, (o.lastname) as lastn, p.position FROM official_list o inner join `position_list` p on o.position_id = p.position_id order by `fullname` asc";
                $qry =  mysqli_query($conn,$sql);
                $i = 1;
                    while($row = mysqli_fetch_array( $qry )):
                ?>
                <tr>
                    <td class="text-center p-0"><?php echo $i++; ?></td>
                
                    <td class="py-0 px-1"><?php echo $row['fullname'] ?></td>
                    <td class="py-0 px-1"><?php echo $row['lastn'] ?></td>
                    <td class="py-0 px-1"><?php echo $row['contact'] ?></td>
                    <td class="py-0 px-1"><?php echo $row['position'] ?></td>
                    <td class="text-center py-0 px-1">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm rounded-0 py-0" data-bs-toggle="dropdown" aria-expanded="false">
                            Remarks
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <li><a class="dropdown-item view_data" data-id="<?php echo $row['official_id'] ?>" href="javascript:void(0)">View</a></li>
                            <li><a class="dropdown-item edit_data" data-id = '<?php echo $row['official_id'] ?>' href="javascript:void(0)">Edit</a></li>
                            <li><a class="dropdown-item delete_data" data-id = '<?php echo $row['official_id'] ?>' data-name='<?php echo $row['fullname'] ?>' href="javascript:void(0)">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<noscript>
    <div class="d-flex w-100 align-items-center">
        <div class="col-2 px-3">
            <center><img src="<?php echo is_file('./../uploads/VIOLETA.png') ? './../uploads/VIOLETA.png' : './../images/no-image-available.png' ?>" alt="Barangay Logo" class="img-fluid rounded-0" width="100px" height="100px"></center>
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
            <p class="fw-bold text-center">Appointed Officials List</p>
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
    var dtable;
    $(function(){
        
        $('#create_new').click(function(){
            uni_modal('Add Appointed Official',"manage_official.php",'mid-large')
        })
        $('.edit_data').click(function(){
            uni_modal('Edit Appointed Official\'s Details',"manage_official.php?id="+$(this).attr('data-id'),'mid-large')
        })
        $('.view_data').click(function(){
            uni_modal('Appointed Official Details',"view_official.php?id="+$(this).attr('data-id'),'mid-large')
        })
        $('.delete_data').click(function(){
            _conf("Are you sure to delete <b>"+$(this).attr('data-name')+"</b> from Appointed Official List?",'delete_data',[$(this).attr('data-id')])
        })
        $('table td,table th').addClass('align-middle py-1 px-2')
        dtable = $('table').dataTable({
            columnDefs: [
                { orderable: false, targets: [5] }
            ]
        })
        $('#print').click(function(){
            //dtable.fnDestroy()
            var linebreak = document.createElement("br");
            var _p = $('#tbl-list').clone()
            var _h = $('head').clone()
            var _header = $('noscript').html()
            var _footer = $('#footer').css('right','20px');
            var el = $('<div>')
            _p.find('tr').each(function(){
                $(this).find('td,th').last().remove()
            })
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
                                dtable = $('table').dataTable({
                                    columnDefs: [
                                        { orderable: false, targets: [5] }
                                    ]
                                })
                            }, 200);
                        }, 500);
        })
    })
    function delete_data($id){
        $('#confirm_modal button').attr('disabled',true)
        $.ajax({
            url:'./../Actions.php?a=delete_official',
            method:'POST',
            data:{id:$id},
            dataType:'JSON',
            error:err=>{
                console.log(err)
                alert("An error occurred.")
                $('#confirm_modal button').attr('disabled',false)
            },
            success:function(resp){
                if(resp.status == 'success'){
                    location.reload()
                }else{
                    alert("An error occurred.")
                    $('#confirm_modal button').attr('disabled',false)
                }
            }
        })
    }
</script>