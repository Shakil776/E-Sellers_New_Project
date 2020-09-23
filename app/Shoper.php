<?php

namespace App;

//use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;



class Shoper extends Authenticatable
{

	protected $table = "shopers";
    protected $guard = "shopper";
    
    protected $hidden = ['password'];

}