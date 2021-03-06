<?php

namespace App\Models\LibraryMedia;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class LibraryMediaCategory extends Model
{
    use HasTranslations;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatable = ['name'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'library_media_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany(LibraryMediaFile::class, 'category_id', 'id');
    }
}
