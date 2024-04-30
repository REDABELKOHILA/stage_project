<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Logic to retrieve all products
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all(); // Get all categories if applicable
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'imagepath' => 'nullable|string',
            'category_id' => 'nullable|integer|exists:categories,id', // Validate category existence if applicable
        ]);

        $product = new  Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->prix = $request->prix;
        $product->imagepath = $request->imagepath;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('admin.dashboard')->with('success', 'Product created successfully!');
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('showproduct', compact('product'));
    }

    public function card($id)
    {
        $product = Product::findOrFail($id);
        return view('card', compact('product'));
    }


    // Les méthodes restantes pour la lecture, la mise à jour et la suppression...
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'imagepath' => 'nullable|string',
            'category_id' => 'nullable|integer|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Product deleted successfully!');
    }



    public function checkoutOrder(Request $request)
    {
        // تحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            'fullname' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        // إنشاء طلب جديد
        $order = new Order();
        $order->fullname = $validatedData['fullname'];
        $order->address = $validatedData['address'];
        $order->phone = $validatedData['phone'];

        if ($order->save()) {
            // استرجاع المنتجات المرتبطة بالعميل
            $products = Product::where('id', session()->get('id'))->get();

            foreach ($products as $product) {
                $orderItem = new OrderItem();
                $orderItem->product_id = $product->id; // افتراض أن productId هو مفتاح الخارجية لمعرف المنتج في جدول "المنتجات"
                $orderItem->price = $product->prix; // افتراض وجود عمود "prix" في جدول "المنتجات"
                $orderItem->order_id = $order->id; // استخدم معرف الطلب الذي تم حفظه سابقًا
                $orderItem->save();
            }

            return redirect()->back()->with('success', 'تم تقديم الطلب بنجاح.');
        }
    }
}
