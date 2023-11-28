<?php

namespace App\Models;

use App\Casts\Telephone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperFacility
 */
class Facility extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $with = ['service', 'area', 'company'];

    protected $casts = [
        'tel' => Telephone::class,
    ];

    protected $fillable = [
        'id',
        'name',
        'name_kana',
        'address',
        'tel',
        'url',
        'no',
        'pref_id',
        'area_id',
        'company_id',
        'service_id',
    ];

    public function pref(): BelongsTo
    {
        return $this->belongsTo(Pref::class);
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
