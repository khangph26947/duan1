<?php
function taodonhang($madh,$tongdonhang,$pttt,$name,$address,$email,$tel,$status){
    $connect=pdo_get_connection();
    $sql="insert into orderby(madh,tongdonhang,pttt,name,address,email,tel,status) 
    values('".$madh."','".$tongdonhang."','".$pttt."','".$name."','".$address."','".$email."','".$tel."','".$status."')";
   $connect->exec($sql);
    $last_id = $connect->lastInsertId();
    return $last_id;
}
function addtocart($iddh,$idpro,$tensp,$img,$dongia,$soluong,$value){
    $connect=pdo_get_connection();
    $sql="insert into card(iddh,idpro,tensp,img,dongia,soluong,value) 
    values('".$iddh."','".$idpro."','".$tensp."','".$img."','".$dongia."','".$soluong."','".$value."')";
   $connect->exec($sql);

}

function getshowcart($iddh){
   
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM card where iddh=".$iddh);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getbill($iduser=-1){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM card where iduser=".$iduser);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;

};
function getbilladmin($id){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM orderby where id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetch();
    return $kq;
}
function getorderinfo($iddh){
   
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM orderby where id=".$iddh);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function loadall_donhang($iduser)
{
    $sql = "SELECT * FROM orderby where 1";
    if ($iduser > 0) {
        $sql .= " WHERE iduser=" . $iduser;
    }
    $sql .= " ORDER BY id DESC";
    $listdh = pdo_query($sql);
    return $listdh;
}
// function loadall_donhang(){
//     $sql="select*from orderby order by id desc";
//     $listdh=pdo_query($sql);
//     return $listdh;
// }

function delete_donhang($id){
    $sql="delete from orderby where id=".$id;
   pdo_execute($sql);
}

function xoadonhang(){
    $sql="select*from orderby order by id desc";
    $listdh=pdo_query($sql);
    return $listdh;
}

// function get_ttdh($n){
//     switch ($n) {
//         case '1':
//            $tt="đơn hàng mới";
//             break;
//             case '2':
//                 $tt="đơn hàng đang xử lý";
//                  break;
//                  case '1':
//                     $tt="đơn hàng đang giao";
//                      break;
//                      case '1':
//                         $tt="đơn hàng hoàn tất";
//                          break;
        
//         default:
//         $tt="đơn hàng mới";
//             break;
//     }
//     return $tt;
// }

// function getall_sp(){
//     $conn=connectdb();
//     $stmt = $conn->prepare("SELECT * FROM tbl_sanpham");
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $kq=$stmt->fetchAll();
//     return $kq;
// }


?>

