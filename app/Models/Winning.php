<?php

namespace App\Models;

use App\Traits\Eloquents\GetNameTableEloquentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Winning
 *
 * @property int $id
 * @property int $hash_link_id
 * @property int $rand_number
 * @property float $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read bool $is_win
 * @property-read string $text_win
 * @method static \Illuminate\Database\Eloquent\Builder|Winning newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Winning newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Winning query()
 * @method static \Illuminate\Database\Eloquent\Builder|Winning whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winning whereHashLinkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winning whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winning whereRandNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winning whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winning whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Winning extends Model
{
    use HasFactory, GetNameTableEloquentTrait;

    protected $fillable = ['hash_link_id', 'rand_number', 'total'];

    protected $casts = [
        'hash_link_id' => 'integer',
        'rand_number' => 'integer',
        'total' => 'float'
    ];

    public function getIsWinAttribute(): bool
    {
        return $this->total > 0;
    }

    public function getTextWinAttribute(): string
    {
        return ($this->is_win ? __('Win') : __('Lose')) ." {$this->total}";
    }


}
