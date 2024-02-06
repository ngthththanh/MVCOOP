<?php
namespace  Asus\Mvcoop\Controllers\Admin;
use Asus\Mvcoop\Commons\Controller;
use Asus\Mvcoop\Models\User;

class AuthenticateController extends Controller{
     public function login(){
          if(!empty($_POST)){
               $_SESSION['error'] =[];
               $email = $_POST['email'];
               $password = $_POST['password'];
               if(empty($password)){
                    $_SESSION['error']['password'] = 'Password không được để trống';

               }
               if(!empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $_SESSION['error']['email'] = 'Email phải nhập đúng định dạng';
               }
               $user = (new User)->getByEmailAndPassword($email, $password);
               if(!empty($user)){
                    $_SESSION['error']['not-found'] = 'Không tìm thấy thông tin';

               }else{
                    $_SESSION['user'] = $user;
                    header('Location: /admin/');
                    exit();
               }
          }
          return $this->renderViewAdmin(__FUNCTION__);

     }
     public function logout(){
          session_destroy();
          header('Location: /');
          exit();
     }
}