<?php

namespace  Asus\Mvcoop\Controllers\Admin;

use Asus\Mvcoop\Commons\Controller;
use Asus\Mvcoop\Models\User;

class UserController extends Controller
{
     private User $user;
     private string $folder = 'users.';

     const PATH_UPLOAD = '/uploads/users/';
     public function __construct()
     {
          $this->user = new User;
     }
     // Danh sach
     public function index()
     {
          $data['users'] = $this->user->getAll();
          return $this->renderViewAdmin(
               $this->folder . __FUNCTION__,
               $data
          );
     }
     // Them moi
     public function create()
     {
          if (!empty($_POST)) {
               $name =  $_POST['name'];
               $username = $_POST['username'];
               $email = $_POST['email'];
               $password = $_POST['password'];
               $avatar =  $_FILES['avatar'] ?? null;
               $avatarPath = null;
               if (!empty($avatar)) {
                    $avatarPath = self::PATH_UPLOAD . $avatar['name'];
                    if (!move_uploaded_file($avatar['tmp_name'], PATH_ROOT .  $avatarPath)) {
                         $avatarPath = null;
                    }
               }
               $this->user->insert(
                    $name,
                    $username,
                    $email,
                    $password,
                    $avatarPath
               );
               header('Location: /admin/users');
               die;
          }
          return $this->renderViewAdmin(
               $this->folder . __FUNCTION__
          );
     }
     // Xem chi tiet
     public function show($id)
     {
          $user = $this->user->getById($id);
          if (empty($user)) {
               die(404);
          }
          return $this->renderViewAdmin(
               $this->folder . __FUNCTION__,
               ['user' => $user]
          );
     }
     // Cap nhat theo ID
     public function update($id)
     {
          $user = $this->user->getById($id);
          if (empty($user)) {
               e404();
          }

          if (!empty($_POST)) {

               $name =  $_POST['name'];
               $username = $_POST['username'];
               $email = $_POST['email'];
               $password = $_POST['password'];
               $avatar =  $_FILES['avatar'] ?? null;
               $avatarPath = $user['avatar'];
               if (!empty($avatar)) {
                    $avatarPath = self::PATH_UPLOAD .  time() . $avatar['name'];
                    if (!move_uploaded_file($avatar['tmp_name'], PATH_ROOT .  $avatarPath)) {
                         $avatarPath = $user['avatar'];
                    }
               }
               $this->user->update(
                    $id,
                    $name,
                    $username,
                    $email,
                    $password,
                    $avatarPath
               );
               
               header('Location: /admin/users');
               die;
          }
          return $this->renderViewAdmin(
               $this->folder . __FUNCTION__,
               ['user' => $user]
          );
     }
     // Xoa theo ID
     public function delete($id)
     {
          $user = $this->user->getByID($id);
          if (empty($user)) {
               e404();
          }
          $this->user->deleteByID($user['id']);
          if (!empty($user['avatar']) && file_exists($user['avatar'])) {
               unlink($user['avatar']);
          }
          header('Location: /admin/users');
          exit();
     }
     
}
