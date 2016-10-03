<?php

class Dish extends Eloquent
{
    protected $guarded = ['id'];

    public function tags()
    {
        return $this->belongsToMany('Tag', 'dishes_tags');
    }

    public static function withTags($tags)
    {
        return static::whereHas('tags', function($q) use ($tags) {
            $q->whereIn('id', $tags);
        })->get();
    }
}
