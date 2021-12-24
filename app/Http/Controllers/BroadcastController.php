<?php

namespace App\Http\Controllers;

use App\Events\BroadcastEvent;
use App\Events\BroadcastPrivateEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BroadcastController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        // BroadcastEvent::dispatch($request->input('firstName'));
        Log::info('aaa');
        broadcast(new BroadcastEvent($request->input('firstName')))->toOthers();
        return $request->all();
    }

    public function storePrivate(Request $request)
    {
        BroadcastPrivateEvent::dispatch($request->input('firstName'));
        return $request->all();
    }
}
