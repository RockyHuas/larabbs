<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\Tag;
use App\Transformers\CategoryTransformer;
use App\Transformers\TagTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        return $this->response->collection(Category::all(), new CategoryTransformer());
    }
}
