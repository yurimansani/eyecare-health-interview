<?php

namespace App\Models;

use App\Enums\Patient\GenderEnum;
use Database\Factories\PatientFactory;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, HasUuids, HasTimestamps,SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'birth_date',
        'description',
        'cpf',
        'rg',
        'gender',
        'phone',
    ];

    protected $appends = ['gender_label'];

    protected $casts = [
        'birth_date' => 'date',
        'gender' => GenderEnum::class,
    ];


    public function getGenderLabelAttribute(): string
    {
        return GenderEnum::getLabel($this->gender);
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return PatientFactory::new();
    }
}
