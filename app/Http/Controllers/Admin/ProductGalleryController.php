<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductGalleryController extends Controller
{
    //
    public function destroy(ProductGallery $gallery)
    {
        try {
            // Xóa ảnh khỏi storage
            Storage::delete($gallery->image);

            // Xóa bản ghi khỏi database
            $gallery->delete();

            return back()->with('success', 'Xóa ảnh thành công');
        } catch (\Exception $exception) {
            return back()->withErrors(['error' => 'Đã xảy ra lỗi khi xóa ảnh: ' . $exception->getMessage()]);
        }
    }
}
