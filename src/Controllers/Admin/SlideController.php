<?php

namespace  Asus\Mvcoop\Controllers\Admin;

use Asus\Mvcoop\Commons\Controller;
use Asus\Mvcoop\Models\Slide;

class  SlideController extends Controller
{
     private Slide $slide;
     private string $folder = 'slides.';

     const PATH_UPLOAD = '/uploads/slides/';
     public function __construct()
     {
          $this->slide = new Slide;
     }
     // Danh sach
     public function index()
     {
          $data['slides'] = $this->slide->getAll();
          return $this->renderViewAdmin(
               $this->folder . __FUNCTION__,
               $data
          );
     }
     // Them moi
     public function create()
     {
          if (!empty($_POST)) {
               $title = $_POST['title'];
               $text = $_POST['text'];
               $image =  $_FILES['image'] ?? null;
               $imagePath = null;
               if (!empty($image)) {
                    $imagePath = self::PATH_UPLOAD . $image['name'];
                    if (!move_uploaded_file($image['tmp_name'], PATH_ROOT .  $imagePath)) {
                         $imagePath = null;
                    }
               }
               $this->slide->insert(
                    $title,
                    $text,
                    $imagePath
               );
               header('Location: /admin/slides');
               die;
          }
          return $this->renderViewAdmin(
               $this->folder . __FUNCTION__
          );
     }
     // Xem chi tiet
     public function show($id)
     {
          $slide = $this->slide->getById($id);
          if (empty($slide)) {
               die(404);
          }
          return $this->renderViewAdmin(
               $this->folder . __FUNCTION__,
               ['slide' => $slide]
          );
     }
     // Cap nhat theo ID
     public function update($id)
     {
          $slide = $this->slide->getById($id);
          if (empty($slide)) {
               e404();
          }

          if (!empty($_POST)) {

               $title = $_POST['title'];
               $text = $_POST['text'];
               $image =  $_FILES['image'] ?? null;

               $imagePath = $slide['image'];
               if (!empty($image)) {
                    $imagePath = self::PATH_UPLOAD .  time() . $image['name'];
                    if (!move_uploaded_file($image['tmp_name'], PATH_ROOT .  $imagePath)) {
                         $imagePath = $slide['image'];
                    }
               }
               $this->slide->update(
                    $id,
                    $title,
                    $text,
                    $imagePath
               );
               
               header('Location: /admin/slides');
               die;
          }
          return $this->renderViewAdmin(
               $this->folder . __FUNCTION__,
               ['slide' => $slide]
          );
     }
     // Xoa theo ID
     public function delete($id)
     {
          $slide = $this->slide->getByID($id);
          if (empty($slide)) {
               e404();
          }
          $this->slide->deleteByID($slide['id']);
          if (!empty($slide['image']) && file_exists($slide['image'])) {
               unlink($slide['image']);
          }
          header('Location: /admin/slides');
          exit();
     }
     
}
