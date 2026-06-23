<?php

namespace App\Models;

use Database\Factories\LecturerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property-read int $id
 * @property string $name
 * @property ?string $role
 * @property ?string $bio
 * @property ?array<int, string> $tags
 * @property ?array<string, string> $links
 * @property-read ?Carbon $created_at
 * @property-read ?Carbon $updated_at
 * @property-read Collection<int, Course> $courses
 */
class Lecturer extends Model implements HasMedia
{
    use Concerns\RecordsActivity;

    /** @use HasFactory<LecturerFactory> */
    use HasFactory;

    use InteractsWithMedia;

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'links' => 'array',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('lecturer_avatar')
            ->singleFile();
    }

    /** @return Relations\HasMany<Course, covariant $this> */
    public function courses(): Relations\HasMany
    {
        return $this->hasMany(Course::class);
    }
}
