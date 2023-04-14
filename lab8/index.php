
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

include "model/PHPMailer-master/src/PHPMailer.php";
include "model/PHPMailer-master/src/Exception.php";
//  include "model/PHPMailer-master/src/POP3.php";
 include "model/PHPMailer-master/src/SMTP.php";

// use PHPMailer\P;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);




// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
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
                $value = $_POST['value'];
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
                    $item = array($id, $name, $img, $price,$sl,$value);
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
                    // $error = [];
                    // if (empty($name)) {
                    //     $error['name'] = "Trường này không được để trống";
                    // }
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $pttt=$_POST['pttt'];
                    $status='chờ xử lý';
                    $madh="KT".rand(0,999999);

                    try {
                        // Server settings
                        $mail->CharSet = "UTF-8";
                        $mail->Encoding = 'base64';
                        // $mail->SMTPDebug = 0;                                 // bật tính năng gửi success or faild thì vẫn show thông tin mail để ta cấu hình
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = 'duckhangnguyen842003@gmail.com';                 // SMTP username
                        $mail->Password = 'ufgrnshcpzzqarjq';                           // SMTP password
                        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, ssl also accepted
                        $mail->Port = 587;                                    // TCP port to connect to
                    
                        //Recipients
                        $mail->setFrom('duckhangnguyen842003@gmail.com', 'shop thời trang');
                        $mail->addAddress($email, $name );   
                           // Name is optional
                        // $mail->addCC('phamngockhanh29703@gmail.com');
                    
                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'bạn đã đặt hàng thành công , Mã đơn hàng của bạn là:' .$madh.'  Và số tiền bạn cần thanh toán khi nhận hàng là:'.$tongdonhang ;
    
                    
                        $body = "bạn đã đặt hàng thành công  ";
                        // $body .= '<p>Xin chào,</p>' ;
                       
                       
                        // $body .= '<p>Nếu bạn đã yêu cầu đặt lại mật khẩu, hãy ấn vào <a href="change_passowrd.php"><h3 style="color: green;">tại đây</h3></a> để tạo mật khẩu mới để vào tài khoản XOSS Shop của bạn.</p>';
                        // $body .= '<p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.</p>';
                        // $body .= 'Nếu bạn gặp phải bất cứ vấn đề nào khi đăng nhập vào tài khoản XOSS Shop, vui lòng gửi mail đến địa chỉ: hungdang02042003@gmail.com</pre>';
                        $body .= '<p>Trân trọng.</p>';
                    
                        // $mail->Body    = 'Mat khau moi cua ban la: ' . $forget_password;
                        $mail->Body = $body;
                    
                        $mail->send();
                        echo '';
                    } catch (Exception $e) {
                        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                    } 
                  
                    $iddh=taodonhang($madh,$tongdonhang,$pttt,$name,$address,$email,$tel,$status);
                   $_SESSION['iddh']=$iddh;
                    if(isset($_SESSION['giohang'])&&(count($_SESSION['giohang'])>0)){
                        foreach ($_SESSION['giohang'] as $item) {
                           addtocart($iddh,$item[0],$item[1],$item[2],$item[3],$item[4],$item[5]);
                        
                        unset($_SESSION['giohang']);
                        
                    }
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
                    case 'mybill':
                        if (isset($_POST['timkiem']) && ($_POST['timkiem'])) {
                            $kyw = $_POST['kyw'];
                            
                        } else {
                            $kyw = '';
                          
                        }
                       $listcart=loadall_bill($kyw);
                        // print_r($listcart);
                        include "view/mybill.php";
                        break;

                        case 'xoadh':
                            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                               // delete_danhmuc($_GET['id']);
                               update_status_dh($_GET['id'],'yeu cau huy');
                            }
                            $listcart=loadall_bill();
                            include "view/mybill.php";
                            break;

                            case 'listcard':
                                if (isset($_POST['listok']) && ($_POST['listok'])) {
                                    $kyw = $_POST['kyw'];
                                    $madh = $_POST['madh'];
                                } else {
                                    $kyw = '';
                                    $madh = '';
                                }
                                $listcart=loadall_bill();
                                $listcard = loadall_cart($kyw, $madh);
                                include "view/chitietdh.php";
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