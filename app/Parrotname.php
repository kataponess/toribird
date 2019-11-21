<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parrotname extends Model
{
    protected $table = 'parrotnames';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = true;
    protected $guarded = [];

    public function parrots()
    {
        return $this->hasmany('App\Parrot');
    }
}
