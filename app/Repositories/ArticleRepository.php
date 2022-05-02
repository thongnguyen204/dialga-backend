<?php
namespace App\Repositories;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;

interface ArticleRepository
{
    function index();

    function store(StoreArticleRequest $request);

    function update(UpdateArticleRequest $request, Article $article);

    function delete(Article $article);
}