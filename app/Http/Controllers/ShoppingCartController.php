<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function addProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $products = Cart::content();
        foreach ($products as $pro)
            if ($product->product_id == $pro->id) {
                return redirect()->back()->with('alert', 'The product already exists');
            }
        if ($product->product_iStock = 0) {
            return redirect()->route('list.shopping.cart')
                ->with('alertErr', "Sorry. Product $product->product_name  is temporarily out of stock");
        }
        Cart::add(['id' => $product->product_id, 'name' => $product->product_name, 'qty' => \request('quantity'),
            'weight' => $product->product_weight, 'price' => $product->product_price,
            'options' => ['image' => $product->product_image, 'slug' => $product->product_slug]]);

        return redirect()->back();
    }

    public function ajaxUpdateProduct(Request $request, $id, $qty, $rowId)
    {
        if ($request->ajax()) {
            $product = Product::findOrFail($id);

            if ($product) {
                if($qty >= 1) {
                    Cart::update($rowId, ['id' => $product->product_id, 'name' => $product->product_name, 'qty' => $qty,
                        'weight' => $product->product_weight, 'price' => $product->product_price,
                        'options' => ['image' => $product->product_image, 'slug' => $product->product_slug]]);
                    return response()->json(
                        [
                            'success' => 'Added to cart'
                        ],
                        200
                    );
                } else {
                    return response()->json(
                      [
                          'qtyErr' => 'Quantity must greater than 1'
                      ]
                    );
                }
            }
        }
    }

    public function ajaxAddProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $products = Cart::content();
        foreach ($products as $pro)
            if ($pro->id = $id) {
                return response()->json(
                    [
                        'faild' => 'The product already exists'
                    ],
                    200
                );
            }
        if ($product->product_iStock = 0) {
            return response()->json(
                [
                    "faild" => "Sorry. Product $product->product_name  is temporarily out of stock"
                ],
                200
            );
        }
        Cart::add(['id' => $product->product_id, 'name' => $product->product_name, 'qty' => 1,
            'weight' => $product->product_weight, 'price' => $product->product_price,
            'options' => ['image' => $product->product_image, 'slug' => $product->product_slug]]);
        return response()->json(
            [
                'success' => 'Added to cart'
            ],
            200
        );
    }

    public function getListShoppingCart()
    {
        $products = Cart::content();
        $productsId = array_column(array_values($products->toArray()), 'id');

        return view('shopping.cart', compact('products', 'productsId'));
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function removeAll()
    {
        if (!Cart::content()->count()) {
            return redirect()->back()
                ->with('alertErr', 'Your cart is empty, please shopping first');
        }
        Cart::destroy();
        return redirect()->back()->with('success', 'cart was deleted');
    }

    public function checkout()
    {
        $products = Cart::content();
        if (!Cart::content()->count()) {
            return redirect()->route('list.shopping.cart')
                ->with('alertErr', 'Your cart is empty, please shop first');
        }

        return view('shopping.checkout', compact('products'));
    }

    public function updateQty(Request $request)
    {

    }

    public function payment(Request $request)
    {
        $money = (integer)Cart::subtotal(0, ',', '');
        if ($money > Auth::user()->money) {
            return redirect()->route('list.shopping.cart')
                ->with('alertErr', 'The amount of money in your account is not enough to make this transaction');
        }

        $transaction = new Transaction();
        $transaction->tr_user_id = Auth::user()->id;
        $transaction->tr_user_name = \request('tr_user_name');
        $transaction->tr_total_price = $money;
        $transaction->tr_address = \request('tr_address');
        $transaction->tr_city = \request('tr_city');
        $transaction->tr_phone = \request('tr_phone');
        $transaction->tr_note = \request('tr_note');
        $transaction->save();

        foreach (Cart::content() as $item) {
            $product = Product::findOrFail($item->id);
            if ($item->qty > $product->product_iStock) {
                return redirect()->route('list.shopping.cart')
                    ->with('alertErr', "Sorry. The quantity of $product->product_name is only $product->product_iStock");
            }
            $order = new Order();
            $order->or_product_id = $item->id;
            $order->or_qty = $item->qty;
            $order->or_price = $item->price;
            $order->or_transaction_id = $transaction->id;
            $order->save();

            $product->product_iStock -= $item->qty;
            $product->save();
        }
        $orders = Transaction::where('or_transaction_id', $transaction->id);
        Auth::user()->money -= $money;
        Auth::user()->save();

        Cart::destroy();

        return redirect()->route('list.shopping.cart')->with('success', 'Payment success. Thank you');
    }

    public function editTransaction(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        return response()->json($transaction, 200);
    }

    public function updateTransaction(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all());

        return route('admin.dashboard');
    }

    public function manageTransaction()
    {
        $transactions = Transaction::where('tr_user_id', Auth::user()->id)->get();
        return view('page.manage_transactions', compact('transactions'));
    }
}
