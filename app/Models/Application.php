<?php

namespace App\Models;

use App\Enums\ApplicationStatus;
use Database\Factories\ApplicationFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Support\Carbon;

/**
 * @property-read int $id
 * @property int $course_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property Carbon $birth_date
 * @property ?string $school
 * @property string $bio
 * @property ?string $guardian_name
 * @property ?string $guardian_email
 * @property ?string $guardian_phone
 * @property bool $marketing_consent
 * @property ApplicationStatus $status
 * @property ?string $review
 * @property ?Carbon $reviewed_at
 * @property-read ?Carbon $created_at
 * @property-read ?Carbon $updated_at
 * @property-read string $name
 * @property-read int $age
 * @property-read Course $course
 */
class Application extends Model
{
    use Concerns\RecordsActivity;

    /** @use HasFactory<ApplicationFactory> */
    use HasFactory;

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'marketing_consent' => 'bool',
            'status' => ApplicationStatus::class,
            'reviewed_at' => 'datetime',
        ];
    }

    /** @return Attribute<string, never> */
    protected function name(): Attribute
    {
        return Attribute::get(fn (): string => trim("{$this->first_name} {$this->last_name}"));
    }

    /** @return Attribute<int, never> */
    protected function age(): Attribute
    {
        return Attribute::get(fn (): int => $this->birth_date->age);
    }

    /** @param Builder<static> $query */
    #[Scope]
    protected function submitted(Builder $query): void
    {
        $query->where('status', '=', ApplicationStatus::Submitted);
    }

    /** @return Relations\BelongsTo<Course, covariant $this> */
    public function course(): Relations\BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
