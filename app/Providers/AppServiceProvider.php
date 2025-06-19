<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Session,View;
use App\models\website\Setting;
use App\models\website\Banner;
use Cart,Auth;
use App\models\PageContent;
use Laravel\Dusk\DuskServiceProvider;
use App\models\product\Category;
use App\models\language\Language;
use App\models\blog\BlogCategory;
use App\models\website\AlbumAffter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) 
        {
            if(Auth::guard('customer')->user() != null){
                $profile = Auth::guard('customer')->user();
            }else{
                $profile = "";
            }
            $language_current = Session::get('locale');
            
            $setting = Setting::first();
            $lang = Language::get();
            $carthome = session()->get('cart', []);
             $cartCount = 0;
            foreach ($carthome as $item) {
                $cartCount += $item['quantity'];
            }
            // dd($carthome);
            $pageContent = PageContent::where(['language'=>$language_current,'status'=> 1])->get();
            $chinhsach = $pageContent->where('type','ho-tro-khanh-hang')->all();
            $thongtin = $pageContent->where('type','ve-chung-toi')->all();
            $certificates= AlbumAffter::where('status',1)->get();
            $categoryhome = Category::with([
                'typeCate' => function ($query) {
                    $query->with(['typetwo'])->where('status',1)->orderBy('id','ASC')->select('cate_id','id', 'name','avatar','slug','cate_slug');
                }
            ])->where('status',1)->orderBy('link_demo','ASC')->get(['id','name','imagehome','avatar','slug','content','link_demo'])->map(function ($query) {
                $query->setRelation('product', $query->product->take(100));
                return $query;
            });

            $banner = Banner::where(['status'=>1])->get(['id','image','link','title','description']);
            $firstImage = $banner->first() ? $banner->first()->image : null;
            $cartcontent = session()->get('cart', []);
            $viewold = session()->get('viewoldpro', []);
            $compare = session()->get('compareProduct', []);
            $blogCate = BlogCategory::with([
                'typeCate' => function ($query){
                    $query->select('id','slug','name','avatar','category_slug');
                }
            ])
            ->where('status',1)
            ->orderBy('id','DESC')
            ->get(['id','name','slug','avatar']);
            $view->with([
                'setting' => $setting,
                'pageContent' => $pageContent,
                'lang' => $lang,
                'banner'=>$banner,
                'profile' =>$profile,
                'categoryhome'=> $categoryhome,
                'cartcontent'=>$cartcontent,
                'viewold'=>$viewold,
                'compare'=>$compare,
                'blogCate'=>$blogCate,
                'chinhsach' => $chinhsach,
                'thongtin' => $thongtin,
                'carthome' => $carthome,
                'cartCount' => $cartCount,
                'certificates' => $certificates,
                'firstImage' => $firstImage,
                ]);    
        });  
    }
}
