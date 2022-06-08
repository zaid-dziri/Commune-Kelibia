<?php
    session_start();
    include "includes/dbconnect.php";
    if (empty($_SESSION['user']['cin'])) {
        header('Location: auth_login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> بوابة المستخدم بلدية قليبية</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/apps/mailbox.css" rel="stylesheet" type="text/css" />

    <!--  END CUSTOM STYLE FILE  -->
    <style>
        .hidden {
    display: none;
}
    
    </style>
</head>
<body class="alt-menu sidebar-noneoverflow" data-spy="scroll" data-target="#navSection" data-offset="100">
    
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
                

                <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                    </a>
                    <div class="dropdown-menu position-absolute e-animated e-fadeInUp" aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">                            
                            <div class="media mx-auto">
                                <img src="assets/img/90x90.jpg" class="img-fluid mr-2" alt="avatar">
                                <div class="media-body">
                                    <h5><?php echo $_SESSION['user']['nom']; ?></h5>
                                    <p><?php echo "مستخدم " ?></p>
                                </div>
                            </div>
                        </div>
                       
                        <div class="dropdown-item">
                            <a href="auth_login.php">
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
            <div class="container">
                <div class="container">

                    <div class="row layout-top-spacing"></div>
                    
                    <div class="row layout-top-spacing"></div>

                    <div id="tabsSimple" class="col-lg-12 col-12 layout-spacing"></div>
                                    

                    <div class="row">

                        <div id="tabsVertical" class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>تقديم مطلب ..</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area vertical-pill">
                                    <?php
                                        $reponses= $connect->prepare("SELECT * FROM reponse JOIN user ON user.cin=reponse.user WHERE user.cin=? ORDER BY reponse.dateAdd DESC; ");
                                        $reponses->execute([$_SESSION['user']['cin']]);
                                    ?>
                                    <div class="row mb-4 mt-3">
                                        <div class="col-sm-3 col-12">
                                            <div class="nav flex-column nav-pills mb-sm-0 mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                              <a class="nav-link active mb-2" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">مطلب نفاذ إلى المعلومة</a>
                                              <a class="nav-link mb-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">مطلب تظلم</a>
                                              <a class="nav-link mb-2 btn btn-info" id="v-pills-profile2-tab" data-toggle="pill" href="#v-pills-profile2" role="tab" aria-controls="v-pills-profile2" aria-selected="false"><b> بريدي  ( <b id="myMsg"> <?php echo $reponses->rowCount(); ?></b> ) </b></a>
                                            </div>
                                        </div>

                                        <div class="col-sm-9 col-12">
                                            <?php
                                                if (isset($_GET['demende'])) {
                                                    echo '
                                                        <div class="btn btn-success" style="text-align: center;width: 100%;">
                                                            <b> تم إرسال طلبك بنجاح ، سيتم مراجعته و الرد عليك في اسرع وقت ممكن  </b>
                                                        </div>  
                                                            <br>
                                                            <br>
                                                    ';
                                                }
                                            ?>
                                            <div class="tab-content" id="v-pills-tabContent">
                                              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <h4 class="mb-4">الرجاء ملأ البيانات</h4>
                                                <form class="needs-validation" novalidate method="POST" action="functions/demende.php">
                                                    <div class="form-group mb-4">
                                                        <select class="form-control basic" id="theSelect" required name="type">
                                                            <option value="">إختر</option>
                                                            <option value="Normal">شخص طبيعي</option>
                                                            <option value="Moral">شخص معنوي</option>
                                                        </select>
                                                    </div>
                                                    <div class="Selector hidden isNormal">
                                                        <div class="form-group mb-4">
                                                            <label for="inputName">الإسم واللقب</label>
                                                            <input type="text" class="form-control" id="inputName" required name="nom1" <?php echo ' value="'.$_SESSION['user']['nom'].'" readonly'; ?>>
                                                        </div>
                                                    <div class="form-group mb-4" >
                                                        <label for="inputAddress">العنوان </label>
                                                        <input type="text" class="form-control" id="inputAddress" required name="adresse1" <?php echo ' value="'.$_SESSION['user']['adresse'].'"'; ?>>
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label for="inputNumber">الهاتف </label>
                                                        <input type="text" class="form-control" id="inputNumber" maxlength="8" pattern="[0-9]{8,}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required name="tel1" <?php echo ' value="'.$_SESSION['user']['tel'].'" '; ?>>
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label for="inputFax">الفاكس </label>
                                                        <input type="text" class="form-control" id="inputFax" maxlength="8" pattern="[0-9]{8,}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="fax1" >
                                                    </div>
                                                    <div class="form-group mb-4" >
                                                        <label for="inputEmail">البريد الإلكتروني </label>
                                                        <input type="email" class="form-control" id="inputAddress" required name="email1" <?php echo ' value="'.$_SESSION['user']['email'].'" readonly'; ?>>
                                                    </div>
                                                </div>
                                                <div class="Selector hidden isMoral">
                                                    <div class="form-group mb-4">
                                                        <label for="inputName2">التسمية الاجتماعية</label>
                                                        <input type="text" class="form-control" id="inputName2" required name="nom2">
                                                    </div>
                                                <div class="form-group mb-4" >
                                                    <label for="inputAddress2">عنوان المقر الاجتماعي </label>
                                                    <input type="text" class="form-control" id="inputAddress2" required name="adresse2">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="inputNumber">الهاتف </label>
                                                    <input type="text" class="form-control" id="inputNumber" maxlength="8" pattern="[0-9]{8,}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required name="tel2">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="inputFax">الفاكس </label>
                                                    <input type="text" class="form-control" id="inputFax" maxlength="8" pattern="[0-9]{8,}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="fax2" >
                                                </div>
                                                <div class="form-group mb-4" >
                                                    <label for="inputEmail">البريد الإلكتروني </label>
                                                    <input type="email" class="form-control" id="inputAddress" required name="email2">
                                                </div>
                                            </div>

                                            <h6>المعلومة المطلوب النفاذ إليها :</h6>
                                            <div class="form-group mb-4">
                                                <label for="exampleFormControlTextarea1">بيان المعلومة</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 94px;" required name="information"></textarea>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="exampleFormControlTextarea1">الهيكل المعني</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 94px;" required name="departement"></textarea>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="exampleFormControlTextarea1"> المرجع (إن وجد)</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 50px;" name="marjaa"></textarea>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="exampleFormControlTextarea1">ملاحظات أخرى</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 50px;" name="note"></textarea>
                                            </div>

                                            <h6>صيغة النفاذ إلى المعلومة المطلب النفاذ إليها :</h6>
                                            <div class="custom-control" style="margin-bottom: 1cm;" >
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" required value="الإطلاع على المعلومة على عين المكان">
                                                    <label class="custom-control-label" for="customRadio1">الإطلاع على المعلومة على عين المكان</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" value="الحصول على نسخة إلكترونية من المعلومة">
                                                    <label class="custom-control-label" for="customRadio2">الحصول على نسخة إلكترونية من المعلومة</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" value="الحصول على نسخة ورقية من المعلومة">
                                                    <label class="custom-control-label" for="customRadio3">الحصول على نسخة ورقية من المعلومة</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input" value="الحصول على نسخة إلكترونية من المعلومة">
                                                    <label class="custom-control-label" for="customRadio4">الحصول على نسخة إلكترونية من المعلومة</label>
                                                </div>

                                            </div>

                                                    <div class="form-group" style="padding: 1cm;">
                                                        <div class="form-check pl-0">
                                                            <div class="custom-control custom-checkbox checkbox-info">
                                                                <input type="checkbox" class="custom-control-input" id="gridCheck" required>
                                                                <label class="custom-control-label" for="gridCheck" style="font-weight: bold;">تأكدت من صحة المعلومات</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  <button type="submit" class="btn btn-primary mt-3">إرسال المطلب</button>
                                                </form>
                                              </div>
                                              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <h4 class="mb-4">مرجع مطلب النفاذ إلى المعلومة :</h4>
                                                <form>
                                                    <div class="form-row mb-4">
                                                        <div class="col">
                                                          <input type="text" class="form-control" placeholder="عدد">
                                                        </div>
                                                        <div class="col-9">
                                                          <input type="text" class="form-control" placeholder="بتاريخ">
                                                        </div>
                                                    </div>
                                                </form>

                                                    <h4 class="mb-4">الإرشادات الخاصة بالمتظلم :</h4>
                                                    <form class="needs-validation" novalidate>
                                                        <div class="form-group mb-4">
                                                            <select class="form-control basic" id="theSelect1" required>
                                                                <option value="">إختر</option>
                                                                <option value="Normal">شخص طبيعي</option>
                                                                <option value="Moral">شخص معنوي</option>
                                                            </select>
                                                        </div>
                                                        <div class="Selector hidden isNormal">
                                                            <div class="form-group mb-4">
                                                                <label for="inputName">الإسم واللقب</label>
                                                                <input type="text" class="form-control" id="inputName" required>
                                                            </div>
                                                        <div class="form-group mb-4" >
                                                            <label for="inputAddress">العنوان </label>
                                                            <input type="text" class="form-control" id="inputAddress" required>
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="inputNumber">الهاتف </label>
                                                            <input type="text" class="form-control" id="inputNumber" maxlength="8" pattern="[0-9]{8,}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required >
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="inputFax">الفاكس </label>
                                                            <input type="text" class="form-control" id="inputFax" maxlength="8" pattern="[0-9]{8,}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                                                        </div>
                                                        <div class="form-group mb-4" >
                                                            <label for="inputEmail">البريد الإلكتروني </label>
                                                            <input type="email" class="form-control" id="inputAddress" required>
                                                        </div>
                                                    </div>
                                                    <div class="Selector hidden isMoral">
                                                        <div class="form-group mb-4">
                                                            <label for="inputName2">التسمية الاجتماعية</label>
                                                            <input type="text" class="form-control" id="inputName2" required>
                                                        </div>
                                                    <div class="form-group mb-4" >
                                                        <label for="inputAddress2">عنوان المقر الاجتماعي </label>
                                                        <input type="text" class="form-control" id="inputAddress2" required>
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label for="inputNumber">الهاتف </label>
                                                        <input type="text" class="form-control" id="inputNumber" maxlength="8" pattern="[0-9]{8,}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required >
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label for="inputFax">الفاكس </label>
                                                        <input type="text" class="form-control" id="inputFax" maxlength="8" pattern="[0-9]{8,}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                                                    </div>
                                                    <div class="form-group mb-4" >
                                                        <label for="inputEmail">البريد الإلكتروني </label>
                                                        <input type="email" class="form-control" id="inputAddress" required>
                                                    </div>
                                                </div>
    
                                                <h6>المعلومة المطلوب النفاذ إليها :</h6>
                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlTextarea1">بيان المعلومة</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 94px;" required></textarea>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlTextarea1">الهيكل المعني</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 94px;" required></textarea>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlTextarea1"> المرجع (إن وجد)</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlTextarea1">ملاحظات أخرى</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                                                </div>
    
                                                <h6>صيغة النفاذ إلى المعلومة المطلب النفاذ إليها :</h6>
                                                <div class="custom-control" style="margin-bottom: 1cm;">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio11" name="customRadio" class="custom-control-input" required>
                                                        <label class="custom-control-label" for="customRadio11"> رفض مطلب الحصول على المعلومة</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio22" name="customRadio" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio22">عدم الرد على المطلب في الآجال القانونیة</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio33" name="customRadio" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio33">عدم إتاحة المعلومة وفق الصیغة التي تم تحدیدھا في المطلب</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio44" name="customRadio" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio44">عدم تعلیل إتاحة المعلومة</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio55" name="customRadio" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio55">سبب آخر (أذكره)</label>
                                                    </div>
                                                    <input type="text" class="form-control">

    
                                                </div>
    
                                                        <div class="form-group" style="padding: 1cm;">
                                                            <div class="form-check pl-0">
                                                                <div class="custom-control custom-checkbox checkbox-info">
                                                                    <input type="checkbox" class="custom-control-input" id="gridCheck" required>
                                                                    <label class="custom-control-label" for="gridCheck" style="font-weight: bold;">تأكدت من صحة المعلومات</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      <button type="submit" class="btn btn-primary mt-3">إرسال المطلب</button>
                                                    </form>
                                                  
                                                







                                            </div>


                                            
                                                <!-- Gmara -->
                                                <div class="tab-pane fade" id="v-pills-profile2" role="tabpanel" aria-labelledby="v-pills-profile2-tab" >
                                                <div class="col-xl-12  col-md-12" >

                                <div class="mail-box-container" style="margin-left: -100%;
  ">
                                    <div class="mail-overlay" ></div>

                                    

                                    <div id="mailbox-inbox" class="accordion mailbox-inbox">

                                       
                                
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
                        </div>

                        
                        </div>

                    </div>

                </div>
                
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        $("#theSelect").change(function(){          
    var value = $("#theSelect option:selected").val();
    var theDiv = $(".is" + value);
    
    theDiv.slideDown().removeClass("hidden");
    theDiv.slideDown(function() { $(this).find('input').attr("disabled", false); });
    theDiv.siblings('[class*=is]').slideUp(function() { $(this).addClass("hidden");});
    theDiv.siblings('[class*=is]').slideUp(function() { $(this).find('input').attr("disabled", true);});
});
$("#theSelect1").change(function(){          
    var value = $("#theSelect1 option:selected").val();
    var theDiv = $(".is" + value);
    
    theDiv.slideDown().removeClass("hidden");
    theDiv.slideDown(function() { $(this).find('input').attr("disabled", false); });
    theDiv.siblings('[class*=is]').slideUp(function() { $(this).addClass("hidden");});
    theDiv.siblings('[class*=is]').slideUp(function() { $(this).find('input').attr("disabled", true);});
});


        // Disable form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
        
        </script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/input-mask/input-mask.js"></script>
</body>
</html>