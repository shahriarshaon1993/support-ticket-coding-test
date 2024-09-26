<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ticket_number', 'title', 'description', 'status', 'closed_at'];

    public static function boot(): void
    {
        parent::boot();

        static::saving(function ($model) {
            $model->ticket_number = strtoupper(uniqid('tick'));
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
