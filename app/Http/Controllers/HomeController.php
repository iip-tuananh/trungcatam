<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\product\Category;
use App\models\product\Product;
use App\models\blog\Blog;
use Session;
use App\models\website\Partner;
use App\models\blog\BlogCategory;
use App\models\BannerAds;
use App\models\ReviewCus;
use App\models\PageContent;
use App\models\website\AlbumAffter;

class HomeController extends Controller
{
    public function home()
    {
        $data['hotnews'] = Blog::where([
            
            ['status','=',1]
        ])->orderBy('id','DESC')->limit(7)->get(['id','title','slug','created_at','image','description']);
        $data['BannerAds'] = BannerAds::where(['status'=>1,'status_show'=>'banner_ads'])->get();
        $data['BannerSlogan'] = BannerAds::where(['status'=>1,'status_show'=>'banner_slogan'])->get();
        $data['gioithieu'] = PageContent::where(['slug'=>'gioi-thieu','language'=>'vi'])->first(['id','title','content','image','description']);
        $data['ReviewCus'] = ReviewCus::where('status',1)->get();
   
        
        $data['partner'] = Partner::where('status',1)->get();
        $data['homePro'] = Product::where(['status'=>1,'discountStatus'=>1])
            ->orderBy('id','DESC')
            ->select('id','category','name','discount','price','images','slug','cate_slug','type_slug','description','status_variant','variant','preserve','size')
            ->limit(10)->get();
            // dd($data['homePro']);
            // session()->forget('cart'); 
            // session()->forget('viewoldpro'); 
            
        return view('home',$data);
    }
}
