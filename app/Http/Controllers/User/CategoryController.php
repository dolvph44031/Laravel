<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    // public function index()
    // {
    //     $categories = Category::all(); // Hoặc bạn có thể dùng phân trang nếu danh mục nhiều
    //     return view('users.layouts.header', compact('categories')); // Thay đổi 'your-view-name' thành tên view của bạn
    // }
    // public function show($slug)
    // {
    //     $category = Category::where('slug', $slug)->firstOrFail();
        
    //     // Lấy các sản phẩm thuộc danh mục
    //     $products = $category->products; // Giả sử bạn đã định nghĩa mối quan hệ products trong model Category

    //     // Trả về view với dữ liệu danh mục và sản phẩm
    //     return view('users.products.show', compact('category', 'products'));
    // }
}
