<?php

namespace App\Http\Schemas;

/**
 * @OA\Schema(
 *     schema="CatRequest",
 *     required={"name", "age"},
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="age", type="integer"),
 *     @OA\Property(property="cat_shelter_id", type="integer"),
 * )
 */
class CatRequest
{
}
