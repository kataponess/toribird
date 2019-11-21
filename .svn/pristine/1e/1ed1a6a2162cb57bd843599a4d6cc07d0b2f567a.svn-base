<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zooname extends Model
{
    protected $table = 'zoonames';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = true;
    protected $guarded = [];

    public function prefecture()
    {
        return $this->belongsTo('App\Prefecture');
    }

    public function parrots()
    {
        return $this->hasmany('App\Parrot');
    }
}
