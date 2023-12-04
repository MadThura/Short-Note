<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            $tableName = 'user_' . $user->id;
            Schema::create($tableName, function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('body');
                $table->string('bg_color')->default('#fff');
                $table->boolean('pin')->default(0);
                $table->boolean('trash')->default(0);
                $table->timestamps();
            });
        });

        static::deleting(function ($user) {
            $tableName = 'user_' . $user->id;
            Schema::dropIfExists($tableName);
            if ($user->photo != "/images/M A D.png" && $path = public_path($user->photo)) {
                File::delete($path);
            }
        });
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
