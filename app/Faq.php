<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['question', 'answer', 'pos'];
}
