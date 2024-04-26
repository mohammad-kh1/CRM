<?php

namespace Modules\Tasks\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Clients\App\Models\Clients;
use Modules\Projects\App\Models\Projects;
use Modules\Tasks\Database\Factories\TaskFactory;

class Tasks extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    const STATUS_LIST = ["open", "blocked", "in progress", "cancelled", "complated"];

    protected $fillable = [
        "title",
        "description",
        "deadline",
        "user_id",
        "client_id",
        "project_id",
        "status"
    ];

    protected static function newFactory(): TaskFactory
    {
        return TaskFactory::new();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function client() : BelongsTo
    {
        return $this->belongsTo(Clients::class,"client_id");
    }
    public function project() : BelongsTo
    {
        return $this->belongsTo(Projects::class,"project_id");
    }
    public function allUsers()
    {
        return User::query();
    }
    public function allClients()
    {
        return Clients::query();
    }
    public function allProjects()
    {
        return Projects::query();
    }
}
