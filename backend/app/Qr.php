<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qr extends Model
{
    protected $fillable = [
        "string",
        "points",
    ];

    static function generateString(int $length = 64)
    {
        return substr(md5(mt_rand()), 0, $length);
    }
}
