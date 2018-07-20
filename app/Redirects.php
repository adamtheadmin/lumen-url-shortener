<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redirects extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'redirects';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hash', 'link'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}