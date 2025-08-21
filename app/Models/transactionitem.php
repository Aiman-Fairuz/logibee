<?php
// app/Models/TransactionItem.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $table = 'transaction_items';
    protected $primaryKey = 'trx_item_id';
    public $timestamps = false;

    protected $fillable = ['trx_id', 'prd_id', 'quantity', 'subtotal'];

    public function product() {
        return $this->belongsTo(Product::class, 'prd_id');
    }

    public function transaction() {
        return $this->belongsTo(Transaction::class, 'trx_id');
    }
}
