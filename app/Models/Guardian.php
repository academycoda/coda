<?php

namespace App\Models;

use Database\Factories\GuardianFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @property-read int $id
 * @property string $name
 * @property ?string $email
 * @property ?string $phone
 * @property ?string $relationship
 * @property-read ?Carbon $created_at
 * @property-read ?Carbon $updated_at
 * @property-read Collection<int, Student> $students
 */
class Guardian extends Model
{
    use Concerns\RecordsActivity;

    /** @use HasFactory<GuardianFactory> */
    use HasFactory;

    /** @return Relations\HasMany<Student, covariant $this> */
    public function students(): Relations\HasMany
    {
        return $this->hasMany(Student::class);
    }
}
