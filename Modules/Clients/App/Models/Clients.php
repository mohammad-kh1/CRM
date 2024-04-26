<?php

namespace Modules\Clients\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Clients\Database\Factories\ClientsFactory;
use Modules\Projects\App\Models\Projects;

class Clients extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        "name",
        "company_name",
        "email",
        "vat",
        "address",
        "city",
        "zip",
        "phone_number"
    ];

    protected static function newFactory(): ClientsFactory
    {
        return ClientsFactory::new();
    }
    public function projects() : HasMany
    {
        return $this->hasMany(Projects::class,"client_id");
    }
}
