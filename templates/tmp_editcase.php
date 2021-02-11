<?php

//initial config
DatabaseConnect();
$prt = new TTextList($GLOBALS['connection']);
$pid="";
$ptitle = "";
$pcat = "";
$pdesc = "";

$catVal=array(
    "All"=>0,
    "Personal Services"=>1,
    "Small Business"=>2,
    "Corporate Finance"=>3,
    "Tax Services"=>4,
    "Consulting"=>5
);

//handle page related actions
if(isset($_POST["editcase"])){
    $prt->getById(htmlspecialchars($_POST["editcase"]));
    $pid = $prt->getData("id");
    $ptitle = $prt->getData("title");
    $pcat = $prt->getData("category");
    $pdesc = $prt->getData("description");
}
else if(isset($_POST["saveitem"])
&& isset($_POST["ptitle"])
&& isset($_POST["pcat"])
&& isset($_POST["pdesc"])
&& !empty($_POST["ptitle"])
&& !empty($_POST["pcat"])
&& !empty($_POST["pdesc"])){
    if(isset($_POST["pid"])){
        $prt->setData("id",htmlspecialchars($_POST["pid"]));
    }    
    $prt->setData("title",htmlspecialchars($_POST["ptitle"]));
    $prt->setData("category",array_flip($catVal)[htmlspecialchars($_POST["pcat"])]);        
    $prt->setData("description",htmlspecialchars($_POST["pdesc"]));    
    $prt->save();
}

?>


<section class="user-s1 bg-light-green grid-x grid-padding-x align-center align-bottom minh-340px">
    <div class="cell small-10 medium-6 text-center text-shadow padding-1">
        <h2 class="h3 text-white font-bold">Add / modify case</h2>   
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
                <div class="card minh-75vh border-gray">
                    <div class="card-divider border-b border-gray">
                            Add / modify case data
                    </div>
                    <div class="grid-x padding-1">
                        <input type="hidden" 
                            name="pid" 
                            value="<?php echo $pid; ?>">
                        <div class="grid-x w-100">
                            <label class="small-12 medium-4 large-3 pt-1">Title:</label>
                            <div class="small-12 medium-8 large-9">
                                <input class="text-center"
                                    name="ptitle"
                                    type="text"
                                    maxlength="100"
                                    tabindex="1"
                                    value="<?php echo $ptitle; ?>">
                            </div>
                        </div>
                        <div class="grid-x w-100">
                            <label class="small-12 medium-4 large-3 pt-1">Category:</label>
                            <div class="small-12 medium-8 large-9">
                                <select class="w-100"
                                    name="pcat"
                                    tabindex="2">
                                    <option value="0" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="0")echo "selected"; ?>>
                                        All
                                    </option>
                                    <option value="1" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="1")echo "selected"; ?>>
                                        Personal Services
                                    </option>
                                    <option value="2" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="2")echo "selected"; ?>>
                                        Small Business
                                    </option>
                                    <option value="3" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="3")echo "selected"; ?>>
                                        Corporate Finance
                                    </option>
                                    <option value="4" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="4")echo "selected"; ?>>
                                        Tax Services
                                    </option>
                                    <option value="5" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="5")echo "selected"; ?>>
                                        Consulting
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="grid-x w-100">
                            <label class="small-12 medium-4 large-3 pt-1">Title:</label>
                            <div class="small-12 medium-8 large-9">
                                <textarea class="text-left"
                                    name="pdesc"
                                    maxlength="250"
                                    tabindex="3"><?php echo $pdesc; ?></textarea>
                            </div>
                        </div>
                        <div class="grid-x w-100 border-b border-gray">
                            <small class="text-gray">
                                *Fields cannot be empty, otherwise changes will not be saved
                            </small>                            
                        </div>
                        <div class="w-100 padding-1">
                            <button class="button hollow secondary float-left"
                                name="cases"
                                tabindex="7"
                                type="submit">
                                Back
                            </button>
                            <button class="button hollow secondary float-right"
                                name="saveitem"
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