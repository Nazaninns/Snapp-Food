<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\seller\DateRequest;
use App\Models\order;
use App\Services\ArchiveService;
use App\Services\PaginateService;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function archive(DateRequest $request,PaginateRequest $paginateRequest)
    {
        $orders = ArchiveService::sortArchiveByDate($request->validated('from'), $request->validated('to'));
        $orders=PaginateService::paginate($paginateRequest->validated('paginate'),$orders);
        return view('admin.archive.archive', compact('orders'));
    }

    public function show(order $order)
    {
        return view('admin.archive.show',compact('order'));
    }
}
