<?php

DatabaseConnect();
$messages = new TTextList($GLOBALS['connection']);

?>

<section class="user-s1 bg-light-green grid-x grid-padding-x align-center align-bottom minh-340px">
    <div class="cell small-10 medium-6 text-center text-shadow padding-1">
        <h2 class="h3 text-white font-bold">Case data</h2>   
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
                        <input class="secondary button w-100"
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
                                name="casesearch"
                                tabindex="2"
                                type="submit">
                                Search
                            </button>  
                        </div>
                    </div>    
                    <div class="w-100 padding-vertical-1">   
                        <button class="button small secondary hollow float-right"
                            name="cases"
                            type="submit">
                            Back to list
                        </button>    
                    </div>
                    <div class="grid-x">
                        <div class="small-12">
                            <table class="table hover">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center">Case data</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                        if(isset($_POST["caseinfo"])){
                                            $tab = $messages->getById(htmlspecialchars($_POST["caseinfo"]));
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