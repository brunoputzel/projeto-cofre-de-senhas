<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
protected $fillable = [
    'user_id',
    'service_name',
    'username',
    'password',
];

protected function password(): Attribute
{
    return Attribute::make(
        get: fn (string $value) => Crypt::decryptString($value),
        set: fn (string $value) => Crypt::encryptString($value),
    );
}
}
