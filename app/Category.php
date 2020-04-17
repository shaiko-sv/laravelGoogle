<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function news()
    {
        return $this->hasMany('App\News');
    }

    /**
     * @example $category = Post::first();
     * @example $category->commentsCount; // 4
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne|\Illuminate\Database\Query\Builder
     */
    public function newsCount()
    {
        return $this->hasOne('App\News')
            ->selectRaw('category_id, count(*) as aggregate')
            ->groupBy('category_id');
    }

//        $category = Category::with('newsCount')->get();
//        $category->first()->newsCount;
    /**
     * @example $category = Category::with('newsCount')->get();
     * @example $category->first()->newsCount;
     *
     * @return int
     */
    public function getNewsCountAttribute()
    {
        if ( ! array_key_exists('newsCount', $this->relations))
            $this->load('newsCount');

        $related = $this->getRelation('newsCount');


        return ($related) ? (int) $related->aggregate : 0;
    }
}
