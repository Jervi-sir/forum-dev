<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Field;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'articles_tags');
    }

    public function fileds()
    {
        return $this->belongsToMany(Field::class, 'articles_fields');
    }

}