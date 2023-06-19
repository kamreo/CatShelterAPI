<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CatShelter;
use Illuminate\Http\Request;

class CatShelterController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/cat_shelters",
     *     tags={"Cat Shelters"},
     *     summary="Get list of cat shelters",
     *     description="Returns list of cat shelters",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *        @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/CatShelter")
     *         )
     *     ),
     * )
     */
    public function index()
    {
        return CatShelter::all();
    }

    /**
     * @OA\Post(
     *     path="/api/cat_shelters",
     *     tags={"Cat Shelters"},
     *     summary="Store new cat shelter",
     *     description="Store new cat shelter and return cat shelter data",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CatShelterRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Cat shelter created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/CatShelter")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *     ),
     * )
     */
    public function store(Request $request)
    {
        $catShelter = CatShelter::create($request->all());
        return response()->json($catShelter, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/cat_shelters/{catShelter}",
     *     tags={"Cat Shelters"},
     *     summary="Get cat shelter by ID",
     *     description="Returns cat shelter data",
     *     @OA\Parameter(
     *         name="catShelter",
     *         in="path",
     *         description="ID of the cat shelter",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/CatShelter")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cat shelter not found",
     *     ),
     * )
     */
    public function show(CatShelter $catShelter)
    {
        return $catShelter;
    }

    /**
     * @OA\Put(
     *     path="/api/cat_shelters/{catShelter}",
     *     tags={"Cat Shelters"},
     *     summary="Update cat shelter by ID",
     *     description="Updates the cat shelter data",
     *     @OA\Parameter(
     *         name="catShelter",
     *         in="path",
     *         description="ID of the cat shelter",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CatShelterRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Cat shelter updated successfully",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/CatShelter")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cat shelter not found",
     *     ),
     * )
     */
    public function update(Request $request, CatShelter $catShelter)
    {
        $catShelter->update($request->all());
        return response()->json($catShelter, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/cat_shelters/{catShelter}",
     *     tags={"Cat Shelters"},
     *     summary="Delete cat shelter by ID",
     *     description="Deletes the cat shelter",
     *     @OA\Parameter(
     *         name="catShelter",
     *         in="path",
     *         description="ID of the cat shelter",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Cat shelter deleted successfully",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cat shelter not found",
     *     ),
     * )
     */
    public function destroy(CatShelter $catShelter)
    {
        $catShelter->delete();
        return response()->json(null, 204);
    }
}
