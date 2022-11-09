
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
    <main>
        <section class="user-s2 minh-100vh grid-x align-middle align-center">            
            <div class="cell small-10 medium-7 large-6 padding-1 grid-x align-center">
                <div class="card padding-2 text-center border border-gray mt-top">
                    <h4>Message sent!</h4>
                    <table class="table table-hover border text-left font-menu bg-light opacity-8">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="2" class="text-center">Summary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Full name</td>
                                <td>
                                <?php 
                                    if(isset($_POST['fname']))
                                        echo htmlspecialchars($_POST['fname']);
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>
                                <?php 
                                    if(isset($_POST['fphone']))
                                        echo htmlspecialchars($_POST['fphone']);
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                <?php 
                                    if(isset($_POST['fmail']))
                                        echo htmlspecialchars($_POST['fmail']);
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td>
                                <?php 
                                    if(isset($_POST['fmsg']))
                                        echo htmlspecialchars($_POST['fmsg']);
                                ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="w-100">
                        <a href="contact.html" 
                            class="button hollow secondary">
                            OK
                        </a>
                    </div>
                </div>
            </div>
        </section>
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