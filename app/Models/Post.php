<?php

namespace App\Models;

use App\Http\Requests\StorePost;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class Post
 * @package App\Models
 * @mixin Builder
 */
class Post extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'category_id',
        'image',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function uploadImage(StorePost $request , $image = null)
    {
        if($request->hasFile('image')){
            if($image){
                Storage::delete($image);
            }
            $folder  = date('Y-m-d');
           return $request->file('image')->store("images/{$folder}");
        }
        return null;
    }

    public function getImage()
    {
        if (!$this->image) {
            return asset("no-image.png");
        }
        return asset("uploads/{$this->image}");
    }

    public function getPostDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d F, Y');
    }

    public function scopeLike($query, $s)
    {
        return $query->where('title', 'LIKE', "%$s%");
    }

}
