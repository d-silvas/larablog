<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Storage;

use App\Category;
use App\Tag;

class Post extends Model
{
    use softDeletes;

    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
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
        return $this->belongsToMany(Tag::class);
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
