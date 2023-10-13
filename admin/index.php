<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location:./login.php");
    exit;
}
require_once('../DBConnection.php');
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
if($_SESSION['type'] != 1 && in_array($page,array('maintenance','admin','manage_admin'))){
    header("Location:./");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucwords(str_replace('_',' ',$page)) ?> |  Barangay Violeta </title>
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../select2/css/select2.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../summernote/summernote-lite.min.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../select2/js/select2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../summernote/summernote-lite.min.js"></script>
    <link rel="stylesheet" href="../DataTables/datatables.min.css">
    <script src="../DataTables/datatables.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
    <script src="../js/script.js"></script>
    <style>
        :root{
            --bs-success-rgb:71, 222, 152 !important;
        }
        html,body{
            height:100%;
            width:100%;
        }
        main{
            height:100%;
            display:flex;
            flex-flow:column;
        }
        #page-container{
            flex: 1 1 auto; 
            overflow:auto;
        }
        #topNavBar{
            flex: 0 1 auto; 
        }
        .thumbnail-img{
            width:50px;
            height:50px;
            margin:2px
        }
        .truncate-1 {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
        .truncate-3 {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        .modal-dialog.large {
            width: 80% !important;
            max-width: unset;
        }
        .modal-dialog.mid-large {
            width: 50% !important;
            max-width: unset;
        }
        @media (max-width:720px){
            
            .modal-dialog.large {
                width: 100% !important;
                max-width: unset;
            }
            .modal-dialog.mid-large {
                width: 100% !important;
                max-width: unset;
            }  
        
        }
        .display-select-image{
            width:60px;
            height:60px;
            margin:2px
        }
        img.display-image {
            width: 100%;
            height: 45vh;
            object-fit: cover;
            background: black;
        }
        /* width */
        ::-webkit-scrollbar {
        width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
        background: #f1f1f1; 
        }
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: #888; 
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
        background: #555; 
        }
        .img-del-btn{
            right: 2px;
            top: -3px;
        }
        .img-del-btn>.btn{
            font-size: 10px;
            padding: 0px 2px !important;
        }
        span.select2-container.select2-container--default.select2-container--open {
            z-index: 9999;
        }
    </style>
</head>
<body style="background-color: #EEEEEE">
    <main>
    <nav class="navbar navbar-expand-lg navbar-dark" style=" box-shadow: 0 2px 2px -2px rgba(0,0,0,.2); background-color: #3F3351" id="topNavBar">
        <div class="container">
            <a class="navbar-brand <?php echo ($page == 'home')? 'active' : '' ?>" href="./">
            Brgy. Violeta
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ">
                    <!-- <li class="nav-item">
                        <a class="nav-link <?php echo ($page == 'home')? 'active' : '' ?>" aria-current="page" href="./"><i class="fa fa-home"></i> Home</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" ><i class="fa fa-th-list"></i> Citizens</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item <?php echo ($page == 'household')? 'active' : '' ?>" href="./?page=household">All</a></li>
                            <li><a class="dropdown-item" href="./?page=adult">Adult</a></li>
                            <li><a class="dropdown-item" href="./?page=kids">Kids</a></li>
                            <li><a class="dropdown-item" href="./?page=teens">Teens</a></li>
                            <li><a class="dropdown-item" href="./?page=seniors">Senior Citizen</a></li>
                            
                        </ul>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link  <?php echo ($page == 'households')? 'active' : '' ?>" href="./?page=households"><i class="fa fa-th-list"></i> Households</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo ($page == 'appointed_officials')? 'active' : '' ?>" href="./?page=appointed_officials"><i class="fa fa-user-tie"></i> Officials</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="settings_dropdown"><i class="fa fa-file-alt"></i> Clearances</a>
                        <ul class="dropdown-menu" aria-labelledby="settings_dropdown">
                            <li><a class="dropdown-item" href="./?page=clearance">Certificate for Loan</a></li>
                            <li><a class="dropdown-item" href="./?page=business_clearance">Certificate for Electrification</a></li>
                            <li><a class="dropdown-item" href="./?page=residency">Certificate for Residency</a></li>
                            <li><a class="dropdown-item" href="./?page=indigency">Certificate for Indigency</a></li>
                            <li><a class="dropdown-item" href="./?page=cutting_trees">Certificate for Medical Assistance</a></li>
                            <li><a class="dropdown-item" href="./?page=cedula">Certificate for Valid ID</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo ($page == 'complaints')? 'active' : '' ?>" href="./?page=complaints"><i class="fa fa-list"></i> Complaints</a>
                    </li>
                    <?php if($_SESSION['type'] == 1): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page == 'admin')? 'active' : '' ?>" aria-current="page" href="./?page=admin"><i class="fa fa-users"></i> Users</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="settings_dropdown"><i class="fa fa-cogs"></i> Settings</a>
                        <ul class="dropdown-menu" aria-labelledby="settings_dropdown">
                            <li><a class="dropdown-item" href="./?page=system_info">Barangay/System Info</a></li>
                            <li><a class="dropdown-item" href="./?page=position">Official Poistion List</a></li>
                            <li><a class="dropdown-item" href="./?page=purok">Purok List</a></li>
                            <li><a class="dropdown-item" href="./?page=vaccine">Vaccine List</a></li>
                            <li><a class="dropdown-item" href="./?page=event">Add Events</a></li>
                            <li><a class="dropdown-item" href="./?page=skevents">Add SK Events</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    
                </ul>
            </div>
            <div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle bg-transparent  text-light border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Hello <?php echo $_SESSION['fullname'] ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="./?page=manage_account">Manage Account</a></li>
                    <li><a class="dropdown-item" href="./../Actions.php?a=logout">Logout</a></li>
                </ul>
            </div>
            </div>
        </div>
    </nav>
    <div class="container py-3" id="page-container">
        <?php 
            if(isset($_SESSION['flashdata'])):
        ?>
        <div class="dynamic_alert alert alert-<?php echo $_SESSION['flashdata']['type'] ?>">
        <div class="float-end"><a href="javascript:void(0)" class="text-dark text-decoration-none" onclick="$(this).closest('.dynamic_alert').hide('slow').remove()">x</a></div>
            <?php echo $_SESSION['flashdata']['msg'] ?>
        </div>
        <?php unset($_SESSION['flashdata']) ?>
        <?php endif; ?>
        <?php
           include $page.'.php';
        ?>
    </div>
    </main>
    <div class="modal fade" id="uni_modal" role='dialog' data-bs-backdrop="static" data-bs-keyboard="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
            <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer py-1">
            <button type="button" class="btn btn-sm rounded-0 btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
            <button type="button" class="btn btn-sm rounded-0 btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="uni_modal_secondary" role='dialog' data-bs-backdrop="static" data-bs-keyboard="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
            <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer py-1">
            <button type="button" class="btn btn-sm rounded-0 btn-primary" id='submit' onclick="$('#uni_modal_secondary form').submit()">Save</button>
            <button type="button" class="btn btn-sm rounded-0 btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header py-2">
            <h5 class="modal-title">Confirmation</h5>
        </div>
        <div class="modal-body">
            <div id="delete_content"></div>
        </div>
        <div class="modal-footer py-1">
            <button type="button" class="btn btn-primary btn-sm rounded-0" id='confirm' onclick="">Continue</button>
            <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
    </div>
</body>
</html>