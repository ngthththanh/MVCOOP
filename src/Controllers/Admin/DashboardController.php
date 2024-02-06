<?php
namespace  Asus\Mvcoop\Controllers\Admin;
use Asus\Mvcoop\Commons\Controller;
class DashboardController extends Controller{
     public function index(){
          return $this->renderViewAdmin(__FUNCTION__);
     }
}