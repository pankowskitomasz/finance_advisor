<?php

DatabaseConnect();
$messages = new TMessage($GLOBALS['connection']);

?>


<section class="user-s1 bg-light-green grid-x grid-padding-x align-center align-bottom minh-340px">
    <div class="cell small-10 medium-6 text-center text-shadow padding-1">
        <h2 class="h3 text-white font-bold">Message data</h2>   
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
                            <div class="float-right">
                                <button class="button hollow secondary small"
                                    name="messages"
                                    type="submit">
                                    Back to list
                                </button>
                            </div>
                        </div>
                    </div>  
                    <div class="grid-x">
                        <div class="small-12">
                            <table class="table hover">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center">Message data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($_POST["msginfo"])){
                                            $tab = $messages->getById(htmlspecialchars($_POST["msginfo"]));
                                            if(is_array($tab)){
                                                foreach($tab as $key => $itm){
                                                    echo "<tr>".
                                                        "<td class=\"text-left pl-4 font-weight-bold\">".ucfirst($key)."</td>". 
                                                        "<td>".$itm."</td>".
                                                        "</tr>";
                                                }
                                            }
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


<!--
    
            <div class="col-12 col-sm-8 col-md-9">
                <div class="card w-100 mb-3">
                    <div class="card-body">
                        <label class="">Find message</label>
                        <div class="input-group">
                            <input class="form-control text-center"
                                name="msearch"
                                tabindex="1"
                                type="text">
                            <div class="input-group-append">
                                <button class="btn btn-outline-dark"
                                    name="msgsearch"
                                    tabindex="2"
                                    type="submit">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="btn-group float-right mb-2">
                </div>              
                <div class="card w-100">
                    <div class="card-body p-0">
                        <table class="table table-hover table-striped m-0">
                            <thead class="thead-light text-center">
                                <tr>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            </tbody>
                        </table>                
                    </div> 
                </div>                   
                <div class="btn-group float-right mt-2">
                    <button class="btn btn-sm btn-light"
                        name="messages"
                        type="submit">
                        Back to list
                    </button>
                </div>
            </div>
        </div>
    </form>
</section>  
-->