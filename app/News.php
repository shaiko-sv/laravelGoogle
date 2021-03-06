<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    protected $fillable = [
        'title', 'shortText', 'text', 'isPrivate', 'image', 'category_id'
    ];
    /**
     * @var string
     */

    /**
     * @return BelongsTo
     * @var string
     */

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
