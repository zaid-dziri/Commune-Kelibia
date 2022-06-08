<?php
    session_start();
    include "includes/dbconnect.php";
    if (empty($_SESSION['admin']['cin'])) {
        header('Location: auth_login.php');
    }
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> بوابة الإدارة مدينة قليبية </title>
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="plugins/editors/quill/quill.snow.css">
    <link href="assets/css/apps/mailbox.css" rel="stylesheet" type="text/css" />

    <script src="plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body class="alt-menu sidebar-noneoverflow">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm expand-header">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-item flex-row ml-auto">

                <li class="nav-item align-self-center search-animated">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                            <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                        </div>
                    </form>
                </li>

                <li class="nav-item dropdown language-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="assets/img/tn.png" class="flag-width" alt="flag">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">   
                        <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="assets/img/fr.png" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;Français</span></a>
                    </div>
                </li>
                

                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                    </a>
                    <div class="dropdown-menu position-absolute e-animated e-fadeInUp" aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">                            
                            <div class="media mx-auto">
                                <img src="assets/img/90x90.jpg" class="img-fluid mr-2" alt="avatar">
                                <div class="media-body">
                                    <h5><?php echo $_SESSION['admin']['nom']; ?></h5>
                                    <p>مشرف</p>
                                </div>
                            </div>
                        </div>
                       
                        <div class="dropdown-item">
                            <a href="auth_login_admin.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>تسجيل خروج</span>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            
            <nav id="sidebar">

                <ul class="navbar-nav theme-brand flex-row  text-center">
                    <li class="nav-item theme-logo">
                        <a href="index.html">
                            <img src="assets/img/commune.jpg" class="navbar-logo" alt="logo">
                        </a>
                    </li>
                    <li class="nav-item theme-text">
                        <a href="index.html" class="nav-link"> بوابة مدينة قليبية </a>
                    </li>
                </ul>

                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>الصفحة الرئيسية</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        
                    </li>

                    
                    
                </ul>
                
            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <h6>مطالب النفاذ</h6>

                        <div class="row">

                            <div class="col-xl-12  col-md-12">

                                <div class="mail-box-container">
                                    <div class="mail-overlay"></div>

                                    <div class="tab-title">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12 text-center mail-btn-container">
                                                <a id="btn-compose-mail" class="btn btn-block" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-12 mail-categories-container">

                                                <div class="mail-sidebar-scroll">

                                                    <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                                                        <?php
                                                            $demandes= $connect->prepare("SELECT COUNT(*) FROM demende; ");
                                                            $demandes->execute();
                                                            $demandes= $demandes->fetch();

                                                            $reponses= $connect->prepare("SELECT COUNT(*) FROM reponse; ");
                                                            $reponses->execute();
                                                            $reponses= $reponses->fetch();
                                                        ?>  
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions active" id="mailInbox"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span class="nav-names">صندوق الوارد</span> <span style="background-color: #386aff;border-radius: 50px;padding: 0 5px; color:#fff;"><?php echo $demandes[0]; ?></span></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions" id="sentmail"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg> <span class="nav-names"> المرسلة</span> <span style="background-color: #386aff;border-radius: 50px;padding: 0 5px; color:#fff;"><?php echo $reponses[0]; ?></span></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions" id="important"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg> <span class="nav-names">المطالب المهمة</span></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions" id="draft"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg> <span class="nav-names">المسودات</span> </a>
                                                        </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions" id="spam"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> <span class="nav-names">بريد مزعج</span></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions" id="trashed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> <span class="nav-names">المهملات</span></a>
                                                        </li>
                                                    </ul>

                                                

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="mailbox-inbox" class="accordion mailbox-inbox">

                                        <div class="search">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu mail-menu d-lg-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                                            <input type="text" class="form-control input-search" placeholder="البحث في المطالب ..">
                                        </div>

                                        <div class="action-center">
                                            <div class="">
                                                <div class="n-chk">
                                                    <label class="new-control new-checkbox checkbox-primary">
                                                      <input type="checkbox" class="new-control-input" id="inboxAll">
                                                      <span class="new-control-indicator"></span><span>تحديد الكل</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="">
                                                <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                                    <a class="label-group-item label-personal dropdown-item position-relative g-dot-primary" href="javascript:void(0);"> Personal</a>
                                                    <a class="label-group-item label-work dropdown-item position-relative g-dot-warning" href="javascript:void(0);"> Work</a>
                                                    <a class="label-group-item label-social dropdown-item position-relative g-dot-success" href="javascript:void(0);"> Social</a>
                                                    <a class="label-group-item label-private dropdown-item position-relative g-dot-danger" href="javascript:void(0);"> Private</a>
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" data-toggle="tooltip" data-placement="top" data-original-title="مهم" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star action-important"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-toggle="tooltip" data-placement="top" data-original-title="مزعج" class="feather feather-alert-circle action-spam"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" data-toggle="tooltip" data-placement="top" data-original-title="Revive Mail" stroke-linejoin="round" class="feather feather-activity revive-mail"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-toggle="tooltip" data-placement="top" data-original-title="Delete Permanently" class="feather feather-trash permanent-delete"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                <div class="dropdown d-inline-block more-actions">
                                                    <a class="nav-link dropdown-toggle" id="more-actions-btns-dropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="more-actions-btns-dropdown">
                                                        <a class="dropdown-item action-mark_as_read" href="javascript:void(0);">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg> إطلعت عليه
                                                        </a>
                                                        <a class="dropdown-item action-mark_as_unRead" href="javascript:void(0);">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> لم أطلع عليه بعد
                                                        </a>
                                                        <a class="dropdown-item action-delete" href="javascript:void(0);">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-toggle="tooltip" data-placement="top" data-original-title="Delete" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> حذف
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                
                                        <div class="message-box">
                                            
                                            <div class="message-box-scroll" id="ct">
                                                <?php
                                                    $demandes= $connect->prepare("SELECT * FROM demende ORDER BY dateAdd DESC; ");
                                                    $demandes->execute();
                                                    foreach ($demandes->fetchAll() as $key) {
                                                        //Affichier la liste
                                                        echo '
                                                            <div id="unread-promotion-page" class="mail-item mailInbox">
                                                                <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingThree">
                                                                    <div class="mb-0">
                                                                        <div class="mail-item-heading social collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapse'.$key['id'].'" aria-expanded="false">
                                                                            <div class="mail-item-inner">

                                                                                <div class="d-flex">
                                                                                    <div class="n-chk text-center">
                                                                                        <label class="new-control new-checkbox checkbox-primary">
                                                                                          <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                                          <span class="new-control-indicator"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="f-head">
                                                                                        <img src="assets/img/90x90.jpg" class="user-profile" alt="avatar">
                                                                                    </div>
                                                                                    <div class="f-body">
                                                                                        <div class="meta-mail-time">
                                                                                            <p class="user-email" data-mailTo="laurieFox@mail.com">من :  '.$key['nom'].' <br> <span style="font-size:12px;color:gray;">'.$key['tel'].'</span></p>
                                                                                        </div>
                                                                                        <div class="meta-title-tag">
                                                                                            <p class="mail-content-excerpt" ><span class="mail-title" data-mailTitle="Promotion Page">'.$key['departement'].' - </span> '.$key['marjaa'].'
                                                                                            </p>
                                                                                            <div class="tags">
                                                                                                <span class="g-dot-primary"></span>
                                                                                                <span class="g-dot-warning"></span>
                                                                                                <span class="g-dot-success"></span>
                                                                                                <span class="g-dot-danger"></span>
                                                                                            </div>
                                                                                            <p class="meta-time align-self-center">'.$key['dateAdd'].'</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="attachments">
                                                                                <span class="">'.$key['type'].'</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        ';
                                                    }
                                                ?>

                                                <?php
                                                    $demandes= $connect->prepare("SELECT * FROM reponse JOIN user ON user.cin=reponse.user ORDER BY reponse.dateAdd DESC; ");
                                                    $demandes->execute();
                                                    foreach ($demandes->fetchAll() as $key) {
                                                        //Affichier la liste
                                                        echo '
                                                            <div id="unread-promotion-page" class="mail-item sentmail">
                                                                <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingThree">
                                                                    <div class="mb-0">
                                                                        <div class="mail-item-heading social collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseSent'.$key['id'].'" aria-expanded="false">
                                                                            <div class="mail-item-inner">

                                                                                <div class="d-flex">
                                                                                    <div class="n-chk text-center">
                                                                                        <label class="new-control new-checkbox checkbox-primary">
                                                                                          <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                                          <span class="new-control-indicator"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                    
                                                                                    <div class="f-body">
                                                                                        <div class="meta-mail-time">
                                                                                            <p class="user-email" data-mailTo="laurieFox@mail.com">إلى :  '.$key['nom'].'</p>
                                                                                        </div>
                                                                                        <div class="meta-title-tag">
                                                                                            <p class="mail-content-excerpt" ><span class="mail-title" data-mailTitle="Promotion Page">'.$key['sujet'].' - </span> '.$key['message'].'
                                                                                            </p>
                                                                                            <div class="tags">
                                                                                                <span class="g-dot-primary"></span>
                                                                                                <span class="g-dot-warning"></span>
                                                                                                <span class="g-dot-success"></span>
                                                                                                <span class="g-dot-danger"></span>
                                                                                            </div>
                                                                                            <p class="meta-time align-self-center">'.$key['dateAdd'].'</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="attachments">
                                                                                <a target="_blank" download="" href="./fichiers/'.$key['fichier'].'" style="border:1px solid gray;padding: 0px 10px;border-radius:5px;">'.$key['fichier'].' [ إنقر للتحميل ]</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        ';
                                                    }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="content-box">
                                            <div class="d-flex msg-close">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left close-message"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                                                <h2 class="mail-title" data-selectedMailTitle=""></h2>
                                            </div>

                                            <?php
                                                    $demandes= $connect->prepare("SELECT * FROM demende ORDER BY dateAdd; ");
                                                    $demandes->execute();
                                                    foreach ($demandes->fetchAll() as $key) {
                                                        //Affichier le contenu
                                                        echo '
                                                            <div id="mailCollapse'.$key['id'].'" class="collapse" aria-labelledby="mailHeadingThree" data-parent="#mailbox-inbox">
                                                                <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="linda@mail.com" data-mailcc="">

                                                                    <div class="d-flex justify-content-between">

                                                                        <div class="d-flex user-info">
                                                                            <div class="f-head">
                                                                                <img src="assets/img/90x90.jpg" class="user-profile" alt="avatar">
                                                                            </div>
                                                                            <div class="f-body">
                                                                                <div class="meta-title-tag">
                                                                                    <h4 class="mail-usr-name" data-mailtitle="Promotion Page">إلى :  '.$key['nom'].'</h4>
                                                                                </div>
                                                                                <div class="meta-mail-time">
                                                                                    <p class="user-email">'.$key['email'].'</p>
                                                                                    <br>
                                                                                    <p class="meta-time align-self-center"><b>• رقم الهاتف :</b> '.$key['tel'].'</p>
                                                                                    <br>
                                                                                    <p class="meta-time align-self-center"><b>• رقم الفاكس :</b> '.$key['fax'].'</p>
                                                                                    <br>
                                                                                    <p class="meta-time align-self-center"><b>•  عنوان المستخدم : </b> '.$key['adresse'].'</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="action-btns">
                                                                            <a class="btn btn-dark">  مطلب نفاذ إلى المعلومة  </a>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <br>
                                                                    <span style="padding:3px 7px;border:1px solid #333;border-radius:5px;"> <b> نوعية المرسل : </b> '.$key['type'].'</span>
                                                                    <br>
                                                                    <br>
                                                                    <p> <b>الهيكل المعني : </b> '.$key['departement'].'</p>
                                                                    <p> <b>المرجع  : </b> '.$key['marjaa'].'</p>
                                                                    <p> <b>بيان المعلومة : </b> '.$key['information'].'</p>
                                                                    <p> <b> ملاحظات أخرى : </b> '.$key['note'].'</p>
                                                                    <br>
                                                                    <p> <b> نوعية الإستجابة المرادة : </b> '.$key['type_reponse'].'</p>
                                                                    <br>
                                                                    <p class="meta-time align-self-center"> [ '.$key['dateAdd'].'] </p>
                                                                </div>
                                                            </div>
                                                        ';
                                                    }
                                                ?>
                                        </div>

                                    </div>
                                    
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="composeMailModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                <div class="compose-box">
                                                    <div class="compose-content">
                                                        <form method="POST" action="functions/reponse.php" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="d-flex mb-4 mail-form">
                                                                        <p>من :</p>
                                                                        <select class="" id="m-form" name="from" style="padding: 0 15px;">
                                                                            <option value="<?php echo $_SESSION['admin']['nom']; ?>"><?php echo $_SESSION['admin']['nom']; ?></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="d-flex mb-4 mail-to">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                                        <div class="" style="width: 100%;">
                                                                            <input type="email" id="m-to" placeholder="إلى" class="form-control" style="display: none;">
                                                                            <select name="to" required="" style="width: 100%;height: 40px;border-radius: 5px;border: 1px solid gray;padding: 0 20px;">
                                                                                <option value=""> قم بإختيار المستخدم </option>
                                                                                <?php
                                                                                    $users= $connect->prepare("SELECT * FROM user ; ");
                                                                                    $users->execute();
                                                                                    foreach ($users->fetchAll() as $key ) {
                                                                                        echo '
                                                                                            <option value="'.$key['cin'].'">'.$key['nom'].'</option>
                                                                                        ';
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                            <span class="validation-text"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div style="display: none;">
                                                                    <div class="d-flex mb-4 mail-cc">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                                                                        <div>
                                                                            <input type="text" id="m-cc" placeholder="نسخة إلى" class="form-control">
                                                                            <span class="validation-text"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex mb-4 mail-subject">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                                                <div class="w-100">
                                                                    <input type="text" id="m-subject" name="sujet" placeholder="الموضوع" class="form-control">
                                                                    <span class="validation-text"></span>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex">
                                                                <input type="file" name="fichier" class="form-control-file" id="mail_File_attachment" multiple="multiple">
                                                            </div>
                                                            <br>
                                                            <textarea name="message" style="height: 200px;width: 100%;border: 2px solid #386aff;border-radius: 5px;padding: 10px;" placeholder="الرسالة.."></textarea>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn" data-dismiss="modal"> <i class="flaticon-delete-1"></i> تجاهل</button>

                                                                <button type="submit" class="btn btn-info"> إرسال</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/ie11fix/fn.fix-padStart.js"></script>
    <script src="plugins/editors/quill/quill.js"></script>
    <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="assets/js/apps/custom-mailbox.js"></script>
</body>
</html>