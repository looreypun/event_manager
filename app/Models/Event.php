<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'main_img_url',
        'sub_img_url_one',
        'sub_img_url_two',
        'sub_img_url_three',
        'sub_img_url_four',
        'hold_date',
        'premium_ticket_price',
        'normal_ticket_price',
        'venue',
    ];

    /**
     * Get the User related to this Event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rlUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
