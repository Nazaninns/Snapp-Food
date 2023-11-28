<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(StoreBannerRequest $request)
    {
        Banner::query()->create($request->validated());
        return redirect()->route('admin.banners.index');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.banners.index');
    }
}
