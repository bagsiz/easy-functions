<?php

namespace Bagsiz\EasyFunctions\Test\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    protected $table = 'users';

    protected $guarded = [];

    protected $fillable = ['id', 'name'];

    public function getAuthIdentifierName()
    {
        return 'id';
    }
    public function getAuthIdentifier()
    {
        $name = $this->getAuthIdentifierName();
        return $this->attributes[$name];
    }
    public function getAuthPassword()
    {
        return $this->attributes['password'];
    }
    public function getRememberToken()
    {
        return 'token';
    }
    public function setRememberToken($value)
    {
    }
    public function getRememberTokenName()
    {
        return 'tokenName';
    }
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}