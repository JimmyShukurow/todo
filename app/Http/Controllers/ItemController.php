<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
   
    public function index()
    {
        return Item::orderBy('created_at', 'DESC')->get();
    }

    public function store(Request $request)
    {
        return Item::create($request->name);
    }
  
    public function show(Item $item)
    {
        return $item;
    }
    
    public function update(Item $item, ItemRequest $request)
    {
        abort_if(!$item, 404, 'Item is not found');
        $validated = $request->validated();
        if ($request['completed']) {
            $validated['completed_at'] = Carbon::now();
        } else {
            $validated['completed_at'] = null;
        }
        return $item->update($validated);
    }
   
    public function destroy(Item $item)
    {
        abort_if(!$item, 404, 'Item is not found');
        return $item->delete();
    }
}
