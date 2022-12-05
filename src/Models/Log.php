<?php

namespace AlphaDevTeam\Logger\Models;

use AlphaDevTeam\Logger\Enums\ErrorLevelName;
use AlphaDevTeam\Logger\Enums\ErrorStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use SoftDeletes;

    protected $table = 'logs';

    protected $guarded = ['id'];

    protected $casts = [
        'level_name' => ErrorLevelName::class,
        'status' => ErrorStatus::class,
        'trace' => 'json',
    ];

    protected function trace(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

}
