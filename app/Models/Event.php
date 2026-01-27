<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Properti $fillable ini WAJIB ada agar kita bisa melakukan 'Event::create()'
    // Daftar kolom ini harus sama persis dengan yang ada di file Migration
    protected $fillable = [
        'title',
        'date',
        'location',
        'client_name',
        'price',
        'status',
        'image', // Cover Utama
        'doc1',  // Foto Dok 1
        'doc2',  // Foto Dok 2
        'doc3',  // Foto Dok 3
        'description',
        'is_featured',
    ];
}
