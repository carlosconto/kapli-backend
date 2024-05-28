<?php

namespace Kapli\Chapters\Infrastructure;

use Illuminate\Database\Eloquent\Model;
use Kapli\Books\Infrastructure\EloquentBookModel;

class EloquentChapterModel extends Model
{

    public $table = 'chapters';

    public $fillable = [
        'name',
        'slug',
        'description',
        'book_id',
    ];

    public function book()
    {
        return $this->belongsTo(EloquentBookModel::class, 'book_id', 'id');
    }
    
}
