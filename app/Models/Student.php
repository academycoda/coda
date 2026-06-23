<?php

namespace App\Models;

use Database\Factories\StudentFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @property-read int $id
 * @property ?int $guardian_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property ?string $phone
 * @property ?Carbon $birth_date
 * @property ?string $school
 * @property ?string $bio
 * @property ?string $notes
 * @property-read ?Carbon $created_at
 * @property-read ?Carbon $updated_at
 * @property-read string $name
 * @property-read ?int $age
 * @property-read ?Guardian $guardian
 * @property-read Collection<int, Application> $applications
 */
class Student extends Model
{
    use Concerns\RecordsActivity;

    /** @use HasFactory<StudentFactory> */
    use HasFactory;

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
        ];
    }

    /** @return Attribute<string, never> */
    protected function name(): Attribute
    {
        return Attribute::get(fn (): string => trim("{$this->first_name} {$this->last_name}"));
    }

    /** @return Attribute<int|null, never> */
    protected function age(): Attribute
    {
        return Attribute::make(
            get: fn (): ?int => $this->birth_date?->age,
        );
    }

    /** @return Relations\BelongsTo<Guardian, covariant $this> */
    public function guardian(): Relations\BelongsTo
    {
        return $this->belongsTo(Guardian::class);
    }

    /** @return Relations\HasMany<Application, covariant $this> */
    public function applications(): Relations\HasMany
    {
        return $this->hasMany(Application::class);
    }
}
