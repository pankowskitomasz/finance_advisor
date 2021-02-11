<?php

DatabaseConnect();
$messages = new TMessage($GLOBALS['connection']);

if(isset($_POST["msgdelete"])){
    $messages->deleteMessage(htmlspecialchars($_POST["msgdelete"]));
}

if(isset($_POST["msearch"])){
    $taggedRes = $messages->getByTag($_POST["msearch"]);
}


//handling messages list pagination
if(!isset($_SESSION["CurrentPage"])){
    $_SESSION["CurrentPage"]=1;
}
else{
    if(isset($_POST["prevpage"])
    && $_SESSION["CurrentPage"]>1){
        $_SESSION["CurrentPage"]--;
    }    
    if(isset($_POST["msearch"])){
        if(isset($_POST["nextpage"])
        && $_SESSION["CurrentPage"]<(ceil(count($taggedRes)/PAGE_SIZE))){
            $_SESSION["CurrentPage"]++;
        }
    }
    else{
        if(isset($_POST["nextpage"])
        && $_SESSION["CurrentPage"]<(ceil($messages->getListLength()/PAGE_SIZE))){
            $_SESSION["CurrentPage"]++;
        }
    }
}

?>


<section class="user-s1 bg-light-green grid-x grid-padding-x align-center align-bottom minh-340px">
    <div class="cell small-10 medium-6 text-center text-shadow padding-1">
        <h2 class="h3 text-white font-bold">Messages list</h2>   
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
                        <input class="secondary button w-100"
                            name="messages"
                            type="submit"
                            value="Messages">  
                    </li>
                    <?php 
                        if(isset($_SESSION["UserLogged"])
                        && $_SESSION["UserLogged"]==="administrator"){
                    ?>                      
                    <li>
                        <input class="hollow secondary button w-100"
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
                    <div class="grid-x border-b border-gray text-center">
                        <div class="small-12 medium-3 text-left lead">
                            <p>Find</p>
                        </div>
                        <div class="small-12 medium-6">
                            <input class="form-control text-center"
                                name="msearch"
                                tabindex="1"
                                type="text">
                        </div>
                        <div class="small-12 medium-3">
                            <button class="button hollow secondary"
                                name="msgsearch"
                                tabindex="2"
                                type="submit">
                                Search
                            </button>  
                        </div>
                    </div>    
                    <div class="grid-x padding-vertical-1">                        
                        <div class="small-12">
                            <div class="float-left">
                                <button class="button hollow secondary small"
                                    name="messages"
                                    type="submit">
                                    All
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
                                    if(isset($_POST["msearch"])){
                                        if(isset($_SESSION["CurrentPage"])){
                                            echo $_SESSION["CurrentPage"]." / ".ceil(count($taggedRes)/PAGE_SIZE);
                                        } 
                                    }
                                    else{
                                        if(isset($_SESSION["CurrentPage"])){
                                            echo $_SESSION["CurrentPage"]." / ".ceil($messages->getListLength()/PAGE_SIZE);
                                        }     
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
                            <table class="table hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th class="hide-for-small-only">Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($_POST["msearch"])){
                                            $tab = $taggedRes;
                                        }
                                        else{    
                                            $tab = $messages->getList();
                                        }
                                        $pstart = ($_SESSION["CurrentPage"]-1)*PAGE_SIZE;
                                        $pend = $pstart+(PAGE_SIZE);
                                        for($i=$pstart;$i<count($tab) && $i<$pend;$i++){
                                            echo "<tr>".
                                                "<td>".$tab[$i]["id"]."</td>".
                                                "<td>".ucwords($tab[$i]["firstname"])."</td>".
                                                "<td>".
                                                substr($tab[$i]["time"],8,2).
                                                "-".
                                                substr($tab[$i]["time"],5,2).
                                                "-".
                                                substr($tab[$i]["time"],2,2).
                                                "</td>".
                                                "<td class='pl-0 pr-1'>".
                                                "<button type='submit' name='msgdelete' class='hollow button small secondary float-right' value='".$tab[$i][0]."'>X</button>".
                                                "<button type='submit' name='msginfo' class='hollow button small secondary float-right' value='".$tab[$i][0]."'>i</button>".                                            
                                                "</td></tr>";
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

