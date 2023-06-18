<?php

namespace App\Http\Schemas;

/**
 * @OA\Schema(
 *     schema="CatShelter",
 *     required={"name", "address"},
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="address", type="string"),
 * )
 */
class CatShelter
{
}
