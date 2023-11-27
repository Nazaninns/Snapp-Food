<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\DateRequest;
use App\Models\Cart;
use App\Services\ArchiveService;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function archive(DateRequest $request)
    {
        $carts = ArchiveService::sortArchiveByDate($request->validated('from'), $request->validated('to'));
        return view('admin.archive.archive', compact('carts'));
    }

    public function show()
    {

    }
}
