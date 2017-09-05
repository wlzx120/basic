<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Column extends Model
{
    protected $table = 'columns';

    protected $fillable = ['name'];

    public function article()
    {
        return $this->hasMany(Article::class,'column_id');
    }
}
