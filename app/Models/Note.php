<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Note extends Model
{
    use HasFactory;

    public static function boot() {
        parent::boot();
        static::deleting(function ($item) {
            if ($path = public_path($item->photo)) {
                File::delete($path);
            }
        });
    }

    public function __construct()
    {
        $this->table = 'user_' . auth()->user()->id;
    }

    public static function scopeFilter($noteQuery, $filter = [])
    {
        if ($search = $filter['search'] ?? null) {
            $noteQuery->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('body', 'LIKE', '%' . $search . '%');
            });
        }

        if ($search = $filter['sortBy'] ?? null) {
            if ($search === "Oldest") {
                $noteQuery->oldest();
            } else {
                $noteQuery->latest();
            }
        } else {
            $noteQuery->latest();
        }
    }
}
