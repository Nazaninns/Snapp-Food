<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\seller\DateRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Services\ArchiveService;
use App\Services\PaginateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    public function archive(DateRequest $request,PaginateRequest $paginateRequest)
    {
        $orders = ArchiveService::sortArchiveByDate($request->validated('from'), $request->validated('to'));
        $orders=PaginateService::paginate($paginateRequest->validated('paginate'),$orders);
        return view('seller.archive.archive', compact('orders'));
    }

    public function show(Order $order)
    {
        $this->authorize('show', [Order::class, $order]);
        return view('seller.archive.show', compact('order'));
    }
}
