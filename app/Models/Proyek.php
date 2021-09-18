<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filter;
use App\QueryFilters\Status;
class Proyek extends Model
{

    use Filter;

     protected function getFilters()
    {
        return [
            Status::class,
        ];
    }
    protected $table = 'proyek';
    
    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id','id');
    }

    /**
     * Get the contract record associated with the proyek.
     */
    public function kontrak()
    {
        return $this->hasOne(Kontrak::class,'proyek_id','id');
    }

    public function invoice(){
        return $this->hasOne(Invoice::class,'proyek_id','id');
    }

    public function tahapan()
    {
        return $this->hasMany(Tahapan::class, 'proyek_id','id');
    }

    public function remarks()
    {
        return $this->morphMany(Remarks::class,'remarkable');
    }
}
