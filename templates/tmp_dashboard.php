<section class="user-s1 bg-light-green grid-x grid-padding-x align-center align-bottom minh-340px">
    <div class="cell small-10 medium-6 text-center text-shadow padding-1">
        <h2 class="h3 text-white font-bold">Dashboard</h2>   
    </div>
</section>
<section class="user-s2 align-top">     
    <div class="grid-x minh-75vh">
        <div class="small-12 medium-4 large-3 padding-3">
            <form action=""
                autocomplete="off"
                class="w-100"
                method="post">
                <ul class="vertical menu">
                    <li>
                        <input class="secondary button w-100"
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
            </form>
        </div>
        <div class="small-12 medium-8 large-9 padding-3">
            <div class="card minh-75vh border-gray">
                <div class="w-100 padding-1">
                    <small class="text-dark">Dashboard</small>
                </div>
            </div>
        </div>
    </div>
</section>