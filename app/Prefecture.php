<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $table = 'prefectures';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = false;
    protected $guarded = [];

    public function zoonames()
    {
        return $this->hasMany('App\Zooname');
    }
}
