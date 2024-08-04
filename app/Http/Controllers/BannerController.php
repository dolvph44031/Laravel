<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::query()->latest('id')->get();
        return view('users.layouts.banner', compact('banners'));
    }
}
