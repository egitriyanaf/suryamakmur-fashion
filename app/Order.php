<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\District;
use App\OrderDetail;
use App\Payment;
use App\Customer;
use App\OrderReturn;

class Order extends Model
{
    protected $guarded = [];

    public function district(){
        return $this->belongsTo(District::class);
    }

    protected $appends = ['status_label', 'ref_status_label', 'commision', 'total'];

    public function getStatusLabelAttribute(){
        if ($this->status == 0) {
            return '<span class="badge badge-secondary">Baru</span>';
        } elseif ($this->status == 1) {
            return '<span class="badge badge-primary">Dikonfirmasi</span>';
        } elseif ($this->status == 2) {
            return '<span class="badge badge-info">Proses</span>';
        } elseif ($this->status == 3) {
            return '<span class="badge badge-warning">Dikirim</span>';
        }
        return '<span class="badge badge-success">Selesai</span>';
    }

    public function details(){
        return $this->hasMany(OrderDetail::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class);
    }

    public function customer(){
    return $this->belongsTo(Customer::class);
    }

    public function return(){
        return $this->hasOne(OrderReturn::class);
    }

    public function getRefStatusLabelAttribute(){
        if ($this->ref_status == 0) {
            return '<span class="badge badge-secondary">Pending</span>';
        }
        return '<span class="badge badge-success">Dicairkan</span>';
    }

    public function getCommisionAttribute(){
        $commision = ($this->subtotal * 10) / 100;

        return $commision > 10000 ? 10000:$commision;
    }

    public function getTotalAttribute(){
        return $this->subtotal + $this->cost;
    }
}
