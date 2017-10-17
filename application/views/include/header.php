<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Sensation Station</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?= base_url() ?>css/calendercss.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>css/css.css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <link href="<?= base_url() ?>assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/jquery-nestable/jquery.nestable.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?= base_url() ?>css/main.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>css/jquery-ui.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/lobibox-master/dist/css/lobibox.min.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/consent_form.css">
        <link rel="shortcut icon" href="<?= base_url() ?>files/images/favicon.ico" /> </head>
    <!-- END HEAD -->
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <?php
        $session_arr = $this->session->userdata('logged_in');
        $db_session_ar=get_employee_arr_by_emp_id($session_arr[0]->id);
        ?>
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="alert alert-success" style="display: none;">
                    <strong>Success!</strong> <span id="success-message"> </span>
                </div>
                <div class="alert alert-danger" style="display: none">
                    <strong>Error!</strong> <span id="error-message"> </span>
                </div>
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?= base_url('Home'); ?>">
                            <img src="<?= base_url() ?>assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <?php
                                $session_arr = $this->session->userdata('logged_in');
                                $vb = notification_policy($session_arr[0]->id);
                                if ($vb == 1) :
                                    ?> 
                                    <a href="<?= base_url() ?>Home/accept_policy_procedure" class="dropdown-toggle"  data-close-others="true" aria-expanded="true" style="float:left">
                                        <i class="icon-doc" style="color:#FF0000"></i>
                                    </a>                                
                                <?php endif; ?>
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true" style="float:left">
                                    <i class="icon-bell"></i>
                                    <span class="badge badge-default count_notification"> 0 </span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>
                                            <span class="bold">Today <b class="count_notification">0</b></span> notifications</h3>

                                    </li>
                                    <li>
                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                                            <ul class="dropdown-menu-list scroller" id="notification_ul_id" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">

                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="<?= base_url() . 'files/images/' . $session_arr[0]->image_name ?>" />
                                    
                                    <input color_id="<?= $session_arr[0]->color_id ?>" employee_name="<?= $session_arr[0]->employee_name ?>" type="hidden" id="current_session_emp_id" value="<?= $session_arr[0]->id ?>">
                                    <span class="username username-hide-on-mobile"> <?= $session_arr[0]->employee_name ?> </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="<?= base_url('Home/my_profile'); ?>">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Home/calendar_view'); ?>">
                                            <i class="icon-calendar"></i> My Calendar </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Home/change_password'); ?>">
                                            <i class="icon-calendar"></i> Change Password </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Login/logout'); ?>">
                                            <i class="icon-key"></i> Log Out
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
            <div class="page-container">
                <div class="page-sidebar-wrapper">
                    <div class="page-sidebar navbar-collapse collapse">
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            <li class="heading">
                                <h3 class="uppercase">Features</h3>
                            </li>
                            <?php if ($session_arr[0]->id == 17 && $session_arr[0]->employee_name == 'Admin') { ?>

                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Manage Settings</span>
                                    <span class="arrow"></span>
                                </a>
                            <ul class="sub-menu">

                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-diamond"></i>
                                        <span class="title">Manage Category</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/add_category'); ?>" class="nav-link ">
                                                <span class="title">Add Category</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/view_category'); ?>" class="nav-link ">
                                                <span class="title">View Category</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-diamond"></i>
                                        <span class="title">Manage Disipline</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/disipline'); ?>" class="nav-link ">
                                                <span class="title">Add Disipline</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/view_disipline'); ?>" class="nav-link ">
                                                <span class="title">View Disipline</span>
                                            </a>
                                        </li>
                                    </ul>
                                    </li>
                                    <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-diamond"></i>
                                        <span class="title">Manage Designation</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/designation'); ?>" class="nav-link ">
                                                <span class="title">Add Designation</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/view_designation'); ?>" class="nav-link ">
                                                <span class="title">View Designation</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-puzzle"></i>
                                        <span class="title">Manage Sub Category</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/add_subcategory'); ?>" class="nav-link ">
                                                <span class="title">Add Sub Category</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/view_subcategory'); ?>" class="nav-link ">
                                                <span class="title">View Sub Category</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-wrench"></i>
                                        <span class="title">Manage Services</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/add_service'); ?>" class="nav-link ">
                                                <span class="title">Add Service</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/view_service'); ?>" class="nav-link ">
                                                <span class="title">View Service</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-bag"></i>
                                        <span class="title">Manage Employee</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/add_employee'); ?>" class="nav-link ">
                                                <span class="title">Add Employee</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/view_employee'); ?>" class="nav-link ">
                                                <span class="title">View Employee</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa icon-wrench" aria-hidden="true"></i>
                                        <span class="title"> Policy & Procedure</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/policy_procedure'); ?>" class="nav-link ">
                                                <span class="title">Add Policy Procedure</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('Home/view_policy_procedure'); ?> " class="nav-link ">
                                                <span class="title">View Policy Procedure</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('Home/view_policy_accepted_list'); ?> " class="nav-link ">
                                                <span class="title">Policy Accepted Lists</span>
                                            </a>
                                        </li>                                        
                                    </ul>
                                </li>                                 
                            </ul>
                                <li class="nav-item  ">
                                    <a href="<?= base_url('Home/child_details'); ?>" class="nav-link ">
                                        <i class="icon-bag"></i>
                                        <span class="title">Manage Childs</span>
                                        <!--<span class="arrow"></span>-->
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/child_details'); ?>" class="nav-link ">
                                                <span class="title">View Childs</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                            }

                            if ($session_arr[0]->registration_form == 0) {
                                ?>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-direction"></i>
                                        <span class="title">Registration Form</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/reg_add'); ?>" class="nav-link ">
                                                <span class="title">Add </span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/reg_view'); ?>" class="nav-link ">
                                                <span class="title">View </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                 <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-direction"></i>
                                        <span class="title">Add Out Side Student</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/reg_outsidestudent'); ?>" class="nav-link ">
                                                <span class="title">Add </span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/view_outsidestudent'); ?>" class="nav-link ">
                                                <span class="title">View </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                            <li class="nav-item  ">
                                <a href="<?= base_url('Home/calendar_view'); ?>" class="nav-link">
                                    <i class="icon-calendar"></i>
                                    <span class="title">Calendar</span>
                                    <!--<span class="arrow"></span>-->
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?= base_url('Home/calendar_view'); ?>" class="nav-link ">
                                            <span class="title">View </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php if ($session_arr[0]->quotation == 0) { ?>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                        <span class="title">Manage Quotation</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/add_quotation'); ?>" class="nav-link ">
                                                <span class="title">Add Quotation</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/view_quotation'); ?>" class="nav-link ">
                                                <span class="title">View Quotation</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('Home/add_campreports'); ?>" class="nav-link ">
                                                <span class="title">Add Camp & Reports</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('Home/view_camp_reports'); ?>" class="nav-link ">
                                                <span class="title">view Camp & Reports</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } if ($session_arr[0]->electronic_link == 0) { ?>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                        <span class="title">Electronic Link</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/add_quotation/add_electronic'); ?>" class="nav-link ">
                                                <span class="title">Add New Electronic Link</span>
                                            </a> 
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/electronic_quotation_details'); ?>" class="nav-link ">
                                                <span class="title">Electronic Link Details</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } if ($session_arr[0]->receipt == 0) { ?>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-briefcase" aria-hidden="true"></i>
                                        <span class="title">Receipt Details</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/create_receipt'); ?>" class="nav-link ">
                                                <span class="title">Create/Cancellation Receitpt</span>
                                            </a> 
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/view_child_details'); ?>" class="nav-link ">
                                                <span class="title">Receitpt View</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                  <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-briefcase" aria-hidden="true"></i>
                                        <span class="title">Reports</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/create_reports'); ?>" class="nav-link ">
                                                <span class="title">Therapy Reports</span>
                                            </a> 
                                        </li>
                                        
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/registration_reports'); ?>" class="nav-link ">
                                                <span class="title">Registration Reports</span>
                                            </a> 
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/quotation_reports'); ?>" class="nav-link ">
                                                <span class="title">Quotation Reports</span>
                                            </a> 
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/receipt_reports'); ?>" class="nav-link ">
                                                <span class="title">Receipt Reports</span>
                                            </a> 
                                        </li>
                                         <li class="nav-item  ">
                                            <a href="<?= base_url('Home/capacity_reports'); ?>" class="nav-link ">
                                                <span class="title">Capacity Reports</span>
                                            </a> 
                                        </li>

                                    </ul>
                                </li>
                            <?php } if ($session_arr[0]->therapy_notes == 0) { ?>
                           
                                <li class="nav-item  ">
                                    <a href="<?= base_url('Home/list_therapy_notes'); ?>" class="nav-link ">
                                        <i class="fa icon-wrench" aria-hidden="true"></i>
                                        <span class="title"> Therapy Notes</span>
                                        <!--<span class="arrow"></span>-->
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/list_therapy_notes'); ?>" class="nav-link ">
                                                <span class="title">Therapy Notes</span>
                                            </a>
                                        </li>
                                        <!--/*<li class="nav-item">
                                            <a href="<?=base_url('Home/therapy_note_lists'); ?>" class="nav-link ">
                                                <span class="title">View Therapy Notes</span>
                                            </a>
                                        </li>*/-->
                                    </ul>
                                </li> 
                            <?php } if ($session_arr[0]->marketing == 0) { ?>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-money" aria-hidden="true"></i>
                                        <span class="title">Manage Marketing</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/marketing'); ?>" class="nav-link ">
                                                <span class="title">Add New</span>
                                            </a> 
                                        </li>
                                        <li class="nav-item  ">
                                            <a href="<?= base_url('Home/view_marketing'); ?>" class="nav-link ">
                                                <span class="title">View</span>
                                            </a> 
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>