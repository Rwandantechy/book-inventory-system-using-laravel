<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books'; 
    protected $primaryKey = 'BookID'; 
    protected $fillable = [
        'Book_title', 
        'ISBN',
        'Author',
        'Publisher',
        'Edition',
        'Category',
        'Rack',
        'CopiesAvailable',
        'Price',
        'PublicationDate',
        'BookURL',
    ];
    public $timestamps = false;

}

