<?php

function createAdminAccount($passA,$mailA,$pinA){
    DatabaseConnect();
    $usr = new TUser($GLOBALS['connection']);   
    $usr->setData("username","administrator");
    $usr->setData("password",sha1($passA));
    $usr->setData("email",$mailA);
    $usr->setData("pin",$pinA);
    $usr->saveUser();
}

function resetUserCounter(){
    DatabaseConnect();
    $stmt = $GLOBALS['connection']->prepare("alter table ".DB_PREFIX."users auto_increment=1");
    $stmt->execute();   
}

function resetCasesCounter(){
    DatabaseConnect();
    $stmt = $GLOBALS['connection']->prepare("alter table ".DB_PREFIX."cases auto_increment=1");
    $stmt->execute();   
}
//resetUserCounter();
//resetCasesCounter();
//createAdminAccount("password","admin@mussodent.com","9731");

?>