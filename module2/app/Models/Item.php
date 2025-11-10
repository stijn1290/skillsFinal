<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $table = "items";
    protected $fillable = [
        "titel",
        "beschrijving",
        "prioriteit",
        "tijdsduur",
        "user_id",
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
