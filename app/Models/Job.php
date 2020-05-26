<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model implements Printable
{
    protected $table = 'jobs';
    public $visible = true;
    public function getDurationAsString()
    {
        $years = floor($this->months / 12);
        $extraMonths = $this->months % 12;
        if ($years == 1) {
            $stringYears = "$years year ";
        } else {
            $stringYears = ($years > 0) ? "$years years " : "";
        }
        if ($extraMonths == 1) {
            $stringMonths = "$extraMonths month ";
        } else {
            $stringMonths = ($extraMonths > 0) ? "$extraMonths months " : "";
        }
        return "$stringYears $stringMonths";
    }
}
