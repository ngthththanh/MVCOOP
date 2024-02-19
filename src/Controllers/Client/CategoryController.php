<?php

namespace Asus\Mvcoop\Controllers\Client;

use Asus\Mvcoop\Commons\Controller;
use Asus\Mvcoop\Models\Category;

class CategoryController extends Controller
{
    private Category $category;
    public function __construct()
    {
        $this->category = new Category;
    }
    public function show($id)
    {
        $category = $this->category->listCategory($id);
        // debug($category);
        return $this->renderViewClient(
            'category',
            [
                'category' => $category,

            ]
        );
    }
}
