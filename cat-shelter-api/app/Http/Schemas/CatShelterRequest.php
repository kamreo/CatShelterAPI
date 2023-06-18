<?php

namespace App\Http\Schemas;

/**
 * @OA\Schema(
 *     schema="CatShelterRequest",
 *     required={"name", "address"},
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="address", type="string"),
 * )
 */
class CatShelterRequest
{
}
