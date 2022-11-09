<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();   
}

include_once "php/comm.php";
include_once "php/db.php";
include_once "php/t_text_list.php";
include_once "php/t_message.php";
include_once "php/t_user.php";

//to remove after pub
//include_once "php/support.php";
//createAdminAccount("password","admin@mussodent.com","9731");

if(isset($_POST["username"])
&& isset($_POST["userpass"])){
    DatabaseConnect();
    $usr = new TUser($GLOBALS['connection']);   
    $usr->getByName(htmlspecialchars($_POST["username"]));
    if($usr->getData("username")===htmlspecialchars($_POST['username'])
    && $usr->getData("password")===sha1(htmlspecialchars($_POST['userpass']))
    ){
        $_SESSION["UserLogged"] = $usr->getData("username");
    }
}

if(isset($_SESSION["UserLogged"])){
    //reading view config
    if(isset($_POST["login"])){
        $_SESSION["view"] = "dashboard";
    }
    if(isset($_POST["cases"])){
        $_SESSION["view"] = "cases";
    }
    if(isset($_POST["caseinfo"])){
        $_SESSION["view"] = "caseinfo";
    }
    if(isset($_POST["casesearch"])){
        $_SESSION["view"] = "casesearch";
    }
    if(isset($_POST["dashboard"])){
        $_SESSION["view"] = "dashboard";
    }
    if(isset($_POST["editcase"])){
        $_SESSION["view"] = "editcase";
    }
    if(isset($_POST["edituser"])){
        $_SESSION["view"] = "edituser";
    }
    if(isset($_POST["msginfo"])){
        $_SESSION["view"] = "msginfo";
    }
    if(isset($_POST["msgsearch"])){
        $_SESSION["view"] = "msgsearch";
    }
    if(isset($_POST["messages"])){
        $_SESSION["view"] = "messages";
    }
    if(isset($_POST["users"])){
        $_SESSION["view"] = "users";
    }
    if(isset($_POST["logout"])){
        $_SESSION["view"] = "logout";
    }    
    //template selection and config
    if(isset($_SESSION["view"])){
        switch($_SESSION["view"]){
            case "cases":
                $_SESSION["viewTemplate"] = "templates/tmp_cases.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "caseinfo":
                $_SESSION["viewTemplate"] = "templates/tmp_case_info.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "casesearch":
                $_SESSION["viewTemplate"] = "templates/tmp_cases.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "dashboard":
                $_SESSION["viewTemplate"] = "templates/tmp_dashboard.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "editcase":
                $_SESSION["viewTemplate"] = "templates/tmp_editcase.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "edituser":
                $_SESSION["viewTemplate"] = "templates/tmp_edituser.php";
                break;
            case "msginfo":
                $_SESSION["viewTemplate"] = "templates/tmp_message_info.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "msgsearch":
                $_SESSION["viewTemplate"] = "templates/tmp_messages.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "messages":
                $_SESSION["viewTemplate"] = "templates/tmp_messages.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "users":
                $_SESSION["viewTemplate"] = "templates/tmp_users.php";
                $_SESSION["CurrentPage"]=1;
                break;
            default: 
                $_SESSION["viewTemplate"] = "templates/tmp_login.php";     
                $_SESSION = array();
                session_destroy(); 
        }
    }
}
else{
    $_SESSION["viewTemplate"] = "templates/tmp_login.php";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <meta property="og:title" content="Finance Advisor">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:locale" content="en_US">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/styles.min.css">
    <title>Finance Advisor | Best finance advisors</title>
</head>
<body>
    <header class="header bg-white shadow padding-1">
        <nav class="bg-transparent">
            <div class="title-bar align-right bg-transparent hide-for-medium align-justify" data-responsive-toggle="responsive-menu" data-hide-for="medium">
                <a href="index.html">
                    <img src="img/navbar_logo.png" alt="logo" class="float-left">
                    <div class="display-inline-block text-light-green font-bold font-logo margin-left-1">
                        Finance Advisor
                    </div>
                </a>
                <button class="text-red outline-none" type="button" data-toggle="responsive-menu">
                    <span class="fa fa-bars text-green icon"></span>
                </button>
            </div>
            <div class="top-bar bg-transparent grid grid-x flex-wrap padding-0" id="responsive-menu">
                <div class="top-bar-left small-12 margin-bottom-1 show-for-medium border-b border-light-green margin-bottom-0 padding-bottom-1">
                    <a href="index.html">
                        <img src="img/navbar_logo.png" alt="logo" class="float-left">
                        <div class="display-inline-block text-light-green font-bold font-logo margin-left-1">
                            Finance Advisor
                        </div>
                    </a>
                </div>
                <div class="top-bar-right small-12">                    
                    <ul class="dropdown menu align-right bg-transparent nav-menu" data-dropdown-menu>
                        <li class="nav-item">
                            <a href="index.html" class="text-green font-bold hover-light-green">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="services.html" class="text-green font-bold hover-light-green">
                                Services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="case-study.html" class="text-green font-bold hover-light-green">
                                Case Study
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="about.html" class="text-green font-bold hover-light-green">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.html" class="text-green font-bold hover-light-green">
                                Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="user.php" class="text-green font-bold hover-light-green">
                                <span class="fa fa-user-o"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="minh-100vh">
        <?php
        if(isset($_SESSION["viewTemplate"])){
            include $_SESSION["viewTemplate"]; 
        }
        else{
            include "templates/tmp_login.php";                            
        }
        ?>
    </main>   
    <footer class="grid-x grid-padding-x align-center align-middle bg-green text-white padding-1">
        <div class="cell small-12 padding-1 grid-x">
            <div class="cell small-12 flex text-left">
                <img src="img/navbar_logo.png" alt="logo" class="">
                <div class="display-inline-block text-white font-logo margin-left-1 align-self-bottom">
                    Finance Advisor
                </div>
            </div>
            <div class="cell small-12 padding-1">
                <address class="text-white">
                    731th Street Garte, New York<br/>
                    finance.advisor&#64;advisor.mail<br/>
                    +(00) 764 345 123
                </address>
            </div>
        </div>
        <div class="cell small-12">
            <div class="menu align-center bg-transparent text-center">
                <a href="index.html" class="text-white font-bold hover-underline">
                    Home
                </a>
                <a href="services.html" class="text-white font-bold hover-underline">
                    Services
                </a>
                <a href="case-study.html" class="text-white font-bold hover-underline">
                    Case Study
                </a>
                <a href="about.html" class="text-white font-bold hover-underline">
                    About
                </a>
                <a href="contact.html" class="text-white font-bold hover-underline">
                    Contact
                </a>
                <a href="user.html" class="text-white font-bold hover-underline">
                    <span class="fa fa-user-o"></span>
                </a>                
            </div>
        </div>
        <div class="cell small-12 margin-0 text-center font-bold border-t border-light-green">
            <small class="text-white">
                Copyright &copy; 2020-2021 Tomasz Pankowski. All rights reserved.
                <a class="text-white hover-underline" href="privacy.html">Privacy policy</a>
            </small>
        </div>
    </footer>
    <script src="js/main.min.js"></script>
</body>
</html>