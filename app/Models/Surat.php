<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filter;
use App\QueryFilters\Status;
class Surat extends Model
{

    use Filter;

    protected $casts = [
        'tanggal'  => 'datetime:d/m/Y',
    ];

     protected function getFilters()
    {
        return [
            Status::class,
        ];
    }
    protected $table = 'surats';


    public function remarks()
    {
        return $this->morphMany(Remarks::class,'remarkable');
    }
}
