<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $ip
 * @property string $user_agent
 * @property $clicked_at
 * @property int $link_id
 */
class Click extends Model
{
    protected $table = 'clicks';

    protected $fillable = ['ip', 'user_agent', 'clicked_at', 'link_id'];

    public $timestamps = true;

    /**
     * @return BelongsTo
     */
    public function link(): BelongsTo
    {
        return $this->belongsTo(Link::class);
    }
}
