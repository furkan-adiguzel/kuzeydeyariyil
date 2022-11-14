<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Room
 *
 * @property integer $r_id
 * @property integer $package_id
 * @property string $detail
 * @property string $description
 * @property string $room_number
 * @property \DateTime $created_at
 * @property \DateTime $deleted_at
 *
 * @property $attenders
 * @property $package
 */
class Room extends Model
{
    use HasFactory;

    protected $primaryKey = 'r_id';

    public $timestamps = false;

    protected $fillable = [
        'package_id',
        'detail',
        'description',
        'room_number',
    ];

    public function attenders()
    {
        return $this->hasMany(Attender::class, 'room_id', 'r_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'p_id');
    }
}
