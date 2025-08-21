<?php
// app/Models/Transaction.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'trx_id';
    protected $fillable = ['user_id', 'total'];

    public function items() {
        return $this->hasMany(TransactionItem::class, 'trx_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
