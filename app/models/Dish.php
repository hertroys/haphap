<?php
namespace App\Models;

use Eloquent;

class Dish extends Eloquent
{
    use Validable;

    protected $guarded = ['id'];

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'dishes_tags');
    }

    public static function withTags($tags = [], $count = 1)
    {
        return static::whereHas('tags', function($q) use ($tags) {
            $q->whereIn('id', (array)$tags);
        }, '>=', $count)->get();
    }

    public static function withAllTags($tags)
    {
        return static::withTags($tags, count($tags));
    }

    public function rules()
    {
        return ['name' => 'required | unique:dishes,name,'.$this->id];
    }
}
