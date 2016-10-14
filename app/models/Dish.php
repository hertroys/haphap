<?php
namespace App\Models;

use Eloquent;

class Dish extends Eloquent
{
    use Validable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Return the tags associated with the dish.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'dishes_tags');
    }

    /**
     * Return the dishes having at least $count of $tags.
     *
     * @param  array  $tags
     * @param  int  $count
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function withTags($tags = [], $count = 1)
    {
        return static::whereHas('tags', function ($q) use ($tags) {
            $q->whereIn('id', (array)$tags);
        }, '>=', $count)->get();
    }

    /**
     * Return the dishes having all of the $tags.
     *
     * @param  arary  $tags
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function withAllTags($tags)
    {
        return static::withTags($tags, count($tags));
    }

    /**
     * Return the validation rules for the model.
     *
     * @return array
     */
    public function rules()
    {
        return ['name' => 'required | unique:dishes,name,'.$this->id];
    }
}
