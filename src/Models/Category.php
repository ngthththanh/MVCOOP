<?php

namespace Asus\Mvcoop\Models;

use Asus\Mvcoop\Commons\Model;

class Category extends Model
{
     public function getForMenu()
     {

          try {
               $sql = "SELECT id, name FROM categories";
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
               $sql = "SELECT * FROM categories";
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
               $sql = "SELECT * FROM categories 
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

     public function insert($name, $avatar = null)
     {
          try {
               $sql = "INSERT INTO categories(name, avatar)
                    VALUES(:name, :avatar)";
               $stmt = $this->conn->prepare($sql);
               $stmt->bindParam(":name", $name);
               $stmt->bindParam(":avatar", $avatar);
               $stmt->execute();
          } catch (\Exception $e) {
               echo "ERROR" . $e->getMessage();
               die;
          }
     }

     public function update($id, $name, $avatar = null)
     {
          try {
               $sql = "UPDATE categories 
               SET  name = :name, 
                    avatar = :avatar 
               WHERE id = :id";
               $stmt = $this->conn->prepare($sql);
               $stmt->bindParam(":id", $id);
               $stmt->bindParam(":name", $name);
               $stmt->bindParam(":avatar", $avatar);
               $stmt->execute();
          } catch (\Exception $e) {
               echo "ERROR" . $e->getMessage();
               die;
          }
     }
     public function deleteByID($id)
     {
          try {
               $sql = "DELETE FROM categories 
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
