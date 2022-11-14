<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RoomRequest
 *
 * @property integer $id
 * @property integer $owner_id
 * @property integer $friend_id
 * @property string $token
 * @property string $status
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 */
class RoommateRequest extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->belongsTo(Attender::class, 'owner_id', 'a_id');
    }

    public function friend()
    {
        return $this->belongsTo(Attender::class, 'friend_id', 'a_id');
    }
}
