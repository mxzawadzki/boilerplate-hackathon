<?php
namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\LinkedSocialAccount
 *
 * @property int $id
 * @property string $provider_id
 * @property string $provider_name
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LinkedSocialAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LinkedSocialAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LinkedSocialAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LinkedSocialAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LinkedSocialAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LinkedSocialAccount whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LinkedSocialAccount whereProviderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LinkedSocialAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LinkedSocialAccount whereUserId($value)
 * @mixin \Eloquent
 */
class LinkedSocialAccount extends Model
{
    protected $fillable = [
        'provider_name',
        'provider_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
