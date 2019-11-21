<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parrot extends Model
{
    protected $table = 'parrots';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = true;
    protected $guarded = [];

    public function zooname()
    {
        return $this->belongsTo('App\Zooname');
    }

    public function parrotname()
    {
        return $this->belongsTo('App\Parrotname');
    }
}
