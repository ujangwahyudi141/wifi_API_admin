<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wifi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function scopeFilter($query)
    {
            if(request('search')){
                $query->where('id','like','%'.request('search').'%')
                 ->orWhere('nama_wifi','like','%'.request('search').'%');
            }
    }
}
