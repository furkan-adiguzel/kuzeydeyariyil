<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Package
 *
 * @property integer $p_id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property float $price_1
 * @property float $price_2
 * @property float $price_3
 * @property integer $night
 * @property integer $room_person
 * @property \DateTime $created_at
 * @property \DateTime $deleted_at
 */
class Package extends Model
{
    use HasFactory;
}
