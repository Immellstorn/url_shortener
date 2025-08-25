<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $ip
 * @property string $user_agent
 * @property $clicked_at
 */
class Click extends Model
{
    protected $table = 'clicks';

    protected $fillable = ['ip', 'user_agent', 'clicked_at'];

    public $timestamps = true;
}
