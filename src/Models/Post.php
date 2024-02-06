<?php

namespace Asus\Mvcoop\Models;

use Asus\Mvcoop\Commons\Model;
class Post extends Model{

    public function getFirstLates(){
        try {    
            $sql = "
                SELECT 
                    c.name          c_name,
                    p.id            p_id,
                    p.title         p_title,
                    p.excerpt       p_excerpt,
                    p.image         p_image,
                    p.category_id   p_category_id
                FROM posts p
                INNER JOIN categories c
                    ON p.category_id = c.id
                ORDER BY p.id DESC
                LIMIT 1
            ";
    
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
        
            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getTop6(){
        try {    
            $sql = "
                SELECT 
                    c.name          c_name,
                    p.id            p_id,
                    p.title         p_title,
                    p.excerpt       p_excerpt,
                    p.image         p_image,
                    p.category_id   p_category_id
                FROM posts p
                INNER JOIN categories c
                    ON p.category_id = c.id
                ORDER BY p.id DESC
                LIMIT 6
            ";
    
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
        
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getAll() {
        try {    
            $sql = "
                SELECT 
                    c.name      c_name,
                    p.id        p_id,
                    p.title     p_title,
                    p.excerpt   p_excerpt,
                    p.image     p_image
                FROM posts p
                INNER JOIN categories c
                    ON p.category_id = c.id
            ";
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->execute();
        
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function getByID($id) {
        try {    
            $sql = "
                SELECT 
                    c.name          c_name,
                    p.id            p_id,
                    p.title         p_title,
                    p.excerpt       p_excerpt,
                    p.image         p_image,
                    p.content         p_content,
                    p.category_id   p_category_id
                FROM posts p
                INNER JOIN categories c
                    ON p.category_id = c.id
                WHERE p.id = :id
            ";
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->bindParam(':id', $id);

            $stmt->execute();
        
            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function insert($category_id, $title, $excerpt, $content, $image = null)
    {
        try {
            $sql = "INSERT INTO posts(category_id, title, excerpt, content, image) 
                VALUES (:category_id, :title, :excerpt, :content, :image)";

            $stmt = $this->conn->prepare($sql);
            $stmt ->bindParam(':category_id', $category_id);
            $stmt ->bindParam(':title', $title);
            $stmt ->bindParam(':excerpt', $excerpt);
            $stmt ->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function update($id, $category_id, $title, $excerpt, $content, $image = null)
    {
        try {
            $sql = "UPDATE posts 
                SET category_id = :category_id, 
                    title = :title,
                    excerpt = :excerpt,
                    content = :content,
                    image = :image
                WHERE id = :id
            ";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt ->bindParam(':category_id', $category_id);
            $stmt ->bindParam(':title', $title);
            $stmt ->bindParam(':excerpt', $excerpt);
            $stmt ->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);
            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function deleteByID($id)
    {
        try {
            $sql = "DELETE FROM posts WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

}