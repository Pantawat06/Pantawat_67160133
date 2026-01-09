<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokedex extends Model
{
    use HasFactory;

    // ชื่อตารางในฐานข้อมูล (ตาม Migration ของคุณ)
    protected $table = 'pokedexs';

    // รายชื่อคอลัมน์ที่อนุญาตให้เพิ่มข้อมูลได้
    protected $fillable = [
        'name',
        'type',
        'species',
        'height',
        'weight',
        'hp',
        'attack',
        'defense',
        'image_url',
    ];
}