<?php

namespace App\Http\Controllers\Api\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\models\product\Category;
use File,Validator;

class CategoryController extends Controller
{   
 
public function updateSTTCategory(Request $request)
{
    $data = $request->all();
    foreach ($data['data'] as $key => $value) {
        // Kiểm tra trùng link_demo
        // $exists = \App\models\product\Category::where('link_demo', $value['link_demo'])
        //     ->where('id', '!=', $value['id'])
        //     ->exists();
        // if ($exists) {
        //     return response()->json([
        //         'message' => 'Vị trí đã tồn tại!'
        //     ], 422);
        // }
        \App\models\product\Category::where('id', $value['id'])->update(['link_demo'=>$value['link_demo']]);
    }
    return response()->json([
        'message' => 'success'
    ]);
}
    public function add(Request $request, Category $category)
    {
        $data = $category->saveCate($request);
        dd($data);
        return response()->json([
    		'message' => 'Save Success',
    		'data'=> $data
    	],200);
    }
    public function list(Request $request)
    {
        $keyword = $request->keyword;
        if($keyword == ""){
            $data = Category::orderBy('id','DESC')->get();
        }else{
            $data = Category::where('name', 'LIKE', '%'.$keyword.'%')->orderBy('id','DESC')->get()->toArray();
        }
        return response()->json([
            'data' => $data,
            'message' => 'success'
        ]);
    }
    public function edit($id)
    {
        $data = Category::where(['id'=>$id])->first();
        return response()->json([
            'message' => 'success',
            'data' => $data
        ], 200);
    }
    public function delete( $id)
    {
        $query = Category::find($id);
        $file= str_replace('http://localhost:8080','',$query->avatar);
        $filename = public_path().$file;
        if(file_exists( public_path().$file ) ){
            \File::delete($filename);
        }
        $query->delete();
        return response()->json(['message'=>'Delete Success']);
    }
}
