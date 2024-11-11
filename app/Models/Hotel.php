<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'zip_code',
        'website'
    ];

    public function scopeFilter($query, $filters): void
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('city', 'like', '%' . $search . '%')
                    ->orWhere('state', 'like', '%' . $search . '%')
                    ->orWhere('zip_code', 'like', '%' . $search . '%')
                    ->orWhere('website', 'like', '%' . $search . '%');
            });
        });
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
