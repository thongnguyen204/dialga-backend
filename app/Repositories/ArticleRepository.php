<?php
namespace App\Repositories;

use App\Http\Requests\StoreArticleRequest;

interface ArticleRepository
{
    function index();

    function store(StoreArticleRequest $request);
}