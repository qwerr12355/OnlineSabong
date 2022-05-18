<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/material-press/package/html/dark/starter-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Apr 2022 01:57:30 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/assets/images/favicon.png">
    <title>Admin - Material Design Demo</title>
    <link href="<?php echo base_url(); ?>assets/dist/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/dist/css/pages/data-table.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <!-- This page CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style media="screen">
      .light-blue.lighten-2, .left-sidebar .sidenav ul > li.active > .collapsible-header, .left-sidebar .sidenav ul > li.active a.collapsible-hdeader {
          background-color: #000000 !important;
        }
      }
      @media screen and (min-width: 850px) {
        .twitch {
          position: relative;
        }

        .twitch .twitch-video {
          width: 75%;
          padding-top: 42.1875%;
        }

        .twitch .twitch-chat {
          width: 25%;
          height: auto;
          position: absolute;
          top: 0;
          right: 0;
          bottom: 0;
        }
      }
      .twitch .twitch-video {
        padding-top: 56.25%;
        position: relative;
        height: 0;
      }

      .twitch .twitch-video iframe {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
      }
      .twitch .twitch-chat {
          height: 400px;
        }

        .twitch .twitch-chat iframe {
          width: 100%;
          height: 100%;
        }
    </style>
</head>

<body>
    <div class="main-wrapper" id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">Online Sabong</p>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <header class="topbar">
            <!-- ============================================================== -->
            <!-- Navbar scss in header.scss -->
            <!-- ============================================================== -->
            <nav>
                <div class="nav-wrapper">
                    <!-- ============================================================== -->
                    <!-- Logo you can find that scss in header.scss -->
                    <!-- ============================================================== -->
                    <a href="javascript:void(0)" class="brand-logo">
                        <span class="icon">
                            <img class="light-logo" src="<?php echo base_url(); ?>assets/assets/images/logo-light-icon.png">
                            <img class="dark-logo" src="<?php echo base_url(); ?>assets/assets/images/logo-icon.png">
                        </span>
                        <span class="text">
                            <img class="light-logo" src="<?php echo base_url(); ?>assets/assets/images/logo-light-text.png">
                            <img class="dark-logo" src="<?php echo base_url(); ?>assets/assets/images/logo-text.png">
                        </span>
                    </a>

                    <ul class="left">
                        <li class="hide-on-med-and-down">
                            <a href="javascript: void(0);" class="nav-toggle">
                                <span class="bars bar1"></span>
                                <span class="bars bar2"></span>
                                <span class="bars bar3"></span>
                            </a>
                        </li>
                        <li class="hide-on-large-only">
                            <a href="javascript: void(0);" class="sidebar-toggle">
                                <span class="bars bar1"></span>
                                <span class="bars bar2"></span>
                                <span class="bars bar3"></span>
                            </a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Logo you can find that scss in header.scss -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Left topbar icon scss in header.scss -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- Left topbar icon scss in header.scss -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right topbar icon scss in header.scss -->
                    <!-- ============================================================== -->
                    <ul class="right">

                        <!-- ============================================================== -->
                        <!-- Notification icon scss in header.scss -->
                        <!-- ============================================================== -->
                        <li><a class="dropdown-trigger" href="javascript: void(0);" data-target="noti_dropdown"><i class="material-icons">notifications</i></a>
                            <ul id="noti_dropdown" class="mailbox dropdown-content">
                                <li>
                                    <div class="drop-title">Notifications</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="#">
                                                <span class="btn-floating btn-large red"><i class="material-icons">link</i></span>
                                                <span class="mail-contnet">
                                                    <h5>Launch Admin</h5>
                                                    <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span>
                                                </span>
                                            </a>
                                        <!-- Message -->
                                        <a href="#">
                                                <span class="btn-floating btn-large blue"><i class="material-icons">date_range</i></span>
                                                <span class="mail-contnet">
                                                    <h5>Event today</h5>
                                                    <span class="mail-desc">Just a reminder that you have event</span>
                                                    <span class="time">9:10 AM</span>
                                                </span>
                                            </a>
                                        <!-- Message -->
                                        <a href="#">
                                                <span class="btn-floating btn-large cyan"><i class="material-icons">settings</i></span>
                                                <span class="mail-contnet">
                                                    <h5>Settings</h5>
                                                    <span class="mail-desc">You can customize this template as you want</span>
                                                    <span class="time">9:08 AM</span>
                                                </span>
                                            </a>
                                        <!-- Message -->
                                        <a href="#">
                                                <span class="btn-floating btn-large green"><i class="material-icons">face</i></span>
                                                <span class="mail-contnet">
                                                    <h5>Lily Jordan</h5>
                                                    <span class="mail-desc">Just see the my admin!</span>
                                                    <span class="time">9:02 AM</span>
                                                </span>
                                            </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="center-align" href="javascript:void(0);"> <strong>Check all notifications</strong> </a>
                                </li>
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Comment topbar icon scss in header.scss -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- Profile icon scss in header.scss -->
                        <!-- ============================================================== -->
                        <li><a class="dropdown-trigger" href="javascript: void(0);" data-target="user_dropdown"><img src="<?php echo base_url(); ?>assets/assets/images/users/3.jpg" alt="user" class="circle profile-pic"></a>
                            <ul id="user_dropdown" class="mailbox dropdown-content dropdown-user">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="u-text">
                                            <h4><?php echo $_SESSION['Username']; ?></h4>
                                            <h4>(Admin)</h4>
                                            <a class="waves-effect waves-light btn-small red white-text">View Profile</a>
                                        </div>
                                    </div>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#"><i class="material-icons">account_circle</i> My Profile</a></li>
                                <li><a href="#"><i class="material-icons">account_balance_wallet</i> My Balance</a></li>
                                <li><a href="#"><i class="material-icons">inbox</i> Inbox</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#"><i class="material-icons">settings</i> Account Setting</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo site_url('User/Logout'); ?>"><i class="material-icons">power_settings_new</i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right topbar icon scss in header.scss -->
                    <!-- ============================================================== -->
                </div>
            </nav>
            <!-- ============================================================== -->
            <!-- Navbar scss in header.scss -->
            <!-- ============================================================== -->
        </header>
        <!-- ============================================================== -->
        <!-- Sidebar scss in sidebar.scss -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <ul id="slide-out" class="sidenav">
                <li>
                    <div class="user-profile">
                        <div class="user-name dropdown-trigger" data-target='dropdownuser'>
                            <h6 class="white-text name"><i class="material-icons m-r-10">account_circle</i> <span class="hidden"><?php echo $_SESSION['Username']; ?>(Admin)</span> <i class="material-icons ml-auto hidden">expand_more</i></h6>
                        </div>
                        <ul id='dropdownuser' class='dropdown-content'>
                            <li><a href="#"><i class="material-icons">account_circle</i> My Profile</a></li>
                            <li><a href="#"><i class="material-icons">account_balance_wallet</i> My Balance</a></li>
                            <li><a href="#"><i class="material-icons">inbox</i> Inbox</a></li>
                            <li role="separator" class="divider m-t-0"></li>
                            <li><a href="#"><i class="material-icons">settings</i> Account Setting</a></li>
                            <li role="separator" class="divider m-t-0"></li>
                            <li><a href="<?php echo site_url('User/Logout'); ?>"><i class="material-icons">power_settings_new</i> Logout</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <ul class="collapsible p-t-30">
                         <li>
                            <a href="<?php echo site_url('Admin/Dashboard'); ?>" class="collapsible-header"><i class="material-icons">repeat</i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li>
                           <a href="<?php echo site_url('Admin/Events'); ?>" class="collapsible-header"><i class="material-icons">repeat</i><span class="hide-menu">Events</span></a>
                       </li>
                        <li>
                            <a class="collapsible-header has-arrow"><i class="material-icons">clear_all</i><span class="hide-menu">User</span></a>
                            <div class="collapsible-body">
                                <ul class="collapsible" data-collapsible="accordion">
                                    <li>
                                        <a href="<?php echo site_url('Admin/OperatorList'); ?>">
                                            <i class="material-icons">grade</i>
                                            <span class="hide-menu">Operator</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Admin/SubOperatorList'); ?>">
                                            <i class="material-icons">grade</i>
                                            <span class="hide-menu">Sub-operator</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Admin/MasterAgentList'); ?>">
                                            <i class="material-icons">grade</i>
                                            <span class="hide-menu">Master Agent</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Admin/SubAgentList'); ?>">
                                            <i class="material-icons">grade</i>
                                            <span class="hide-menu">Sub-Agent</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Admin/PlayerList'); ?>">
                                            <i class="material-icons">grade</i>
                                            <span class="hide-menu">Player</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header has-arrow"><i class="material-icons">clear_all</i><span class="hide-menu">Wallet Station</span></a>
                            <div class="collapsible-body">
                                <ul class="collapsible" data-collapsible="accordion">
                                    <li>
                                        <a href="<?php echo site_url('Admin/WalletDeposit'); ?>">
                                            <i class="material-icons">grade</i>
                                            <span class="hide-menu">Wallet Deposit</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Admin/WalletWithdrawal'); ?>">
                                            <i class="material-icons">grade</i>
                                            <span class="hide-menu">Wallet Widthdrawal</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header has-arrow"><i class="material-icons">clear_all</i><span class="hide-menu">Logs</span></a>
                            <div class="collapsible-body">
                                <ul class="collapsible" data-collapsible="accordion">
                                    <li>
                                        <a href="#">
                                            <i class="material-icons">grade</i>
                                            <span class="hide-menu">User Logs</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="material-icons">grade</i>
                                            <span class="hide-menu">Wallet Logs</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="material-icons">grade</i>
                                            <span class="hide-menu">Bet Logs</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header"><i class="material-icons">clear_all</i><span class="hide-menu">My Account</span></a>
                        </li>
                        <li>
                            <a class="collapsible-header"><i class="material-icons">clear_all</i><span class="hide-menu">Logout</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
        <!-- ============================================================== -->
        <!-- Sidebar scss in sidebar.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
