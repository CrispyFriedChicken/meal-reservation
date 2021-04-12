<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReservationGroup
 *
 * @property int $id
 * @property string $users_uuid
 * @property string $image_url
 * @property string $title
 * @property string $invite_code
 * @property string $content
 * @property string $remark
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationGroup whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationGroup whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationGroup whereInviteCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationGroup whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationGroup whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationGroup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationGroup whereUsersUuid($value)
 * @mixin \Eloquent
 */
class ReservationGroup extends Model
{
	protected $table = 'reservation_group';

	protected $hidden = [
		'remember_token'
	];

	protected $fillable = [
		'users_uuid',
		'image_url',
		'title',
		'invite_code',
		'content',
		'remark',
		'remember_token'
	];
}
