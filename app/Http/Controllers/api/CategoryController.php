<?php

namespace App\Http\Controllers\api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends ApiResponseController
{

    public function index()
    {
        $category = Category::paginate(10);
        return $this->successResponse($category);
    }

    public function all()
    {
        $category = Category::all();
        return $this->successResponse($category);
    }



    public function show($id)
    {
        //
    }


}
