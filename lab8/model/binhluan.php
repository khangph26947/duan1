<?php
function insert_binhluan($name, $noidung, $iduser, $idpro, $ngaybinhluan)
{
    $sql = "insert into binhluan(name,noidung,iduser,idpro,ngaybinhluan) values('$name','$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
}
function loadall_binhluan($idpro) 
{
    $sql="select*from binhluan where 1";
    if($idpro>0) $sql.=" AND idpro='".$idpro."'";
    $sql.=" order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}

function delete_binhluan($id){
    $sql="delete from binhluan where id=".$id;
   pdo_execute($sql);
}

function xoabinhluan(){
    $sql="select*from binhluan order by id desc";
    $listbinhluan=pdo_query($sql);
    return $listbinhluan;
}
?>

