<?php

namespace App\Models;

use Database\Factories\VenueFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @property-read int $id
 * @property string $name
 * @property ?string $address
 * @property ?string $website
 * @property-read ?Carbon $created_at
 * @property-read ?Carbon $updated_at
 * @property-read Collection<int, Course> $courses
 * @property-read Collection<int, Event> $events
 */
class Venue extends Model
{
    use Concerns\RecordsActivity;

    /** @use HasFactory<VenueFactory> */
    use HasFactory;

    /** @return Relations\HasMany<Course, covariant $this> */
    public function courses(): Relations\HasMany
    {
        return $this->hasMany(Course::class);
    }

    /** @return Relations\HasMany<Event, covariant $this> */
    public function events(): Relations\HasMany
    {
        return $this->hasMany(Event::class);
    }
}
