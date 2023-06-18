<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/cats",
     *     tags={"Cats"},
     *     summary="Get list of cats",
     *     description="Returns list of cats",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Cat")
     *         )
     *     ),
     * )
     */
    public function index()
    {
        return Cat::all();
    }

    /**
     * @OA\Post(
     *     path="/api/cats",
     *     tags={"Cats"},
     *     summary="Store new cat",
     *     description="Store new cat and return cat data",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/CatRequest")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Cat created successfully",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Cat")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *     ),
     * )
     */
    public function store(Request $request)
    {
        $cat = Cat::create($request->all());
        return response()->json($cat, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/cats/{cat}",
     *     tags={"Cats"},
     *     summary="Get cat by ID",
     *     description="Returns cat data",
     *     @OA\Parameter(
     *         name="cat",
     *         in="path",
     *         description="ID of the cat",
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
     *             @OA\Items(ref="#/components/schemas/Cat")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cat not found",
     *     ),
     * )
     */
    public function show(Cat $cat)
    {
        return $cat;
    }

    /**
     * @OA\Put(
     *     path="/api/cats/{cat}",
     *     tags={"Cats"},
     *     summary="Update cat by ID",
     *     description="Updates the cat data",
     *     @OA\Parameter(
     *         name="cat",
     *         in="path",
     *         description="ID of the cat",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/CatRequest")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Cat updated successfully",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Cat")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cat not found",
     *     ),
     * )
     */
    public function update(Request $request, Cat $cat)
    {
        $cat->update($request->all());
        return response()->json($cat, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/cats/{cat}",
     *     tags={"Cats"},
     *     summary="Delete cat by ID",
     *     description="Deletes the cat",
     *     @OA\Parameter(
     *         name="cat",
     *         in="path",
     *         description="ID of the cat",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Cat deleted successfully",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cat not found",
     *     ),
     * )
     */
    public function destroy(Cat $cat)
    {
        $cat->delete();
        return response()->json(null, 204);
    }
}
