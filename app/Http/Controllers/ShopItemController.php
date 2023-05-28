<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopItemRequest;
use App\Http\Requests\UpdateShopItemRequest;
use App\Models\ShopItem;
use Illuminate\Http\Request;

class ShopItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $achievementsWithSubsAndDoneForUser = ShopItem::query()
            ->with([
                'purchases'=> fn($query) => $query->where('user_id', $request->user()->id)
            ])
            ->get();
        return response()->json($achievementsWithSubsAndDoneForUser);
        
        // return response()->json(ShopItem::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShopItemRequest $request)
    {
        $shopitem = ShopItem::create($request->validated());
        return response()->json($shopitem);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShopItem $shopItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShopItemRequest $request, ShopItem $shopItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShopItem $shopItem)
    {
        //
    }
}
