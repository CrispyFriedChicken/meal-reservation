<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersPermission
 *
 * @property int $id
 * @property string $users_uuid
 * @property string $permission
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|UsersPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersPermission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersPermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersPermission wherePermission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersPermission whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersPermission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersPermission whereUsersUuid($value)
 * @mixin \Eloquent
 */
class UsersPermission extends Model
{
	protected $table = 'users_permission';

	protected $hidden = [
		'remember_token'
	];

	protected $fillable = [
		'users_uuid',
		'permission',
		'remember_token'
	];
}
