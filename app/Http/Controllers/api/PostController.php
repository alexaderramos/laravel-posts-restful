<?php

namespace App\Http\Controllers\api;


use App\Category;
use App\Http\Controllers\api\ApiResponseController;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Scalar\String_;

class PostController extends ApiResponseController /*Controller*/
{

    public function index()
    {
        $post = Post::
            join('post_images','post_images.post_id','=','posts.id')
            ->join('categories','categories.id','=','posts.category_id')
            ->select('posts.*','categories.title as category','post_images.image')
            ->orderBy('post_images.created_at','desc')->paginate(10);
        //return response()->json($post);
        return $this->successResponse($post);
    }



    public function show(Post $post)
    {
        $post->url_image=$post->url_image();
        $post->category;
        //return response()->json($post,200);

        /*return response()->json(array(
            "data"=>$post,
            "code"=> 200,
            "msj"=>""
        ));*/
        return $this->successResponse($post);
    }

    public function category(Category $category)
    {
        /*return $this->successResponse(array(
           "posts"=> $category->posts()->paginate(10),
            "category"=>$category
        ));*/

        $post = Post::
        join('post_images','post_images.post_id','=','posts.id')
            ->join('categories','categories.id','=','posts.category_id')
            ->select('posts.*','categories.title as category','post_images.image')
            ->orderBy('post_images.created_at','desc')
            ->where('categories.id',$category->id)
            ->paginate(10);

        return $this->successResponse(array(
            "posts"=>$post,
            "category" => $category
        ));
    }

    public function url_clean(String $url_clean)
    {
        $post = Post::where('url_clean',$url_clean)->firstOrFail();
        $post->image;
        $post->category;
        return $this->successResponse($post);
    }

}
