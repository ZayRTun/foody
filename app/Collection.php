<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    // public $collectionList = [
    //     'Quick Meals',
    //     'Pastas',
    //     'Pizzas',
    //     'Fastfood',
    //     'Rice & Biryanis',
    //     'Sandwiches',
    //     'Seafoods',
    //     'Sushis',
    //     'Myan Noodles',
    // ];
    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}
