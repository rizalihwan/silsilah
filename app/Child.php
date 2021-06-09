<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function grandchilds()
    {
        return $this->hasMany(Grandchild::class);
    }
    
    public function getGenderDefinitionAttribute()
    {
        return $this->gender === 0 ? '<span class="badge badge-primary">Pria</span>' : '<span class="badge badge-danger">Perempuan</span>';
    }
}
