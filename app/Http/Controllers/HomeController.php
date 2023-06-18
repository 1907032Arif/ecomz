<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\catagory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Tests\Integration\Database\EloquentHasManyThroughTest\Category;
use Spatie\Ignition\Tests\TestClasses\Models\Car;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user() -> role == 'admin'){
            return redirect()->route('admin.home');
        }elseif(Auth::user() -> role == 'user'){
            return redirect()->route('user.home');
        }
    }

    public function home()
    {
        $categories = catagory::where('is_popular', 1)->take(3)->get();
        $featuredProducts= Product::where('is_featured', 1)->orderBy('created_at', 'desc')->take(2)->get();
        $instaProducts = Product::where('instagram_url', '!=' , '')->where('today_deals', null)->take(4)->orderBy('created_at', 'desc')->get();
        $todayDeals = Product::where('today_deals', '!=', '')->orderBy('created_at', 'desc')->first();

        $cartProducts = 0;
        if (Auth::check())
        {
            $user = Auth::user();
            $cartProducts = Cart::where('user_id', $user->id)->count();
        }


        $productCategory = catagory::has('product')->take(5)->get();
        $catProduct = Product::whereIn('cat_id', $productCategory->pluck('id'))
            ->where('is_featured', '!=', '1')
            ->get();


        return view('pages.home', compact('categories','productCategory','catProduct', 'featuredProducts', 'instaProducts', 'todayDeals', 'cartProducts'));
    }

    public function adminHome()
    {
        return view('admin.admin_dashboard');
    }

      public function userHome()
    {
        $categories = catagory::where('is_popular', 1)->take(3)->get();
        $featuredProducts= Product::where('is_featured', 1)->where('id', '!=', 17)->orderBy('created_at', 'desc')->take(2)->get();
        $instaProducts = Product::where('instagram_url', '!=' , '')->where('today_deals', null)->take(4)->orderBy('created_at', 'desc')->get();
        $todayDeals = Product::where('today_deals', '!=', '')->orderBy('created_at', 'desc')->first();

        $cartProducts = 0;
        if (Auth::check())
        {
            $user = Auth::user();
            $cartProducts = Cart::where('user_id', $user->id)->count();
        }


        $productCategory = catagory::has('product')->take(5)->get();
        $catProduct = Product::whereIn('cat_id', $productCategory->pluck('id'))
            ->where('is_featured', '!=', '1')
            ->get();


        return view('pages.home', compact('categories','productCategory','catProduct', 'featuredProducts', 'instaProducts', 'todayDeals', 'cartProducts'));

    }

    public  function  aboutUS(){
        $cartProducts = Cart::count();
        return view('pages.about-us', compact('cartProducts'));
    }

    public function contact(){
        $cartProducts = Cart::count();
        return view('pages.contact', compact('cartProducts'));
    }

    public function search(Request $request){
        $terms = $request->input('search');


        if ($terms){
            $products = Product::where(function ($query) use ($terms) {
                $query->where('name', 'LIKE', "%{$terms}%")
                    ->orWhere('description', 'LIKE', "%{$terms}%");
            })->get();

        }else {
            $products = Product::orderBy('created_at', 'desc')->get();
        }

        $cartProducts = Cart::count();
        return view('pages.search', compact('products', 'cartProducts'));
    }
}
