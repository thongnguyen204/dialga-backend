<?php
namespace App\Repositories\Impl;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ArticleRepositoryImpl implements ArticleRepository
{
    public function index()
    {
       return Article::orderBy('id', 'desc')->paginate(10); 
    }

    public function store(StoreArticleRequest $request)
    {
        if( !empty($request->file('image')) )
        {
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(),[
                'folder' => 'intern/article',
            ])->getSecurePath();

            $article = Article::create([
                'title' => $request->title,
                'abstract' => $request->abstract,
                'image' => $uploadedFileUrl,
                'content' => $request->content,
                'user_id' => $request->user()->id,
            ]);

            return response()->json([
                'article' => $article,
                'message' => 'Article created',
            ], 200);
        }

    }
}