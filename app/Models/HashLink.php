<?php

namespace App\Models;

use App\Traits\Eloquents\GetNameTableEloquentTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * App\Models\HashLink
 *
 * @property int $id
 * @property int $user_id
 * @property string $token
 * @property bool $deactivated
 * @property \Illuminate\Support\Carbon $expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Winning> $winnings
 * @property-read int|null $winnings_count
 * @method static Builder|HashLink active()
 * @method static Builder|HashLink newModelQuery()
 * @method static Builder|HashLink newQuery()
 * @method static Builder|HashLink query()
 * @method static Builder|HashLink whereCreatedAt($value)
 * @method static Builder|HashLink whereDeactivated($value)
 * @method static Builder|HashLink whereExpiresAt($value)
 * @method static Builder|HashLink whereId($value)
 * @method static Builder|HashLink whereToken($value)
 * @method static Builder|HashLink whereUpdatedAt($value)
 * @method static Builder|HashLink whereUserId($value)
 * @mixin \Eloquent
 */
class HashLink extends Model
{
    use HasFactory, GetNameTableEloquentTrait;

    const DAYS_LIFE_LINK = 7;

    protected $fillable = ['user_id', 'token', 'deactivated', 'expires_at'];

    protected $casts = [
        'user_id' => 'int',
        'deactivated' => 'boolean',
        'expires_at' => 'date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function winnings(): HasMany
    {
        return $this->hasMany(Winning::class);
    }

    public function scopeActive(Builder $q)
    {
        return $q->where('expires_at', '>', now())->where('deactivated', false);
    }
}
