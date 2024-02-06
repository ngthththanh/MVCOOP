<?php

namespace Asus\Mvcoop\Models;

use Asus\Mvcoop\Commons\Model;

class Slide extends Model
{
     public function getSlideNew()
     {
          try {
               $sql = "SELECT * FROM slides ORDER BY id DESC LIMIT 5";
               $stmt = $this->conn->prepare($sql);
               $stmt->execute();
               return $stmt->fetchAll();
          } catch (\Exception $e) {
               echo "Error: " . $e->getMessage();
               die;
          }
     }
     public function getForSlide()
     {

          try {
               $sql = "SELECT id, title, text, image FROM slides";
               $stmt = $this->conn->prepare($sql);
               $stmt->execute();
               return $stmt->fetchAll();
          } catch (\Exception $e) {
               echo "Error: " . $e->getMessage();
               die;
          }
     }
     public function getAll()
     {
          try {
               $sql = "SELECT * FROM slides";
               $stmt = $this->conn->prepare($sql);
               $stmt->execute();
               return $stmt->fetchAll();
          } catch (\Exception $e) {
               echo "Error: " . $e->getMessage();
               die;
          }
     }

     public function getByID($id)
     {
          try {
               $sql = "SELECT * FROM slides
                        WHERE id = :id";
               $stmt = $this->conn->prepare($sql);
               $stmt->bindParam(":id", $id);
               $stmt->execute();
               return $stmt->fetch();
          } catch (\Exception $e) {
               echo "ERROR" . $e->getMessage();
               die;
          }
     }

     public function insert($title, $text, $image)
     {
          try {
               $sql = "INSERT INTO slides (title, text, image)
                    VALUES(:title, :text, :image)";
               $stmt = $this->conn->prepare($sql);
               $stmt->bindParam(":title", $title);
               $stmt->bindParam(":text", $text);
               $stmt->bindParam(":image", $image);
               $stmt->execute();
          } catch (\Exception $e) {
               echo "ERROR" . $e->getMessage();
               die;
          }
     }

     public function update($id, $title, $text, $image)
     {
          try {
               $sql = "UPDATE slides
               SET  title = :title,
               text = :text, 
                    image = :image 
               WHERE id = :id";
               $stmt = $this->conn->prepare($sql);
               $stmt->bindParam(":id", $id);
               $stmt->bindParam(":title", $title);
               $stmt->bindParam(":text", $text);
               $stmt->bindParam(":image", $image);
               $stmt->execute();
          } catch (\Exception $e) {
               echo "ERROR" . $e->getMessage();
               die;
          }
     }
     public function deleteByID($id)
     {
          try {
               $sql = "DELETE FROM slides
               WHERE id = :id";
               $stmt = $this->conn->prepare($sql);
               $stmt->bindParam(":id", $id);
               $stmt->execute();
          } catch (\Exception $e) {
               echo "ERROR" . $e->getMessage();
               die;
          }
     }
}
