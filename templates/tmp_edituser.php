<?php

//initial config
DatabaseConnect();
$usr = new TUser($GLOBALS['connection']);
$uid="";
$uname = "";
$upass = "";
$umail = "";

//handle page related actions
if(isset($_POST["edituser"])){
    $usr->getById(htmlspecialchars($_POST["edituser"]));
    $uid = $usr->getData("id");
    $uname = $usr->getData("username");
    $upass = $usr->getData("password");
    $umail = $usr->getData("email");
}
else if(isset($_POST["saveuser"])
&& isset($_POST["usrname"])
&& isset($_POST["usrpass"])
&& isset($_POST["usremail"])
&& !empty($_POST["usrname"])
&& !empty($_POST["usrpass"])
&& !empty($_POST["usremail"])){
    if(isset($_POST["usrid"])){
        $usr->setData("id",htmlspecialchars($_POST["usrid"]));
    }
    $usr->setData("username",htmlspecialchars($_POST["usrname"]));
    $usr->setData("password",sha1(htmlspecialchars($_POST["usrpass"])));        
    $usr->setData("email",htmlspecialchars($_POST["usremail"]));    
    $usr->saveUser();
}

?>



<section class="user-s1 bg-light-green grid-x grid-padding-x align-center align-bottom minh-340px">
    <div class="cell small-10 medium-6 text-center text-shadow padding-1">
        <h2 class="h3 text-white font-bold">Add / modify user</h2>   
    </div>
</section>
<section class="user-s2 align-top">  
    <form action=""
        autocomplete="off"
        class="w-100"
        method="post">   
        <div class="grid-x minh-75vh">
            <div class="small-12 medium-4 large-3 padding-2">            
                <ul class="vertical menu">
                    <li>
                        <input class="hollow secondary button w-100"
                            name="dashboard"
                            type="submit"
                            value="Dashboard">  
                    </li>
                    <li>
                        <input class="hollow secondary button w-100"
                            name="cases"
                            type="submit"
                            value="Cases">     
                    </li>
                    <li>
                        <input class="hollow secondary button w-100"
                            name="messages"
                            type="submit"
                            value="Messages">  
                    </li>
                    <?php 
                        if(isset($_SESSION["UserLogged"])
                        && $_SESSION["UserLogged"]==="administrator"){
                    ?>                      
                    <li>
                        <input class="secondary button w-100"
                            name="users"
                            type="submit"
                            value="Users">          
                    </li>
                    <?php } ?>   
                    <li>
                        <input class="hollow secondary button w-100"
                            name="logout"
                            type="submit"                                
                            value="Logout">                    
                    </li>              
                </ul>
            </div>
            <div class="small-12 medium-8 large-9 padding-2">
                <div class="card minh-75vh border-gray">
                    <div class="card-divider border-b border-gray">
                            Add / modify user
                    </div>
                    <div class="grid-x padding-1">
                        <input type="hidden" 
                            name="usrid" 
                            value="<?php echo $uid; ?>">
                        <div class="grid-x w-100">
                            <label class="small-12 medium-4 large-3 pt-1">User name:</label>
                            <div class="small-12 medium-8 large-9">
                                <input class="text-center"
                                    name="usrname"
                                    type="text"
                                    tabindex="1"
                                    maxlength="30"
                                    value="<?php echo $uname; ?>">
                            </div>
                        </div>
                        <div class="grid-x w-100">
                            <label class="small-12 medium-4 large-3 pt-1">Password:</label>
                            <div class="small-12 medium-8 large-9">
                                <input class="text-center"
                                    name="usrpass"
                                    type="password"
                                    maxlength="40"
                                    tabindex="2"
                                    value="<?php echo $upass; ?>">
                            </div>
                        </div>
                        <div class="grid-x w-100">
                            <label class="small-12 medium-4 large-3 pt-1">Email:</label>
                            <div class="small-12 medium-8 large-9">
                                <input class="text-center"
                                    name="usremail"
                                    type="email"
                                    tabindex="3"
                                    maxlength="100"
                                    value="<?php echo $umail; ?>">
                            </div>
                        </div>
                        <div class="grid-x w-100 border-b border-gray">
                            <small class="text-gray">
                                *Fields cannot be empty, otherwise changes will not be saved
                            </small>
                        </div>
                        <div class="w-100 padding-1">
                            <div class="">
                                <button class="button hollow secondary float-left"
                                    name="users"
                                    tabindex="7"
                                    type="submit">
                                    Back
                                </button>
                            </div>
                            <button class="button hollow secondary float-right"
                                name="saveuser"
                                tabindex="5"
                                type="submit">
                                Save
                            </button>
                            <button class="button hollow secondary float-right"
                                name="clearform"
                                tabindex="6"
                                type="clear">
                                Clear
                            </button>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </form>
</section>