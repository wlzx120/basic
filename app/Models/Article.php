<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Column;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'title', 'content', 'column_id', 'author'
    ];

    public function column()
    {
        return $this->belongsTo(Column::class, 'column_id');
    }
}