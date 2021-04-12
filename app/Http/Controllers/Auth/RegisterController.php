<?php

namespace App\Http\Controllers\Auth;

use App\Enum\AccountTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\ReservationGroup;
use App\Models\UserReservationGroup;
use App\Models\UsersPermission;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Webpatser\Uuid\Uuid;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User;
     */
    protected function create(array $data)
    {
        $user = User::create([
            'uuid' => Uuid::generate(),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $reservationGroup = null;
        switch ($data['account_type']) {
            case AccountTypeEnum::personal:
                UsersPermission::create([
                    'users_uuid' => $user->uuid,
                    'permission' => 'user',
                ]);
                $reservationGroup = ReservationGroup::find(['invite_code' => $data['invite_code']])->first();
                $reservationGroup = ReservationGroup::create([
                    'uuid' => Uuid::generate(),
                    'users_uuid' => $user->uuid,
                    'title' => $data['title'],
                    'invite_code' => $data['invite_code'],
                    'content' => $data['content'],
                    'remark' => $data['remark'],
                    'name' => $data['name'],
                ]);
                break;
            case AccountTypeEnum::group:
                UsersPermission::create([
                    'users_uuid' => $user->uuid,
                    'permission' => 'admin',
                ]);
                $reservationGroup = ReservationGroup::find(['invite_code' => $data['invite_code']])->first();
                break;
        }
        if ($reservationGroup) {
            $userReservationGroup = UserReservationGroup::create([
                'uuid' => Uuid::generate(),
                'users_uuid' => $user->uuid,
                'reservation_group_uuid' => $reservationGroup->uuid,
            ]);
        }
        return $user;
    }
}
