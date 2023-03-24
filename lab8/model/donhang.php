<?php
function taodonhang($madh,$tongdonhang,$pttt,$name,$address,$email,$tel){
    $connect=pdo_get_connection();
    $sql="insert into orderby(madh,tongdonhang,pttt,name,address,email,tel) 
    values('".$madh."','".$tongdonhang."','".$pttt."','".$name."','".$address."','".$email."','".$tel."')";
   $connect->exec($sql);
    $last_id = $connect->lastInsertId();
    return $last_id;
}
function addtocart($iddh,$idpro,$tensp,$img,$dongia,$soluong){
    $connect=pdo_get_connection();
    $sql="insert into card(iddh,idpro,tensp,img,dongia,soluong) 
    values('".$iddh."','".$idpro."','".$tensp."','".$img."','".$dongia."','".$soluong."')";
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
function getorderinfo($iddh){
   
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM orderby where id=".$iddh);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
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

