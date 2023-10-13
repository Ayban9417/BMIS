
<style>
    .update_stat_dept:hover,.update_stat_purok:hover{
        color:inherit !important;
        opacity: .95 !important;
        transform:scale(.8);
    }
</style>
<div class="card h-100 d-flex flex-column">
    <div class="card-header d-flex justify-content-between">
        <h3 class="card-title">Vaccine</h3>
        <div class="card-tools align-middle">
            <!-- <button class="btn btn-dark btn-sm py-1 rounded-0" type="button" id="create_new">Add New</button> -->
        </div>
    </div>
    <div class="card-body flex-grow-1">
        <div class="col-12 h-100">
            <div class="row h-100">
                <div class="col-md-6 h-100 d-flex flex-column">
                    <div class="w-100 d-flex border-bottom border-dark py-1 mb-1">
                        <div class="fs-5 col-auto flex-grow-1"><b>Vaccine List</b></div>
                        <div class="col-auto flex-grow-0 d-flex justify-content-end">
                            <a href="javascript:void(0)" id="new_vaccine" class="btn btn-dark btn-sm bg-gradient rounded-2" title="Add Vaccine"><span class="fa fa-plus"></span></a>
                        </div>
                    </div>
                    <div class="h-100 overflow-auto border rounded-1 border-dark">
                        <ul class="list-group">
                            <?php 
                            $dept_qry =mysqli_query($conn,"SELECT * FROM `vaccine_list` order by `vaccine` asc");
                            while($row = mysqli_fetch_array( $dept_qry)):
                            ?>
                            <li class="list-group-item d-flex">
                                <div class="col-auto flex-grow-1">
                                    <?php echo $row['vaccine'] ?>
                                </div>
                                <div class="col-auto">
                                </div>
                                <div class="col-auto d-flex justify-content-end">
                                    <a href="javascript:void(0)" class="edit_vaccine btn btn-sm btn-primary bg-gradient py-0 px-1 me-1" title="Edit Vaccine Details" data-id="<?php echo $row['vaccine_id'] ?>"  data-name="<?php echo $row['vaccine'] ?>"><span class="fa fa-edit"></span></a>

                                    <a href="javascript:void(0)" class="delete_vaccine btn btn-sm btn-danger bg-gradient py-0 px-1" title="Delete VAccine" data-id="<?php echo $row['vaccine_id'] ?>"  data-name="<?php echo $row['vaccine'] ?>"><span class="fa fa-trash"></span></a>
                                </div>
                            </li>
                            <?php endwhile; ?>
                            <?php if(!mysqli_fetch_array( $dept_qry)): ?>
                                <li class="list-group-item text-center">No data listed yet.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        // purok
        $('#new_vaccine').click(function(){
            uni_modal('Add New Vaccine',"manage_vaccine.php")
        })
        $('.edit_vaccine').click(function(){
            uni_modal('Edit Vaccine Details',"manage_vaccine.php?id="+$(this).attr('data-id'))
        })
        $('.delete_vaccine').click(function(){
            _conf("Are you sure to delete <b>"+$(this).attr('data-name')+"</b> from vaccine List?",'delete_vaccine',[$(this).attr('data-id')])
        })
    })
    function delete_vaccine($id){
        $('#confirm_modal button').attr('disabled',true)
        $.ajax({
            url:'./../Actions.php?a=delete_vaccine',
            method:'POST',
            data:{id:$id},
            dataType:'JSON',
            error:err=>{
                consolre.log(err)
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