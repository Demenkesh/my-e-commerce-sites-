<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'email',
        'phone',
        'address1',
        'city',
        'state',
        'country',
        'zipcode',
        'total_price',
        'status',
        'message',
        'tracking_no',
        'payment_mode',
        'payment_id',
        // 'tx_ref',
    ];
    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
    // public function productImages(){
    //     return $this->hasMany(ProductImage::class,'product_id','id');
    // }
}
