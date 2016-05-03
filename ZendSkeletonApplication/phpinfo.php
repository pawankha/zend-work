<?php

$conn=mysql_connect('localhost','dashboard','Q5MapQQd');
if(isset($conn))
{
    echo "connected";
    $db=mysql_select_db("dashboard");
    if(isset($db))
    {
        //$slq="select * from manage_otp";
        //$query=mysql_query($slq);
        //$result=mysql_fetch_array($query);
        //print_r($result);die;
        echo "database selected";
    }
    else
    {
        
        echo "Not select db";
        }
    
}else{
    
    echo "Not connected";
}
echo phpinfo();
?>