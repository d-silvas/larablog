<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Storage;

use App\Category;
use App\User;
use App\Tag;

class Post extends Model
{
    use softDeletes;

    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'user_id',
        'created_at',
        'published_at',
        'category_id'
    ];

    /**
     * Delete post image from storage
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        // https://stackoverflow.com/questions/25726602/timestamps-are-not-updating-while-attaching-data-in-pivot-table/
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check if a post has a tag
     * 
     * @return boolean
     */
    public function hasTag($tagId)
    {
        // TODO: maybe this function can receive the tag itself,
        // as with route model binding
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }
}
