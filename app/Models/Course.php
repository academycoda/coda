<?php

namespace App\Models;

use App\Enums\CourseStatus;
use Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @property-read int $id
 * @property ?int $venue_id
 * @property ?int $lecturer_id
 * @property string $title
 * @property string $slug
 * @property ?string $tagline
 * @property ?string $excerpt
 * @property ?string $description
 * @property ?string $audience
 * @property ?int $capacity
 * @property string $price
 * @property ?Carbon $published_at
 * @property ?Carbon $opened_at
 * @property ?Carbon $closed_at
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property ?array<int, string> $outcomes
 * @property ?array<string, string> $faqs
 * @property ?array<int, string> $tags
 * @property ?array<string, mixed> $meta
 * @property-read ?Carbon $created_at
 * @property-read ?Carbon $updated_at
 * @property-read CourseStatus $status
 * @property-read int $duration_weeks
 * @property-read bool $is_published
 * @property-read bool $is_open
 * @property-read bool $is_active
 * @property-read bool $is_ended
 * @property-read ?Venue $venue
 * @property-read ?Lecturer $lecturer
 * @property-read Collection<int, Module> $modules
 * @property-read Collection<int, Application> $applications
 */
class Course extends Model
{
    use Concerns\RecordsActivity;

    /** @use HasFactory<CourseFactory> */
    use HasFactory;

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'capacity' => 'int',
            'price' => 'decimal:2',
            'published_at' => 'datetime',
            'opened_at' => 'datetime',
            'closed_at' => 'datetime',
            'start_date' => 'date',
            'end_date' => 'date',
            'outcomes' => 'array',
            'faqs' => 'array',
            'tags' => 'array',
            'meta' => 'array',
        ];
    }

    /** @return Attribute<int, never> */
    protected function durationWeeks(): Attribute
    {
        return Attribute::get(fn (): int => (int) $this->start_date->diffInWeeks($this->end_date));
    }

    /** @return Attribute<bool, never> */
    protected function isPublished(): Attribute
    {
        return Attribute::get(fn (): bool => $this->published_at !== null && $this->published_at->isPast());
    }

    /** @return Attribute<bool, never> */
    protected function isOpen(): Attribute
    {
        return Attribute::get(fn (): bool => $this->is_published
            && $this->opened_at !== null
            && $this->closed_at !== null
            && $this->opened_at->isPast()
            && $this->closed_at->isFuture());
    }

    /** @return Attribute<bool, never> */
    protected function isActive(): Attribute
    {
        return Attribute::get(fn (): bool => $this->is_published
            && $this->start_date->isPast()
            && $this->end_date->isFuture());
    }

    /** @return Attribute<bool, never> */
    protected function isEnded(): Attribute
    {
        return Attribute::get(fn (): bool => $this->is_published && $this->end_date->isPast());
    }

    /** @return Attribute<CourseStatus::Active|CourseStatus::Closed|CourseStatus::Draft|CourseStatus::Ended|CourseStatus::Listed|CourseStatus::Open, never> */
    protected function status(): Attribute
    {
        return Attribute::get(fn (): CourseStatus => match (true) {
            ! $this->is_published => CourseStatus::Draft,
            $this->is_ended => CourseStatus::Ended,
            $this->is_active => CourseStatus::Active,
            $this->is_open => CourseStatus::Open,
            $this->closed_at !== null && $this->closed_at->isPast() => CourseStatus::Closed,
            default => CourseStatus::Listed,
        });
    }

    /** @param Builder<$this> $query */
    #[Scope]
    protected function published(Builder $query): void
    {
        $query->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    /** @param Builder<$this> $query */
    #[Scope]
    protected function opened(Builder $query): void
    {
        $query->published()
            ->whereNotNull('opened_at')
            ->whereNotNull('closed_at')
            ->where('opened_at', '<=', now())
            ->where('closed_at', '>', now());
    }

    /** @return Relations\BelongsTo<Venue, covariant $this> */
    public function venue(): Relations\BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    /** @return Relations\BelongsTo<Lecturer, covariant $this> */
    public function lecturer(): Relations\BelongsTo
    {
        return $this->belongsTo(Lecturer::class);
    }

    /** @return Relations\HasMany<Module, covariant $this> */
    public function modules(): Relations\HasMany
    {
        return $this->hasMany(Module::class)->orderBy('position');
    }

    /** @return Relations\HasMany<Application, covariant $this> */
    public function applications(): Relations\HasMany
    {
        return $this->hasMany(Application::class);
    }
}
