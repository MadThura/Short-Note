<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

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
    }
}
