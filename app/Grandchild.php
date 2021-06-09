<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grandchild extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function child()
    {
        return $this->belongsTo(Child::class);
    }

    public function getGenderDefinitionAttribute()
    {
        return $this->gender === 0 ? '<span class="badge badge-primary">Pria</span>' : '<span class="badge badge-danger">Perempuan</span>';
    }
}
