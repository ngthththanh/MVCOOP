<?php

namespace Asus\Mvcoop\Controllers\Client;

use Asus\Mvcoop\Commons\Controller;
use Asus\Mvcoop\Models\Category;
use Asus\Mvcoop\Models\Post;
use Asus\Mvcoop\Models\Slide;

class HomeController extends Controller
{
    private Post $post;
    private Slide $slide;

    private Category $category;
    public function __construct()
    {
        $this->post = new Post;
        $this->slide = new Slide;
        $this->category = new Category;
    }
    public function index()
    {
        $postFirstLatest = $this->post->getFirstLates();
        $postTop6 = $this->post->getTop6();
        $postTop6Chunk = array_chunk($postTop6, 3);
        $postSlideNew = $this->slide->getSlideNew();

        return $this->renderViewClient(
            __FUNCTION__,
       
            [
                'postFirstLatest' => $postFirstLatest,
                'postTop6Chunk' => $postTop6Chunk,
                'postSlideNew' => $postSlideNew,
          
            ]
        );
    }
}
