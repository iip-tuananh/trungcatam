<?php

namespace App\Http\Controllers\Api\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\website\Banner;

class BannerController extends Controller
{
    public function createOrUpdate(Request $request)
    {
    	if($request->data){
    		Banner::truncate();

	    	foreach ($request->data as $banner) {
                $images = $banner['images']; // đây là mảng 2 ảnh
                $title = $banner['title'];
                $description = $banner['description'];
                $link = $banner['link'];
                $status = $banner['status'];
	    		Banner::updateOrCreate(
				    [
                        'status' => $status,
                        'title' => $title,
                        'description' => $description,
				        'link' => $link,
				 	],
				 	[
                        'image' => json_encode($images), // chuyển mảng thành chuỗi JSON
				 	]
				);
	    	}
    	}
    	return response()->json([
            'messenge' => 'success'
        ],200);
    }
    public function list()
    {
    	$data = Banner::get()->map(function($item) {
            $item->images = json_decode($item->image, true); // chuyển lại thành mảng
            return $item;
        });
    	return response()->json([
            'messenge' => 'success',
            'data' => $data
        ],200);
    }
}
