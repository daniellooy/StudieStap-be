<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopItemPurchaseRequest;
use App\Http\Requests\UpdateShopItemPurchaseRequest;
use App\Models\ShopItem;
use App\Models\ShopItemPurchase;

class ShopItemPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShopItemPurchaseRequest $request, ShopItem $shopitem)
    {
        //checken of gebruiker genoeg punten heeft
        $user = auth('sanctum')->user();
        if($user->points >= $shopitem->price){
            $user->points -= $shopitem->price;
            $user->save();

            $shopItemPurchase = $shopitem->purchases()->create([ 'user_id' => $request->user()->id ]);
            return response()->json($shopItemPurchase);
        }
        else{
            return "banan";
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(ShopItemPurchase $shopItemPurchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShopItemPurchaseRequest $request, ShopItemPurchase $shopItemPurchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShopItemPurchase $shopItemPurchase)
    {
        //
    }
}
