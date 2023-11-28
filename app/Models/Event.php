<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'img_url',
        'hold_date',
        'premium_ticket_price',
        'normal_ticket_price',
        'venue',
    ];

    public function rlSubImage()
    {
        return $this->hasMany(SubImage::class, 'event_id', 'id');
    }
}
