<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $table= 'domain';
    protected $fillable= ['domain','url','harga','terbilang'];
}
