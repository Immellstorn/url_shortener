<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $original_url
 * @property string $short_url
 */
class Link extends Model
{
    protected $table = 'links';

    protected $fillable = ['original_url', 'short_url'];
}
