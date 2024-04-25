<?php

namespace Modules\Clients\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Clients\Database\Factories\ClientsFactory;

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
}
