<?php

namespace App\Models;

use App\Enums\Clubs;
use App\Enums\Role;
use App\Enums\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Attender
 *
 * @property integer $a_id
 * @property string $name
 * @property string $surname
 * @property string $mobile
 * @property string $club
 * @property string $position
 * @property integer $package_id
 * @property integer $user_id
 * @property string $reference
 * @property string $identity
 * @property string $type
 * @property string $price
 * @property string $receipt_1
 * @property string $paid_1_amount
 * @property string $paid_1_date
 * @property string $receipt_2
 * @property string $paid_2_amount
 * @property string $paid_2_date
 * @property string $status
 * @property string $room_id
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 * @property \DateTime $deleted_at
 * @property \DateTime $entered_date
 */
class Attender extends Model
{
    use HasFactory;

    protected $primaryKey = 'a_id';

    protected $fillable = [
        'name',
        'surname',
        'mobile',
        'club',
        'position',
        'package_id',
        'user_id',
        'identity',
        'type',
        'price',
        'status',
        'paid_1_amount',
        'paid_2_amount',
        'reference',
        'entered_date'
    ];

    protected $appends = [
        'club_name',
        'status_data',
    ];

    private $statuses = [
        1 => [
            'class' => 'bg-danger',
            'label' => 'Onaylanmadı'
        ],
        2 => [
            'class' => 'bg-warning text-dark',
            'label' => 'Rezervasyon'
        ],
        3 => [
            'class' => 'bg-success',
            'label' => 'Onaylandı'
        ]
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'r_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'p_id');
    }

    public function getFullnameMobileAttribute()
    {
        return $this->name . ' ' . $this->surname . ' | ' . $this->mobile;
    }

    public function getIsPaidAttribute()
    {
        return $this->price === $this->paid_1_amount + $this->paid_2_amount;
    }

    public function getClubNameAttribute()
    {
        return Clubs::getClubs()[$this->club];
    }

    public function getPositionNameAttribute()
    {
        return Role::getRole()[$this->position];
    }

    public function getHiddenNameAttribute()
    {
        return mb_strtoupper(mb_substr($this->name, 0, 1)) . '****** ' . mb_strtoupper(mb_substr($this->surname, 0, 1)) . '******';
    }

    public function getStatusDataAttribute()
    {
        return $this->statuses[$this->status];
    }

    public function getRoomSelectAttribute()
    {
        return $this->status == Status::Rezervasyon || $this->status == Status::Onaylandi;
    }
}
