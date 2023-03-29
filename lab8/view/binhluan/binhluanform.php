<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";

$idpro = $_REQUEST['idpro'];
$dsbl = loadall_binhluan($idpro);

function push_notification($type, $msgs)
{
    if (!isset($_SESSION["notification"])) $_SESSION["notification"] = [];
    $data = [];
    $data["type"] = $type;
    $data["msgs"] = $msgs;
    $_SESSION["notification"][] = $data;
}

function get_notification()
{
    if (!isset($_SESSION["notification"])) $_SESSION["notification"] = [];
    $notification = $_SESSION["notification"];
    unset($_SESSION["notification"]);
    return $notification;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style2.css">
    <style>
        .boxbl {
            border: 1px solid #ccc;
            background-color: #fff;
            margin-top: 20px;
        }

        .bl h3 {
            border-bottom: 1px solid #ccc;
            padding: 12px 5px;
            background-color: #f2f2f2;
        }

        .binhluan {
            margin-top: -20px;
            margin-left: 30px;
        }

        .binhluan table {
            width: 100%;
        }

        .binhluan table td:nth-child(1) {
            width: 35%;
        }

        .binhluan table td:nth-child(2) {
            width: 35%
        }

        .binhluan table td:nth-child(3) {
            width: 30%;
        }

        .timkiem {
            border-top: 1px solid #ccc;
            background-color: #f2f2f2;
            padding: 8px 5px;
        }
    </style>


</head>

<body>
    <div class="boxbl">
        <div class="left-side bl">
            <h3 class="sear-head ">Bình luận</h3>
            <div class="w3layouts-box-list binhluan">
                <table>
                    <?php

                    foreach ($dsbl as $bl) {
                        extract($bl);
                        echo '<tr><td><span class="span">' . $noidung . '</span></td>';
                        echo '<td><span class="span">' . $name . '</span></td>';
                        echo '<td><span class="span">' . $ngaybinhluan . '</span></td></tr>';
                    }
                    ?>
                </table>
                <!-- echo "Nội dung bình luận ở đây: ".$idpro; -->

            </div>
        </div>

        <div class="search-bar w3layouts-newsletter timkiem">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="d-flex">
                <input type="hidden" name="idpro" value="<?= $idpro ?>">

                <input type="text" name="noidung">
                <input type="submit" name="guibinhluan" value="Gửi bình luận">
            </form>
            <div>
                <?php $notifications = get_notification(); ?>
                <?php foreach ($notifications as $notification) : ?>
                    <div class="m-[10px] text-[red]">
                        <?php foreach ($notification['msgs'] as $msg) : ?>
                            <div class="<?php echo $notification['type'] ?>"><?php echo $msg ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php
        if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
            if (isset($_SESSION['username'])&&($_SESSION['address'])&&($_SESSION['email'])) {
                $noidung = $_POST['noidung'];
                $idpro = $_POST['idpro'];
                $iduser = $_SESSION['iduser'];
                $name = $_SESSION['username'];
                $ngaybinhluan = date('h:i:sa d/m/Y');
                insert_binhluan($name, $noidung, $iduser, $idpro, $ngaybinhluan);
                unset($_SESSION['errcmt']);
                header("location: " . $_SERVER['HTTP_REFERER']);
             } else {
                push_notification('errors', [
                    'name' => 'Bạn phải đăng nhập để bình luận'
                ]);
                header("location: " . $_SERVER['HTTP_REFERER']);
            }
        }

        ?>
    </div>



</body>

</html>