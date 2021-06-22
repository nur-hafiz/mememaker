<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meme extends Model
{
    use HasFactory;

    protected $title;
    protected $image;
    protected $guarded = ['id'];
    // protected $fillable = array('title', 'image');

    public function scopeFilter ($query, $condition)
    {
        // ddd($condition);
        return $query
            ->where('title', 'like', '%' . $condition . '%')
            ->orWhere('image', '=', $condition)
            ->get();
    }

}
