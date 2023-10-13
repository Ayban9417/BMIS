

<h3>Welcome to Barangay Violeta Management System</h3>

<hr>
<div class="col-12">
    <div class="row gx-3 row-cols-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="w-100 d-flex align-items-center">
                        <div class="col-auto pe-1">
                            <span class="fa fa-user fs-3 text-success"></span>
                        </div>
                        <div class="col-auto flex-grow-1">
                            <div class="fs-5"><a class="nav-link text-dark " href="./?page=household"><b>Citizens</b></a></div>
                            <div class="fs-6 text-end fw-bold">
                                <?php 
                              
                                include('../DBConnection.php'); 
                              
                            $result = mysqli_query($conn,"SELECT COUNT(household_id) AS `total` FROM `household_list` ");  
                            $row = mysqli_fetch_assoc( $result );
                              $num_rows=$row['total'];
                              echo $num_rows;

                           
                           
                              
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="w-100 d-flex align-items-center">
                        <div class="col-auto pe-1">
                            <span class="fa fa-file-alt fs-3 text-primary"></span>
                        </div>
                        <div class="col-auto flex-grow-1">
                        <div class="fs-5 " ><a class="nav-link text-dark " href="./?page=clearance"><b>Certificate for Loan</b></a></div>
                            <div class="fs-6 text-end  fw-bold">
                                <?php 
                              include('../DBConnection.php'); 
                              
                              $result = mysqli_query($conn,"SELECT COUNT(clearance_id) AS `total` FROM `clearance_list` ");  
                              $row = mysqli_fetch_assoc( $result );
                                $num_rows=$row['total'];
                                //echo $num_rows;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="w-100 d-flex align-items-center">
                        <div class="col-auto pe-1">
                            <span class="fa fa-file-alt fs-3 text-warning"></span>
                        </div>
                        <div class="col-auto flex-grow-1">
                        <div class="fs-5"><a class="nav-link text-dark" href="./?page=business_clearance"><b>Electrification</b></a></div>
                            <div class="fs-6 text-end fw-bold">
                                <?php 
                               include('../DBConnection.php'); 
                              
                               $result = mysqli_query($conn,"SELECT COUNT(business_clearance_id) AS `total` FROM `business_clearance_list` ");  
                               $row = mysqli_fetch_assoc( $result );
                                 $num_rows=$row['total'];
                                // echo $num_rows;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="w-100 d-flex align-items-center">
                        <div class="col-auto pe-1">
                            <span class="fa fa-list fs-3 text-primary"></span>
                        </div>
                        <div class="col-auto flex-grow-1">
                        <div class="fs-5"><a class="nav-link text-dark" href="./?page=complaints"><b>Complaints</b></a></div>
                            <div class="fs-6 text-end fw-bold">
                                <?php 
                                 include('../DBConnection.php'); 
                              
                                 $result = mysqli_query($conn,"SELECT COUNT(complaint_id) AS `total` FROM `complaint_list` ");  
                                 $row = mysqli_fetch_assoc( $result );
                                   $num_rows=$row['total'];
                                   //echo $num_rows;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="col-12">
    <div class="row gx-3 row-cols-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="w-100 d-flex align-items-center">
                        <div class="col-auto pe-1">
                            <span class="fa fa-user fs-3 text-success"></span>
                        </div>
                        <div class="col-auto flex-grow-1">
                        <div class="col-auto flex-grow-1">
                        <div class="fs-5"><a class="nav-link text-dark" href="./?page=household"><b>Total Vaccinated</b></a></div>
                            <div class="fs-6 text-end fw-bold">
                                <?php 
                              
                                include('../DBConnection.php'); 
                              
                                $result = mysqli_query($conn,"SELECT count(household_id) as `total` FROM `household_list` WHERE ( VaccineInfo = 'Fully Vaccine' OR VaccineInfo = 'First Dose' ) ");  
                                $row = mysqli_fetch_assoc( $result );
                                  $num_rows=$row['total'];
                                  echo $num_rows;
                                ?>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="w-100 d-flex align-items-center">
                        <div class="col-auto pe-1">
                            <span class="fa fa-file-alt fs-3 text-primary"></span>
                        </div>
                        <div class="col-auto flex-grow-1">
                        <div class="fs-5"><a class="nav-link text-dark" href="./?page=residency"><b>Residency</b></a></div>
                            <div class="fs-6 text-end fw-bold">
                                <?php 
                              include('../DBConnection.php'); 
                              
                              $result = mysqli_query($conn,"SELECT COUNT(residency_id) AS `total` FROM `residency_list` ");  
                              $row = mysqli_fetch_assoc( $result );
                                $num_rows=$row['total'];
                                //echo $num_rows;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="w-100 d-flex align-items-center">
                        <div class="col-auto pe-1">
                            <span class="fa fa-file-alt fs-3 text-warning"></span>
                        </div>
                        <div class="col-auto flex-grow-1">
                        <div class="fs-5"><a class="nav-link text-dark" href="./?page=indigency"><b>Indigency</b></a></div>
                            <div class="fs-6 text-end fw-bold">
                                <?php 
                               include('../DBConnection.php'); 
                              
                               $result = mysqli_query($conn,"SELECT COUNT(indigency_id) AS `total` FROM `indigency_list` ");  
                               $row = mysqli_fetch_assoc( $result );
                                 $num_rows=$row['total'];
                                 //echo $num_rows;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="w-100 d-flex align-items-center">
                        <div class="col-auto pe-1">
                            <span class="fa fa-list fs-3 text-primary"></span>
                        </div>
                        <div class="col-auto flex-grow-1">
                        <div class="fs-5"><a class="nav-link text-dark" href="./?page=cutting_trees"><b>Medical Assistance</b></a></div>
                            <div class="fs-6 text-end fw-bold">
                                <?php 
                                 include('../DBConnection.php'); 
                              
                                 $result = mysqli_query($conn,"SELECT COUNT(cutting_id) AS `total` FROM `cutting_trees` ");  
                                 $row = mysqli_fetch_assoc( $result );
                                   $num_rows=$row['total'];
                                   //echo $num_rows;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('.restock').click(function(){
            uni_modal('Add New Stock for <span class="text-primary">'+$(this).attr('data-name')+"</span>","manage_stock.php?pid="+$(this).attr('data-pid'))
        })
        $('table#inventory').dataTable()
    })
</script>