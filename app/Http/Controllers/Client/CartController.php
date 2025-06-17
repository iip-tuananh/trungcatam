<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\product\Product;
use Cart,Auth,Redirect,DB;
use App\models\Bill\BillDetail;
use App\models\Bill\Bill;

class CartController extends Controller
{
    public function checkout(){
            $data['cart'] = session()->get('cart', []);
            $data['profile'] = Auth::guard('customer')->user();
            return view('cart.checkout',$data);
        
    }
    public function postBill(Request $request){
        $profile = Auth::guard('customer')->user();
        $cart = session()->get('cart', []);
        $code_bill = rand();
        DB::beginTransaction();
			try {
				$query = new Bill();
				$query->code_bill = $code_bill;
				$query->code_customer = $profile ? $profile->id : 0;
				$query->total_money = $request->total_money;
				$query->statu = 0;
				$query->note = $request->note;
                $query->cus_name = $request->billingName;
                $query->cus_phone = $request->billingPhone;
                $query->cus_email= $request->billingEmail;
                $query->cus_address= $request->billingAddress;
                $query->transport_price = $request->shippingMethod ? $request->shippingMethod : 0;
				$query->save();

					
                foreach($cart as $key => $item){
                    // dd(($cart));
                    $billdetail = new BillDetail();
                    $billdetail->code_bill = $code_bill;
                    $billdetail->code_product = $item['id'];
                    $billdetail->name =$item['name'];
                    if(isset($item['variant'])){
                        $billdetail->price = $item['price'];
                    }else{
                        if($item['discount'] > 0){
                            $billdetail->price = $item['discount'];
                        }else{
                            $billdetail->price = $item['price'];
                        }
                    }
                    $billdetail->qty = $item['quantity'];
                    $billdetail->images = $item['image'];
                    $billdetail->variant = $item['variant'] ? $item['variant'] : '';
                    $billdetail->save();
                }
				DB::commit();
                $request->session()->forget('cart');
             return view('cart.orderSuccess');
			} catch (\Throwable $e) {
			DB::rollBack();
			throw $e;
                return back()->with('error','Gửi đơn hàng thất bại');
			}
            

    }
    public function listCart(){
        $data['cart'] = session()->get('cart', []);
        return view('cart.list',$data);
    }
    
   

public function addToCart(Request $request)
{
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity', 1);
    $variant = $request->input('selected_variant'); // Lấy variant từ request
    $priceVariant = $request->input('variant_price'); // Lấy giá của variant từ request

    $product = Product::find($productId);
    if (!$product) {
        return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại.']);
    }

    $cart = session()->get('cart', []);
    $cartKey = $variant ? $productId . '_' . $variant : $productId; // Tạo key riêng nếu có variant

    // Sử dụng giá của variant nếu có, nếu không thì dùng giá mặc định
    $price = $priceVariant ? $priceVariant : $product->price;

    if (isset($cart[$cartKey])) {
        $cart[$cartKey]['quantity'] += $quantity;
    } else {
        $cart[$cartKey] = [
            "id" => $productId,
            "name" => $product->name,
            "quantity" => $quantity,
            "price" => $price, // Sử dụng giá đã tính
            "discount" => $product->discount,
            "image" => json_decode($product->images)[0],
            "variant" => $variant, // Thêm variant vào giỏ hàng
        ];
    }

    session()->put('cart', $cart);

    $totalPrice = 0;
    $cartCount = 0;
    foreach ($cart as $item) {
        $itemPrice = $item['discount'] > 0 ? $item['discount'] : $item['price'];
        $totalPrice += $itemPrice * $item['quantity'];
        $cartCount += $item['quantity'];
    }

    return response()->json([
        'success' => true,
        'message' => 'Sản phẩm đã được thêm vào giỏ hàng.',
        'totalPrice' => number_format($totalPrice, 0, ',', '.') . '₫',
        'cartCount' => $cartCount
    ]);
}
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return response()->json($cart);
        }
        
    }
 
public function updateQuantity(Request $request)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$request->key])) { // Sử dụng key để xác định sản phẩm
        $cart[$request->key]['quantity'] = $request->quantity;
        session()->put('cart', $cart);
    }

    $total = 0;
    $qty = 0;
    foreach ($cart as $details) {
        $price = $details['discount'] > 0 ? $details['discount'] : $details['price'];
        $total += $price * $details['quantity'];
        $qty += $details['quantity'];
    }

    return response()->json([
        'success' => true,
        'total' => number_format($total),
        'qty' => $qty,
    ]);
}


public function removeDetail(Request $request)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$request->id])) {
        unset($cart[$request->id]); // Xóa sản phẩm dựa trên $key
        session()->put('cart', $cart);
    }

    $total = 0;
    $qty = 0;
    foreach ($cart as $details) {
        $price = $details['discount'] > 0 ? $details['discount'] : $details['price'];
        $total += $price * $details['quantity'];
        $qty += $details['quantity'];
    }

    // Render lại giao diện giỏ hàng
    $html = view('cart.list_items', compact('cart', 'total'))->render();

    return response()->json([
        'success' => true,
        'html' => $html,
        'total' => number_format($total),
        'qty' => $qty,
    ]);
}

public function removemh(Request $request)
{
    if ($request->id) {
        $cart = session()->get('cart', []);

        // Xóa sản phẩm khỏi giỏ hàng
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }

        // Tính lại tổng số lượng sản phẩm
        $cartCount = 0;
        $totalPrice = 0;
        foreach ($cart as $item) {
            $cartCount += $item['quantity'];
            $itemPrice = $item['discount'] > 0 ? $item['discount'] : $item['price'];
            $totalPrice += $itemPrice * $item['quantity'];
        }

        // Trả về giao diện giỏ hàng cập nhật
        $html = view('cart.cart_sidebar', compact('cart', 'totalPrice'))->render();

        return response()->json([
            'success' => true,
            'html' => $html,
            'cartCount' => $cartCount,
        ]);
    }

    return response()->json(['success' => false]);
}
public function getCartSidebar()
{
    $carthome = session('cart', []); // Lấy giỏ hàng từ session
    $totalPrice = 0;

    foreach ($carthome as $item) {
        $itemPrice = $item['discount'] > 0 ? $item['discount'] : $item['price'];
        $totalPrice += $itemPrice * $item['quantity'];
    }

    return view('cart.cart_sidebar', compact('carthome', 'totalPrice'))->render();
}
    public function orderSuccess()
    {
        return view('cart.orderSuccess');
    }
}
