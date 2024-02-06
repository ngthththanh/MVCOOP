<?php

namespace Asus\Mvcoop\Controllers\Client;

use Asus\Mvcoop\Commons\Controller;
use Asus\Mvcoop\Models\Post;

class PostController extends Controller
{
     private Post $post;
     public function __construct()
     {
          $this->post = new Post;
     }
     public function show($id)
     {
          $post = $this->post->getByID($id);
          return $this->renderViewClient(
               'post-show',
               [
                    'post' => $post,
               ]
          );
     }
}
