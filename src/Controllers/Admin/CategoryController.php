<?php

namespace  Asus\Mvcoop\Controllers\Admin;

use Asus\Mvcoop\Commons\Controller;
use Asus\Mvcoop\Models\Category;

class CategoryController extends Controller
{
     private Category $category;
     private string $folder = 'categories.';

     const PATH_UPLOAD = '/uploads/categories/';
     public function __construct()
     {
          $this->category = new Category;
     }
     // Danh sach
     public function index()
     {
          $data['categories'] = $this->category->getAll();
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
               $avatar =  $_FILES['avatar'] ?? null;
               $avatarPath = null;
               if (!empty($avatar)) {
                    $avatarPath = self::PATH_UPLOAD . $avatar['name'];
                    if (!move_uploaded_file($avatar['tmp_name'], PATH_ROOT .  $avatarPath)) {
                         $avatarPath = null;
                    }
               }
               $this->category->insert(
                    $name,
                    $avatarPath
               );
               header('Location: /admin/categories');
               die;
          }
          return $this->renderViewAdmin(
               $this->folder . __FUNCTION__
          );
     }
     // Xem chi tiet
     public function show($id)
     {
          $category = $this->category->getById($id);
          if (empty($category)) {
               die(404);
          }
          return $this->renderViewAdmin(
               $this->folder . __FUNCTION__,
               ['category' => $category]
          );
     }
     // Cap nhat theo ID
     public function update($id)
     {
          $category = $this->category->getByID($id);
          if (empty($category)) {
               e404();
          }

          if (!empty($_POST)) {

               $name =  $_POST['name'];
               $avatar =  $_FILES['avatar'] ?? null;
               $avatarPath = $category['avatar'];
               if (!empty($avatar)) {
                    $avatarPath = self::PATH_UPLOAD . $avatar['name'];
                    if (!move_uploaded_file($avatar['tmp_name'], PATH_ROOT .  $avatarPath)) {
                         $avatarPath = $category['avatar'];
                    }
               }
               $this->category->update(
                    $id,
                    $name,
                    $avatarPath
               );
               header('Location: /admin/categories');
               die;
          }
          return $this->renderViewAdmin(
               $this->folder . __FUNCTION__,
               ['category' => $category]
          );
     }
     // Xoa theo ID
     public function delete($id)
     {
          $category = $this->category->getByID($id);
          if (empty($category)) {
               e404();
          }
          $this->category->deleteByID($category['id']);
          if (!empty($category['avatar']) && file_exists($category['avatar'])) {
               unlink($category['avatar']);
          }
          header('Location: /admin/categories');
          exit();
     }
}
