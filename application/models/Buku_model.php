<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// use yidas\Model as Model;
use Illuminate\Database\Eloquent\Model as Eloquent; 

class Buku_model extends Eloquent {
    
    protected $table = 'buku';
    public $timestamps = false;
    
}
