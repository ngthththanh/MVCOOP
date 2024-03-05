<?php

namespace Asus\Mvcoop\Models;

use Asus\Mvcoop\Commons\Model;
class Pagination extends Model{
         private $conn;
         private $records_per_page;
         private $current_page;
     
         public function __construct($conn, $records_per_page) {
             $this->conn = $conn;
             $this->records_per_page = $records_per_page;
             $this->current_page = isset($_GET['page']) ? $_GET['page'] : 1;
         }
     
         public function generatePaginationLinks($table) {
             $offset = ($this->current_page - 1) * $this->records_per_page;
     
             // Truy vấn CSDL để lấy số bản ghi
             $result = $this->conn->query("SELECT COUNT(id) AS total FROM $table");
             $row = $result->fetch_assoc();
             $total_records = $row['total'];
     
             // Tính toán số trang
             $total_pages = ceil($total_records / $this->records_per_page);
     
             // Hiển thị dữ liệu từ CSDL
             $query = "SELECT * FROM $table LIMIT $offset, $this->records_per_page";
             $result = $this->conn->query($query);
     
             if ($result->num_rows > 0) {
                 while ($row = $result->fetch_assoc()) {
                     // Hiển thị dữ liệu từ CSDL
                 }
             } else {
                 echo "Không có bản ghi.";
             }
     
             // Hiển thị liên kết phân trang
             echo "<div class='pagination'>";
             for ($i = 1; $i <= $total_pages; $i++) {
                 echo "<a href='?page=$i'>$i</a>";
             }
             echo "</div>";
         }
}
     
    
     
     // Số bản ghi mỗi trang
     $records_per_page = 10;
     
     // Khởi tạo đối tượng Pagination
     $pagination = new Pagination($conn, $records_per_page);
     
     // Gọi phương thức generatePaginationLinks để hiển thị phân trang
     $pagination->generatePaginationLinks('your_table');
     
     // Đóng kết nối
     $conn->close();
     