<?php

namespace Kapli\Books\Infrastructure;

use Illuminate\Database\Eloquent\Model;
use Kapli\Chapters\Infrastructure\EloquentChapterModel;

class EloquentBookModel extends Model
{
    protected $table = 'books';

    protected $fillable = ['title', 'author', 'description', 'genre', 'status', 'user_id'];

    public function chapters()
    {
        return $this->hasMany(EloquentChapterModel::class, 'book_id', 'id');
    }
}
