<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserReservationGroup
 *
 * @property int $id
 * @property string $users_uuid
 * @property string $reservation_group_uuid
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|UserReservationGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserReservationGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserReservationGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserReservationGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReservationGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReservationGroup whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReservationGroup whereReservationGroupUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReservationGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReservationGroup whereUsersUuid($value)
 * @mixin \Eloquent
 */
class UserReservationGroup extends Model
{
	protected $table = 'user_reservation_group';

	protected $hidden = [
		'remember_token'
	];

	protected $fillable = [
		'users_uuid',
		'reservation_group_uuid',
		'remember_token'
	];
}
