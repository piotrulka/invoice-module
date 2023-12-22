<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Infrastructure\Database\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public function productLines(): HasMany
    {
        return $this->hasMany(InvoiceProductLine::class, 'product_id', 'id');
    }
}
