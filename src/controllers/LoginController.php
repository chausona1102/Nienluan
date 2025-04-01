<?php
namespace App\controllers;
use PDOException;
class LoginController extends Controller {
    public function login() : Returntype {
        $this->sendPage('auth/login');
    }
    public function check() {
        try {
            // Kết nối PDO
            $usern = strim($_POST['username']);
            $pw = $_POST['password'];
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $userMdl = new \App\models\UserModel();
                $user = $userMdl->selectByUserName($usern);
                if(!$user){
                    echo "<h1>Sai tên tài khoản</h1>";
                    echo "<script>setTimeout(()=> {
                        window.location.href = '../page/login.html';
                        }, 2000);</script>";
                        exit();
                }else if (!$user['status']) {
                    echo "<h1>Tài khoản đã bị vô hiệu hóa</h1>";
                    echo "<script>setTimeout(()=> {
                        window.location.href = '../page/login.html';
                    }, 2000);</script>";
                    exit();
                }else if($user && password_verify($pw, $user["Pass"])){
                        $_SESSION["username"] = $usern;
                        $_SESSION['fullname'] = $user['Fullname'];
                        $_SESSION['score'] = $user['Score'];
                    echo "Dang nhap thanh cong!";
                    if($user['User_type'] == 'admin'){
                        header("location: ../admin/admin.php");
                        exit();
                    }else if($user['User_type'] == 'user') {
                        header("location: ../index.php");
                        exit();
                    }
                }else {
                    echo "<h1>Sai mật khẩu</h1>";
                    echo "<script>setTimeout(()=> {
                                window.location.href = '../page/login.html';
                            }, 2000);</script>";
                    exit();
                } 
            }
            
            // Hiển thị dữ liệu
            
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}


// Đóng kết nối
?>
