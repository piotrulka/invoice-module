<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Infrastructure\Database\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InvoiceProductLine extends Model
{
    protected $table = 'invoice_product_lines';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
