<?php

namespace Modules\Projects\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Clients\App\Models\Clients;
use Modules\Projects\Database\Factories\ProjectFactory;

class Projects extends Model
{
    use HasFactory;

    const STATUS_LIST = ["open","blocked","in progress","cancelled","complated"];
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        "title",
        "description",
        "user_id",
        "client_id",
        "status",
        "deadline"
    ];

    protected static function newFactory(): ProjectFactory
    {
        return ProjectFactory::new();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,"user_id");
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Clients::class, 'client_id', "id");
    }

    /**
     * Scope a query to get all users.
     *
     * @param \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAllUsers()
    {
        return User::query()->get();
    }

    /**
     * Scope a query to get all alients.
     *
     * @param \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAllClients()
    {
        return Clients::query()->get();
    }
}
