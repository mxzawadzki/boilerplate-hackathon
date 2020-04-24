<?php

namespace App\Models;

use App\User;
use Illuminate\Notifications\Notifiable;
use Backpack\CRUD\app\Models\Traits\InheritsRelationsFromParentModel;
use Backpack\CRUD\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;

/**
 * App\Models\BackpackUser
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $score
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int $is_admin
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $api_token
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LinkedSocialAccount[] $linkedSocialAccounts
 * @property-read int|null $linked_social_accounts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BackpackUser whereApiToken($value)
 */
class BackpackUser extends User
{
    use InheritsRelationsFromParentModel;
    use Notifiable;

    protected $table = 'users';

    /**
     * Send the password reset notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }
}
