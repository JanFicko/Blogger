<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    protected $fillable = [
        'title',
        'body',
        'published_at'
    ];

    /**
     * Create this global variable if you want to carbonate it.
     * Example: $article->published_at->format('Y-m');
     *
     * @var array
     */
    protected $dates = ['published_at'];


    /**
     * Scope queries to articles that have been published
     *
     * Use Article::published($value) to trigger this method.
     *
     * @param $query
     */
    public function scopePublished($query){ //scopePublished($query, $value)
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Set the published_at attribute.
     *
     * Use this kind of methods with prefix set[attribute_name]Attribute if you want Laravel
     * to do something behind the scenes
     *
     * @param $date
     */
    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function scopeUnpublished($query){
        $query->where('published_at', '>', Carbon::now());
    }

    /**
     * An article is owned by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Get a list of tag id's associated with article.
     *
     * @return mixed
     */
    public function getTagListAttribute(){
         return $this->tags->lists('id')->all();
    }

}
