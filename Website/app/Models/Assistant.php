<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Assistant extends Model
{
    use HasFactory, Notifiable;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $primaryKey = 'assistant_id';

    protected $fillable = [
        'assistant_id',
        'user_id',
        'name',
    ];
}
