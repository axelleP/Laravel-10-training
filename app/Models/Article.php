<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image'
    ];

    public static function getRules(): array {
        return [
            'name' => 'required|max:50',
            'description' => 'required',
            'price' => 'required|decimal:0,2|min:0|max:999999.99',
            'image' => 'required|image'
        ];
    }
}
