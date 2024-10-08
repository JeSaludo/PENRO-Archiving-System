<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'permit_type',
        'land_category',
        'municipality',
        'file_name',
        'file_path',
        'office_source',
        'category',
        'classification',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function treeCuttingPermits()
    {
        return $this->hasMany(TreeCuttingPermit::class);
    }

    public function chainsawRegistrations()
    {
        return $this->hasMany(ChainsawRegistration::class);
    }

    public function treePlantationRegistrations()
    {
        return $this->hasMany(TreePlantation::class);
    }

    public function transportPermits()
    {
        return $this->hasMany(TransportPermit::class);
    }

    public function landTitles()
    {
        return $this->hasMany(LandTitle::class);
    }
}
