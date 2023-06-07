<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedModule extends Model
{
    use HasFactory;

    protected $fillable = ['module_id'];
    protected $table = 'featuredmodule';


    public function module(){
        return $this->hasOne(Module::class, 'id');
    }
}
