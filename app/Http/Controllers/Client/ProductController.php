<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\product\Product;
use App\models\product\Category;
use App\models\blog\Blog;
use App\models\product\TypeProduct;
use App\models\construction\Construction;
use  App\models\product\TypeProductTwo;
use Session;
use App\models\tag\Tags;
use App\models\tag\TagCate;
use App\models\VariantSkuValue;
use App\models\product\TagsProduct;
use App\models\website\Partner;

class ProductController extends Controller
{
    public function allProduct()
    {
        $data['list'] = Product::where('status', 1)->orderBy('id', 'DESC')->select('id', 'category', 'name', 'discount', 'price', 'images', 'slug', 'cate_slug', 'type_slug', 'status_variant', 'variant', 'size', 'preserve')
            ->paginate(21);
        $data['filter'] = TagCate::with(['tags'])->where('status', 1)->get();
        $data['thuonghieu'] = Partner::where('status', 1)->orderBy('id', 'DESC')->get(['id', 'name', 'image', 'link']);
        $data['cate_slug'] = "";
        $data['type_slug'] = "";
        $data['type_two_slug'] = "";
        $data['title'] = 'Tất cả sản phẩm';
        $data['content'] = 'none';
        return view('product.listall', $data);
    }
    public function detail_product($cate, $type, $id)
    {
        $data['product'] = Product::with([
            'typeCate' => function ($query) {
                $query->select('id', 'name', 'avatar', 'slug');
            },
            'cate' => function ($query) {
                $query->where('status', 1)->limit(5)->select('id', 'name', 'avatar', 'slug');
            },
        ])->where('slug', $id)->first(['id', 'name', 'images', 'type_cate', 'category', 'sku', 'discount', 'price', 'content', 'size', 'description', 'slug', 'preserve', 'status_variant', 'created_at', 'species', 'variant', 'cate_slug', 'type_slug','status','km']);
        // session()->forget('viewoldpro'); 
        $oldProduct = session()->get('viewoldpro', []);
        if (!isset($oldProduct[$data['product']->id])) {
            $oldProduct[$data['product']->id] = [
                'id' => $data['product']->id,
                'image' => $data['product']->images,
                'name' => $data['product']->name,
                'slug' => $data['product']->slug,
                'status_variant' => $data['product']->status_variant,
                'price' => $data['product']->price,
                'size' => $data['product']->size,
                'km' => $data['product']->km,
                'discount' => $data['product']->discount,
                'cate_slug' => $data['product']->cate_slug,
                'type_slug' => $data['product']->type_slug,
                'preserve' => $data['product']->preserve,
                'variant' => $data['product']->variant,
            ];
            session()->put('viewoldpro', $oldProduct);
        }
        $data['productlq'] = Product::where('category', $data['product']->category)->limit(8)->get(['id', 'category', 'name', 'status_variant', 'discount', 'price', 'images', 'slug', 'cate_slug', 'type_slug', 'description', 'preserve', 'size', 'variant']);
        return view('product.detail', $data);
    }
    public function flashSale()
    {
        $data['list'] = Product::where(['status' => 1, 'discountStatus' => 1])
            ->orderBy('id', 'DESC')
            ->select('id', 'category', 'name', 'discount', 'price', 'images', 'slug', 'cate_slug', 'type_slug', 'description', 'status_variant', 'variant', 'size', 'preserve')
            ->paginate(21);
        return view('product.flash_sale', $data);
    }
    public function allListCate($danhmuc)
    {
        $data['list'] = Product::where(['status' => 1, 'cate_slug' => $danhmuc])
            ->orderBy('id', 'DESC')
            ->select('id', 'category', 'name', 'discount', 'price', 'images', 'slug', 'cate_slug', 'type_slug', 'description', 'status_variant', 'variant', 'size', 'preserve')
            ->paginate(21);
        $data['thuonghieu'] = Partner::where('status', 1)->orderBy('id', 'DESC')->get(['id', 'name', 'image', 'link']);
        $data['cateno'] = Category::where('slug', $danhmuc)->first(['id', 'name', 'avatar', 'content', 'slug', 'imagehome']);
        $data['filter'] = TagCate::with(['tags'])->where('cate_product_id', $data['cateno']->id)->get();
        $data['cate_slug'] = $data['cateno']->slug;
        $data['type_slug'] = "";
        $data['type_two_slug'] = "";
        $data['title'] = languageName($data['cateno']->name);
        $data['content'] = $data['cateno']->content;
        return view('product.listall', $data);
    }
    public function allListType($danhmuc, $loaidanhmuc)
    {
        $data['list'] = Product::where(['status' => 1, 'cate_slug' => $danhmuc, 'type_slug' => $loaidanhmuc])
            ->orderBy('id', 'DESC')
            ->select('id', 'category', 'name', 'discount', 'price', 'images', 'slug', 'cate_slug', 'type_slug', 'description', 'status_variant', 'variant', 'size', 'preserve')
            ->paginate(21);
        $data['thuonghieu'] = Partner::where('status', 1)->orderBy('id', 'DESC')->get(['id', 'name', 'image', 'link']);
        $data['type'] = TypeProduct::where('slug', $loaidanhmuc)->first(['id', 'name', 'cate_id', 'content', 'slug']);
        $cate_id = $data['type']->cate_id;
        $data['cateno'] = Category::where('slug', $danhmuc)->first(['id', 'name', 'avatar', 'content', 'slug', 'imagehome']);
        $data['filter'] = TagCate::with(['tags'])->where('cate_product_id', $data['cateno']->id)->get();
        $data['cate_slug'] = $data['cateno']->slug;
        $data['type_slug'] = $data['type']->slug;
        $data['type_two_slug'] = "";
        $data['title'] = languageName($data['type']->name);
        $data['content'] = $data['type']->content;
        return view('product.listall', $data);
    }
    public function allListTypeTwo($danhmuc, $loaidanhmuc, $thuonghieu)
    {
        $data['list'] = Product::where(['status' => 1, 'cate_slug' => $danhmuc, 'type_slug' => $loaidanhmuc, 'type_two_slug' => $thuonghieu])
            ->orderBy('id', 'DESC')
            ->select('id', 'category', 'name', 'discount', 'price', 'images', 'slug', 'cate_slug', 'type_slug', 'description', 'status_variant', 'variant', 'size', 'preserve')
            ->paginate(21);
        $data['thuonghieu'] = Partner::where('status', 1)->orderBy('id', 'DESC')->get(['id', 'name', 'image', 'link']);
        $data['typetwo'] = TypeProductTwo::where('slug', $thuonghieu)->first(['id', 'name', 'cate_id', 'content', 'slug']);
        $data['cateno'] = Category::where('slug', $danhmuc)->first(['id', 'name', 'avatar', 'content', 'slug', 'imagehome']);
        $data['type'] = TypeProduct::where('slug', $loaidanhmuc)->first(['id', 'name', 'cate_id', 'content', 'slug']);
        $data['cate_slug'] = $data['cateno']->slug;
        $data['type_slug'] = $data['type']->slug;
        $data['type_two_slug'] = $data['typetwo']->slug;
        $data['filter'] = TagCate::with(['tags'])->where('cate_product_id', $data['cateno']->id)->get();
        $data['title'] = languageName($data['typetwo']->name);
        $data['content'] = $data['typetwo']->content;
        return view('product.listall', $data);
    }
    public function tag($tag)
    {
        $data['list'] = Product::where('status', 1)
            ->whereJsonContains('tags', $tag)
            ->paginate(21);
        $tag = Tags::where('slug', $tag)->first();
        $data['cateno'] = Category::where('id', $tag->cate_product_id)->first(['id', 'name', 'avatar', 'content', 'slug']);
        $cate_id = $data['cateno']->id;
        $data['cateid'] = $cate_id;
        $data['title'] = $tag->name;
        return view('product.list', $data);
    }
    public function CateProList($cate)
    {
        $data['list'] = Product::with('customer', 'cate')
            ->where('category', $cate)
            ->orderBy('id', 'ASC')
            ->paginate(21);
        $data['cate'] = Category::where('id', $cate)->first();
        return view('product.list', $data);
    }
    public function TypeProList($type)
    {
        $data['list'] = Product::with('customer', 'cate')
            ->where('type_cate', $type)
            ->orderBy('id', 'ASC')
            ->paginate(21);
        $cate = TypeProduct::where('id', $type)->first();
        $data['title_page'] = languageName($cate->name);
        return view('product.list', $data);
    }
    public function getproajax(Request $request)
    {
        if ($request->cate == "all") {
            $product = Product::where([
                ['status', '=', 1]
            ])->limit(9)->orderBy('id', 'ASC')->get(['id', 'name', 'discount', 'price', 'images', 'status_variant', 'variant']);
        } else {
            $product =  Product::where(['status' => 1, 'category' => $request->cate])
                ->orderBy('id', 'DESC')
                ->select('id', 'category', 'name', 'discount', 'price', 'images')
                ->get();
        }
        $view = view("layouts.product.getproajax", compact('product'))->render();
        return response()->json(['html' => $view]);
    }
    public function filterProduct(Request $request)
    {
        $cate = $request->input('cate');
        $type = $request->input('type');
        $typetwo = $request->input('typetwo');
        $brands = $request->input('brands', []);
        $priceRanges = $request->input('price_ranges', []);
        $query = Product::query()->where('status', 1);
        // Lọc theo danh mục
        if (!empty($cate)) {
            $category = Category::where('slug', $cate)->first();
            if ($category) {
                $query->where('category', $category->id);
            }
        }
        // Lọc theo phân loại
        if (!empty($type)) {
            $typeObj = TypeProduct::where('slug', $type)->first();
            if ($typeObj) {
                $query->where('type_cate', $typeObj->id);
            }
        }
        // Lọc theo phân loại cấp 2
        if (!empty($typetwo)) {
            $typeTwoObj = TypeProductTwo::where('slug', $typetwo)->first();
            if ($typeTwoObj) {
                $query->where('type_two', $typeTwoObj->id);
            }
        }
        // Lọc theo thương hiệu
        if (!empty($brands)) {
            $query->whereIn('thuonghieu_id', $brands);
        }
        // Lọc theo khoảng giá
        if (!empty($priceRanges)) {
            $query->where(function ($q) use ($priceRanges) {
                foreach ($priceRanges as $range) {
                    $parts = explode(';', $range);
                    if (count($parts) === 2) {
                        list($min, $max) = $parts;
                        // Tách giá trị min, max
                        $minValue = (int)str_replace('price_min:', '', $min);
                        $maxValue = (int)str_replace('price_max:', '', $max);
                        // Thêm điều kiện cho từng khoảng giá
                        $q->orWhereBetween('price', [$minValue, $maxValue]);
                    }
                }
            });
        }
        // dd($request->fillter);
        if($request->fillter != null) {
    $query->where(function($q) use ($request) {
        foreach($request->fillter as $key => $item) {
            if ($key == 0) {
                $q->whereJsonContains('tags', $item);
            } else {
                $q->orWhereJsonContains('tags', $item);
            }
        }
    });
}
        // Sắp xếp và lấy sản phẩm
        $product = $query->orderBy('id', 'desc')->paginate(21);
        // Tạo HTML cho danh sách sản phẩm
        $html = view('layouts.product.filter_item', ['product' => $product])->render();
        return response()->json(['html' => $html]);
    }
    public function autosearchcomplete(Request $request)
    {
        $keyword = $request->keyword;
        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')
            ->where('status', 1)
            ->take(5)
            ->get()
            ->map(function ($product) {
                return [
                    'name' => $product->name,
                    'url' => route('detailProduct', [
                        'cate' => $product->cate_slug,
                        'type' => $product->type_slug ? $product->type_slug : 'loai',
                        'id' => $product->slug
                    ]),
                    'image' => !empty($product->images) ? json_decode($product->images)[0] : '',
                    'price' => $product->price,
                    'discount' => $product->discount
                ];
            });
        $total = Product::where('name', 'LIKE', '%' . $keyword . '%')
            ->where('status', 1)
            ->count();
        return response()->json([
            'products' => $products,
            'total' => $total
        ]);
    }
    public function compare(Request $request)
    {
        // session()->forget('compareProduct');
        $id = $request->id;
        $data['product'] = Product::where('id', $id)->first(['id', 'name', 'images', 'category', 'discount', 'price', 'size', 'cate_slug', 'status_variant', 'type_slug', 'slug']);
        $compare = session()->get('compareProduct', []);
        if (isset($compare[$id])) {
            session()->put('compareProduct', $compare);
            return response()->json([
                'message' => 'exist'
            ]);
        } else {
            if (empty($compare)) {
                $compare[$id] = [
                    "idpro" => $id,
                    "name" => $data['product']->name,
                    'image' => json_decode($data['product']->images)[0],
                    'status_variant' => $data['product']->status_variant,
                    'price' => $data['product']->price,
                    'size' => json_decode($data['product']->size),
                    'discount' => $data['product']->discount,
                    'cate_slug' => $data['product']->cate_slug,
                    'type_slug' => $data['product']->type_slug,
                    'pro_slug' => $data['product']->slug,
                    'cate' => $data['product']->category
                ];
            } else {
                foreach ($compare as $val) {
                    if ($data['product']->category != $val['cate']) {
                        return response()->json([
                            'data' => [],
                            'message' => 'error'
                        ]);
                    }
                }
                if (count($compare) == 2) {
                    return response()->json([
                        'data' => [],
                        'message' => 'limit3'
                    ]);
                } else {
                    $compare[$id] = [
                        "idpro" => $id,
                        "name" => $data['product']->name,
                        'image' => json_decode($data['product']->images)[0],
                        'status_variant' => $data['product']->status_variant,
                        'price' => $data['product']->price,
                        'size' => json_decode($data['product']->size),
                        'discount' => $data['product']->discount,
                        'cate_slug' => $data['product']->cate_slug,
                        'type_slug' => $data['product']->type_slug,
                        'pro_slug' => $data['product']->slug,
                        'cate' => $data['product']->category
                    ];
                }
            }
            session()->put('compareProduct', $compare);
            $compareProduct = session()->get('compareProduct', []);
            return response()->json([
                'data' => $compareProduct,
                'qty' => count($compareProduct),
                'message' => 'success'
            ]);
        }
    }
    public function removeCompare(Request $request)
    {
        if ($request->id) {
            $compare = session()->get('compareProduct');
            if (isset($compare[$request->id])) {
                unset($compare[$request->id]);
                session()->put('compareProduct', $compare);
            }
            $list = session()->get('compareProduct', []);
            $view = view("layouts.product.compare", compact('list'))->render();
            return response()->json(['html' => $view]);
        }
    }
    public function compareList()
    {
        $data['list'] = session()->get('compareProduct', []);
        return view('compare.product', $data);
    }
    public function searchResult(Request $request)
    {
        // Lấy từ khóa từ request hoặc từ session nếu đang phân trang
        if ($request->has('keywordsearch')) {
            $keyword = $request->keywordsearch;
            // Lưu từ khóa vào session để dùng cho phân trang
            session(['search_keyword' => $keyword]);
        } else {
            // Lấy từ session nếu đang truy cập qua phân trang
            $keyword = session('search_keyword', '');
        }
        // Tìm kiếm sản phẩm
        $data['product'] = Product::where('name', 'LIKE', '%' . $keyword . '%')
            ->where('status', 1)
            ->paginate(18);
        $data['keyword'] = $keyword;
        return view('product.search_result', $data);
    }
    public function getSku(Request $request)
    {
        $data = VariantSkuValue::where(['product_id' => $request->id, 'version' => $request->value])->first();
        return response()->json([
            'data' => $data,
            'message' => 'success'
        ]);
    }
    public function getPrice(Request $request)
    {
        $options = $request->input('options', []);
        $productId = $request->input('product_id');
        if (empty($options) || !$productId) {
            return response()->json([
                'success' => false,
                'message' => 'Vui lòng chọn đầy đủ tùy chọn'
            ]);
        }
        // Query theo product_id và từng option (version)
        $query = VariantSkuValue::where('product_id', $productId);
        foreach ($options as $option) {
            $query->where('version', 'LIKE', "%$option%");
        }
        $variant = $query->first();
        if ($variant) {
            return response()->json([
                'success' => true,
                'price' => $variant->price,
                'sku' => $variant->sku ?? null,
                'inventory_quantity' => $variant->inventory_quantity ?? null
            ]);
        }
        // Nếu không tìm thấy, thử tìm với option đầu tiên (vẫn kèm product_id)
        if (count($options) > 1) {
            $mainOption = $options[0];
            $simpleVariant = VariantSkuValue::where('product_id', $productId)
                ->where('version', 'LIKE', "%$mainOption%")
                ->first();
            if ($simpleVariant) {
                return response()->json([
                    'success' => true,
                    'price' => $simpleVariant->price,
                    'sku' => $simpleVariant->sku ?? null,
                    'inventory_quantity' => $simpleVariant->inventory_quantity ?? null,
                    'partial_match' => true
                ]);
            }
        }
        return response()->json([
            'success' => false,
            'message' => 'Đang cập nhật giá'
        ]);
    }
    //loc thuong hieu
};
