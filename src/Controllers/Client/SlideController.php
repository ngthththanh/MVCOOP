<?php

namespace Asus\Mvcoop\Controllers\Client;

use Asus\Mvcoop\Commons\Controller;
use Asus\Mvcoop\Models\Slide;

class SlideController extends Controller
{
     private Slide $slide;
     public function __construct()
     {
          $this->slide = new Slide;
     }
     public function show($id)
     {
          $slide = $this->slide->getByID($id);
          return $this->renderViewClient(
               'slide-show',
               [
                    'slide' => $slide,
               ]
          );
     }
}
