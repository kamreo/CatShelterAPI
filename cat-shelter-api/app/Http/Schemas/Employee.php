<?php

namespace App\Http\Schemas;

/**
 * @OA\Schema(
 *     schema="Employee",
 *     required={"name", "position"},
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="position", type="string"),
 *     @OA\Property(property="cat_shelter_id", type="integer"),
 * )
 */
class Employee
{
}
