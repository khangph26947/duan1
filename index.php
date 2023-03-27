
<?php
session_start();
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
ob_start();

include "model/pdo.php";
include "model/danhmuc.php";
include "model/donhang.php";
include "global.php";
include "model/sanpham.php";
include "model/user.php";
include 'view/header.php';
$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top10();
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'dangxuat':
            session_unset();
            header('Location:index.php');       
            
            break;
        case 'about':
            include 'view/about.php';
            break;
        case 'dangky':
            if(isset($_POST['dangky'])&&($_POST['dangky'])){
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                insert_user($email,$user,$pass,$address,$tel);

                $thongbao= " Đã đăng ký thành công";

            }
            
            include 'view/taikhoan/dangky.php';
            break;

            case 'dangnhap':
                if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])){
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $checkuser = check_user($user, $pass);
                    if(is_array($checkuser)){
                        $_SESSION['user'] = $checkuser;
                        echo "Đăng nhập thành công";
                        header('Location: index.php');
                        exit();
                    }else{
                    echo "Lỗi";
                    }
                }
                include "view/taikhoan/login.php";
                break;
                case 'edit_taikhoan':
                    if ((isset($_POST['capnhat'])) && ($_POST['capnhat'])) {
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $tel = $_POST['tel'];
                        $id = $_POST['id'];
                        update_user($id,$user,$pass,$email,$address,$tel);
                        $_SESSION['user'] = check_user($user, $pass);
                        header('location: index.php?act=edit_taikhoan');
                        $thongbao= " Cập nhật thành công";
                        
                    }
            include 'view/taikhoan/edit_taikhoan.php';
            break;
            case 'quenmk':
                if ((isset($_POST['guiemail'])) && ($_POST['guiemail'])) {
                    $email = $_POST['email'];

                    $checkemail=checkemail($email);
                    if(is_array($checkemail)) {
                        $thongbao="Mật khẩu của bạn là:" .$checkemail['pass'];
                    }else{
                        $thongbao="Email không tồn tại";
                    }              
                }
    include 'view/taikhoan/quenmk.php';
    break;
        case 'lienhe.php':
            include 'view/lienhe.php';
            break;
        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "" > 0)) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);


            include "view/sanpham.php";

            break;

        case 'sanphamct':

            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                $sp_cungloai = load_sanpham_cungloai($id, $iddm);


                include "view/sanphamct.php";
            } else {
                include "view/home.php";
            }

            break;
        case 'addcart':
            //lay du lieu tu form de luu vao gio hang
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                if(isset($_POST['sl'])&&($_POST['sl']>0)){
                    $sl=$_POST['sl'];
                }else{
                    $sl=1;
                }
               
                $fg=0;
                //kiểm tra sản phẩm có tồn tại trong giỏ hang hay không
                //nếu có chỉ cập nhật lại số lượng còn ntguowcj lại thì add mới sp vào giỏ hàng
               $i=0;
                foreach ( $_SESSION['giohang'] as $item) {
                   if($item[1]=== $name){
                    $slnew=$sl+$item[4];
                    $_SESSION['giohang'][$i][4]=$slnew;
                    $fg=1;
                    break;
                   }
                   $i++;
                }
                //khởi tạo một mảng con
                if($fg==0){
                    $item = array($id, $name, $img, $price,$sl);
                    $_SESSION['giohang'][]=$item;
                }
               
               // header('location: index.php?act=viewcart');
            }
            //view gior hang len
            include 'view/viewcart.php';
            break;

            
        case 'delcart':
            if(isset($_GET['i'])&&($_GET['i'])>0){
                if(isset($_SESSION['giohang'])&&(count($_SESSION['giohang'])>0));
                array_splice( $_SESSION['giohang'],$_GET['i'],1);
               
            }else{
                if(isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
            }
           
            if(isset($_SESSION['giohang'])&&(count($_SESSION['giohang'])>0)){
                header('location:index.php?act=addcart');
            }else{
                header('location:index.php');
            }
           
            break;
            case 'thanhtoan':
                if(isset($_POST['thanhtoan'])&&($_POST['thanhtoan'])){
                    //lấy dữ liệu
                    $tongdonhang=$_POST['tongdonhang'];
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $pttt=$_POST['pttt'];
                    $madh="KT".rand(0,999999);
                    //add đơn hàng
                    //và trả về một iddh
                    
                    $iddh=taodonhang($madh,$tongdonhang,$pttt,$name,$address,$email,$tel);
                   $_SESSION['iddh']=$iddh;
                    if(isset($_SESSION['giohang'])&&(count($_SESSION['giohang'])>0)){
                        foreach ($_SESSION['giohang'] as $item) {
                           addtocart($iddh,$item[0],$item[1],$item[2],$item[3],$item[4]);
                        }
                        unset($_SESSION['giohang']);
                        
                    }
  
                   
                }
                include 'view/donhang.php';
                break;

        default:
            include 'view/home.php';
            break;
    }
} else {
    include 'view/home.php';
}



include "view/fooder.php";
?>