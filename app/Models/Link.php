<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $original_url
 * @property string $short_url
 */
class Link extends Model
{
    protected $table = 'links';

    protected $fillable = ['original_url', 'short_url'];

    /**
     * @return HasMany
     */
    public function clicks(): HasMany
    {
        return $this->hasMany(Click::class, 'link_id');
    }
}
