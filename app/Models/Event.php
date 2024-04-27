<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'date', 'participants', 'setup'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function confirmedBy()
{
    return $this->belongsTo(User::class, 'confirmed_by');
}

}
