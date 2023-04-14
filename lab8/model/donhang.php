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
// function getbill($iduser=0){
//     $conn = connectdb();
//     $stmt = $conn->prepare("SELECT * FROM orderby where iduser=".$iduser);
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $kq=$stmt->fetchAll();
//     return $kq;

// }
function loadall_bill($kyw=""){
    $sql="select*from orderby where 1";
    if($kyw!=""){
        // tìm theo tên 
        $sql.=" and madh like '%".$kyw."%'";
    }
    $sql.=" order by id desc";
    $listbill=pdo_query($sql);
    return $listbill;
}
function loadall_cart( $kyw="", $iddh=0){
    $sql="select*from card where 1";
    if($kyw!=""){
        // tìm theo tên 
        $sql.=" and tensp like '%".$kyw."%'";
    }

    if($iddh>0){
        $sql.=" and iddh like '%".$iddh."%'";
    }

    $sql.=" order by id desc";
    $listcard=pdo_query($sql);
    return $listcard;
}
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

function update_status_dh($id,$status){
    $sql="update orderby set status='".$status."'where id=".$id;
     pdo_execute($sql);
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
function loadall_thongke(){
    $sql="select danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
    $sql.=" from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
    $sql.=" group by danhmuc.id order by danhmuc.id desc";
    $listtk = pdo_query($sql);
    return $listtk;
}


?>

