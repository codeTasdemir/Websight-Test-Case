<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Liste;
class Card extends Model
{
    use HasFactory;
    protected $fillable = ['title','description'];

    public function list()
    {
        return $this->belongsTo(Liste::class,'list_id');
    }

    public function controls()
    {
        return $this->hasMany(Controls::class,'card_id','id');
    }
}
