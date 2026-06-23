<?php

namespace App\Models;

use Database\Factories\ModuleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Support\Carbon;

/**
 * @property-read int $id
 * @property int $course_id
 * @property string $title
 * @property ?string $section
 * @property ?string $description
 * @property ?array<int, string> $tags
 * @property int $position
 * @property-read ?Carbon $created_at
 * @property-read ?Carbon $updated_at
 * @property-read Course $course
 */
class Module extends Model
{
    use Concerns\RecordsActivity;

    /** @use HasFactory<ModuleFactory> */
    use HasFactory;

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'position' => 'int',
        ];
    }

    /** @return Relations\BelongsTo<Course, covariant $this> */
    public function course(): Relations\BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
