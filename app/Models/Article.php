<?php


namespace App\Models;


class Article extends Model
{
    protected $table = 'article';

    public function scopeType($query,$type=0)
    {
        return $query->where('type',$type);
    }

    public function label()
    {
        return $this->hasManyThrough(ArticleLabel::class,ArticleHasLabel::class,"article_id","id",'id','label_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }


}