<?php

namespace App\Models;

use App\Http\Controllers\StatusOrderConst;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'note','status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'order_details','order_id','product_id')->withPivot(['quantity','priceEach','total']);
    }

    public function status()
    {
        if($this->status == StatusOrderConst::WAITING){
            return "WAITTING";
        }elseif ($this->status == StatusOrderConst::SHIPPING){
            return "SHIPING";
        }elseif ($this->status == StatusOrderConst::SUCCESS){
            return "SUCCESS";
        }else{
            return "CANCEL";
        }
    }
    public function statusBadge()
    {
        if($this->status == StatusOrderConst::WAITING){
            return "badge-secondary";
        }elseif ($this->status == StatusOrderConst::SHIPPING){
            return "badge-info";
        }elseif ($this->status == StatusOrderConst::SUCCESS){
            return "badge-success";
        }else{
            return "badge-danger";
        }
    }
}
