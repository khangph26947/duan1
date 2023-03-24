<?php

function loadall_taikhoan(){
    $sql="select*from user order by id desc";
    $listtaikhoan=pdo_query($sql);
    return $listtaikhoan;
}
function insert_taikhoan($email,$user,$pass,$address){
    $sql="insert into user(email,user,pass,address) values('$email','$user','$pass','$address')";
    pdo_execute($sql);
}
function checkuser1($user,$pass){
    $sql="select*from user where user='".$user."' AND pass='".$pass."' " ;
    $sp= pdo_query_one($sql);
    return $sp;
}
function checkemail($email){
    $sql="select*from user where email='".$email."' " ;
    $sp= pdo_query_one($sql);
    return $sp;
}
function update_taikhoan($id,$user,$pass,$email,$address,$role){
   
    $sql="update user set  user='".$user."',pass='".$pass."',email='".$email."',address='".$address."',role='".$role."' where id=".$id;

     pdo_execute($sql);
 }



 
?>