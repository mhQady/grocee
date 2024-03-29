<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FileOwner extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'file_owner';

    protected $fillable = ['name'];
}
