<?php

DatabaseConnect();
$usr = new TUser($GLOBALS['connection']);

if(isset($_POST["deleteuser"])){
    $usr->deleteUser(htmlspecialchars($_POST["deleteuser"]));
}

//handle user list pagination
if(!isset($_SESSION["CurrentPage"])){
    $_SESSION["CurrentPage"]=1;
}
else{
    if(isset($_POST["prevpage"])
    && $_SESSION["CurrentPage"]>1){
        $_SESSION["CurrentPage"]--;
    }
    if(isset($_POST["nextpage"])
    && $_SESSION["CurrentPage"]<(ceil($usr->getListLength()/PAGE_SIZE))){
        $_SESSION["CurrentPage"]++;
    }
}

?>


<section class="user-s1 bg-light-green grid-x grid-padding-x align-center align-bottom minh-340px">
    <div class="cell small-10 medium-6 text-center text-shadow padding-1">
        <h2 class="h3 text-white font-bold">Users list</h2>   
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
                <div class="card minh-75vh border-gray padding-1">
                    <div class="grid-x padding-vertical-1">                        
                        <div class="small-12">
                            <div class="float-left">
                                <button class="button hollow secondary small"
                                    name="edituser"
                                    type="submit">
                                    New
                                </button>
                            </div>
                            <div class="float-right">
                                <button class="button hollow secondary small"
                                    name="prevpage"
                                    type="submit">
                                    &lt;
                                </button>
                                <button class="button hollow secondary small" disabled>
                                <?php 
                                    if(isset($_SESSION["CurrentPage"])){
                                        echo $_SESSION["CurrentPage"]." / ".ceil($usr->getListLength()/PAGE_SIZE);
                                    } 
                                ?>
                                </button>
                                <button class="button hollow secondary small"
                                    name="nextpage"
                                    type="submit">
                                    &gt;
                                </button>
                            </div>
                        </div>
                    </div>  
                    <div class="grid-x">
                        <div class="small-12">
                            <small class="text-gray">
                                *Administrator account cannot be changed
                            </small>
                            <table class="table hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th colspan="2">User name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $tab = $usr->getList();
                                    $pstart = ($_SESSION["CurrentPage"]-1)*PAGE_SIZE;
                                    $pend = $pstart+(PAGE_SIZE);
                                    for($i=$pstart;$i<count($tab) && $i<$pend;$i++){
                                        $tabrow = "<tr><td>".$tab[$i][0]."</td>";
                                        $tabrow .= "<td>".$tab[$i][1]."</td><td>";
                                        if($tab[$i][1]!=="administrator"){
                                            $tabrow .= "<button type='submit' name='edituser' class='button small hollow secondary float-right' value='";
                                            $tabrow .= $tab[$i][0]."'>Edit</button>";
                                            $tabrow .= "<button type='submit' name='deleteuser' class='button small hollow secondary float-right' value='";
                                            $tabrow .= $tab[$i][0]."'>&times;</button>";
                                        }
                                        $tabrow .= "</td></tr>";
                                        echo $tabrow;
                                    }
                                ?>     
                                </tbody>
                            </table> 
                        </div>
                    </div>            
                </div>
            </div>
        </div>
    </form>
</section>