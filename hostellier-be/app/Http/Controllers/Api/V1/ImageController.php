<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class ImageController extends Controller
{
    public function getHostelImage($id = 1)
    {
        $storagePath = storage_path('/hostel-images/' . $id . '.jpg');

        return Image::make($storagePath)->response();
    }
}
