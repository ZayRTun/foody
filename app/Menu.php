<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
}
