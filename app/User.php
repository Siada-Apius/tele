<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    const ROLES_ID = 'roles_id';
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'alias',
        'username',
        'extension',
        'password',
        'status',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function roles()
    {
        return $this->belongsToMany('App\Roles');
    }

    /**
     * Get a list of roles ids associated with current user
     *
     * @return array
     */
    public function getRoleListAttribute()
    {
        return $this->roles()->lists('roles_id')->all();
    }

    /**
     * Hash password
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function records()
    {
        return $this->hasMany('App\UserRecords');
    }

    public static function userHasRole($role = 'admin')
    {
        $roles = array();
        if (!Auth::user()) {
            abort(404);
        }
        foreach (Auth::user()->roles as $user) {
            $roles[] = $user->role;
        }
        if (in_array($role, $roles)) {
            return true;
        }

        return false;
    }

    /**
     * Create new user, store to db
     *
     * @param $request
     * @return static
     */
    public static function createUser($request)
    {
        return self::create($request);
    }

    /**
     * Do synchronizing of tables 'user' and 'roles'
     *
     * @param User $user
     * @param array $roles
     */
    public static function syncRoles(User $user, array $roles)
    {
        $user->roles()->sync($roles);
    }
}
