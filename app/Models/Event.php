<?php

namespace App\Models;

use App\Enums\EventStatus;
use App\Enums\EventType;
use Database\Factories\EventFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Support\Carbon;

/**
 * @property-read int $id
 * @property ?int $venue_id
 * @property string $title
 * @property string $slug
 * @property EventType $type
 * @property ?string $description
 * @property EventStatus $status
 * @property ?int $capacity
 * @property string $price
 * @property Carbon $started_at
 * @property Carbon $ended_at
 * @property-read ?Carbon $created_at
 * @property-read ?Carbon $updated_at
 * @property-read int $duration_minutes
 * @property-read ?Venue $venue
 */
class Event extends Model
{
    use Concerns\RecordsActivity;

    /** @use HasFactory<EventFactory> */
    use HasFactory;

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'type' => EventType::class,
            'status' => EventStatus::class,
            'capacity' => 'int',
            'price' => 'decimal:2',
            'started_at' => 'datetime',
            'ended_at' => 'datetime',
        ];
    }

    /** @return Attribute<int, never> */
    protected function durationMinutes(): Attribute
    {
        return Attribute::make(fn (): int => (int) $this->started_at->diffInMinutes($this->ended_at));
    }

    /** @param Builder<$this> $query */
    #[Scope]
    protected function scheduled(Builder $query): void
    {
        $query->where('status', '=', EventStatus::Scheduled);
    }

    /** @return Relations\BelongsTo<Venue, covariant $this> */
    public function venue(): Relations\BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }
}
