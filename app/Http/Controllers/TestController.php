<?php

namespace App\Http\Controllers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function uploadImg(Request $request)
    {
        return $request->file('image');
        if( !empty($request->file('image')) )
        {
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(),[
                'folder' => 'intern/article',
            ])->getSecurePath();
            return $uploadedFileUrl;
        }
        return 'no';
    }
}
