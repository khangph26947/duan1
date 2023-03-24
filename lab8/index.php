
<?php
session_start();
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
ob_start();

include "model/pdo.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
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
        case 'thoat':
            if (isset($_SESSION['role']))

                unset($_SESSION['role']);
            unset($_SESSION['iduser']);
            unset($_SESSION['username']);
            unset($_SESSION['address']);
            unset($_SESSION['email']);
            header('location:index.php');
            break;
        case 'about':
            include 'view/about.php';
            break;
        // case 'dangky':
        //     include 'view/dangky.php';
        //     break;
        case 'dangnhap':
            include 'view/dangnhap.php';
            break;

        case 'login':
            if (isset($_POST['login']) && ($_POST['login'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $kq = getuserinfo($user, $pass);
                $role = $kq[0]['role'];
                if ($role == 1) {
                    $_SESSION['role'] = $role;
                    header('location:admin/index.php');
                } else {
                    $_SESSION['role'] = $role;
                    $_SESSION['iduser'] = $kq[0]['id'];
                    $_SESSION['username'] = $kq[0]['user'];
                    $_SESSION['address'] = $kq[0]['address'];
                    $_SESSION['email'] = $kq[0]['email'];
                    header('location:index.php');
                    break;
                }
            }

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
                    // if($name ==""){
                    //     echo "bạn cần nhập user";
                    // }
                    // if($address==""){
                    //     echo "bạn cần nhập địa chỉ";
                    // }

                              
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





                case 'edit_taikhoan':
                    if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                    
                        $role = $_POST['role'];
                        $id = $_POST['id'];
                        update_taikhoan($id, $user, $pass, $email, $address, $role);
                        $_SESSION['user'] = checkuser1($user, $pass);
                        header('location:index.php?act=edit_taikhoan');
                        // $thongbao="đã đăng nhập thành công";
        
                    }
                    include "view/taikhoan/edit_taikhoan.php";
                    break;
        
                case 'dangky':
                    if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                        $email = $_POST['email'];
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $address = $_POST['address'];
                        insert_taikhoan($email,$user,$pass,$address);
                        $thongbao = "đã đăng ký thành công.
                                   Vui lòng đăng nhập để thực hiện chức 
                                   năng bình luận hoặc đặt hàng";
                    }
                    include "view/taikhoan/dangky.php";
                    break;
                case 'quenmk':
                    if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
        
                        $email = $_POST['email'];
                        $checkemail = checkemail($email);
                        if (is_array($checkemail)) {
                            $thongbao = "Mật Khẩu Cùa Bạn Là:" . $checkemail['pass'];
                        } else {
                            $thongbao = "Email Này Không Tồn Tại";
                        }
                    }
                    include "view/taikhoan/quenmk.php";
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