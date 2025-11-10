<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
/**
 * @OA\Info(
 *     title="Tip top bv api",
 *     version="1.0.0"
 * )
 */
class ItemsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/items",
     *     summary="Verkrijg alle items",
     *     description="Alle huidige items uit de database verkrijgen",
     *     tags={"Item"},
     *     @OA\Response(
     *         response=200,
     *         description="items verkregen"
     *     )
     * )
     */
    public function index()
    {
        $items = Item::with('user')->get();
        return response()->json($items);
    }

    /**
     * @OA\Post(
     *     path="/api/items",
     *     summary="Item aanmaken",
     *     description="Een nieuw item aanmaken",
     *     tags={"Item"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Verlofaanvraag details",
     *         @OA\JsonContent(
     *            required={"titel", "prioriteit", "beschrijving", "tijdsduur", "user_id"},
     *            @OA\Property(property="titel", type="string", example="Website maken"),
     *            @OA\Property(property="prioriteit", type="string", example="laag"),
     *            @OA\Property(property="beschrijving", type="string", example="beschrijving van item"),
     *            @OA\Property(property="tijdsduur", type="int", example="14"),
     *            @OA\Property(property="user_id", type="int", example="1"),
     *            @OA\Property(property="iteratie", type="string", example="wekelijks"),
     *        )
     * *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Item succesvol toegevoegd"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            "titel" => "required",
            "prioriteit" => "required",
            "beschrijving" => "required",
            "tijdsduur" => "required",
            "user_id" => "required",
            "iteratie" => "required",
        ]);
        Item::create($request->all());
        return response()->json([
            "message" => "Item succesvol toegevoegd",
        ],200);
    }

    /**
     * @OA\Get(
     *     path="/api/items/{item}",
     *     summary="Verkrijg item met id",
     *     description="Verkrijg specifieke item door middel van id",
     *     tags={"Item"},
     *     @OA\Parameter(
     *         name="item",
     *         required=true,
     *         in="path",
     *         description="Item id",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Item succesvol opgehaald"
     *     )
     * )
     */
    public function show(Item $item)
    {
        $item = $item->with('user')->get();
        return response()->json($item);
    }

    /**
     * @OA\Put(
     *     path="/api/items/{item}",
     *     summary="Item updaten",
     *     description="Item updaten",
     *     tags={"Item"},
     *     @OA\Parameter(
     *        name="item",
     *        required=true,
     *        in="path",
     *        description="Item id",
     *        @OA\Schema(type="integer", example=1)
     *      ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Verlofaanvraag details",
     *         @OA\JsonContent(
     *            required={"titel", "prioriteit", "beschrijving", "tijdsduur", "user_id"},
     *            @OA\Property(property="titel", type="string", example="Website maken"),
     *            @OA\Property(property="prioriteit", type="string", example="laag"),
     *            @OA\Property(property="beschrijving", type="string", example="beschrijving van item"),
     *            @OA\Property(property="tijdsduur", type="int", example="14"),
     *            @OA\Property(property="user_id", type="int", example="1"),
     *            @OA\Property(property="iteratie", type="string", example="wekelijks"),
     *        )
     * *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Item succesvol toegevoegd"
     *     )
     * )
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            "titel" => "required",
            "prioriteit" => "required",
            "beschrijving" => "required",
            "tijdsduur" => "required",
            "user_id" => "required",
            "iteratie" => "required",
        ]);
        $item->update($request->all());
        return response()->json([
            "message" => "Item succesvol aangepast",
        ],200);
    }

    /**
     * @OA\Delete(
     *     path="/api/items/{item}",
     *     summary="Item verwijderen",
     *     description="Item verwijderen",
     *     tags={"Item"},
     *     @OA\Parameter(
     *         name="item",
     *         required=true,
     *         in="path",
     *         description="Item id",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Item succesvol verwijderd"
     *     )
     * )
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return response()->json([
            "message" => "Item succesvol verwijderd",
        ],200);
    }
}
