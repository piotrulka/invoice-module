<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Infrastructure\Database\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function productLines(): HasMany
    {
        return $this->hasMany(InvoiceProductLine::class, 'invoice_id', 'id');
    }
}
