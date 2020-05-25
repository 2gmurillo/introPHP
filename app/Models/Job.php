<?php

namespace App\Models;

class Job extends BaseElement implements Printable
{
    public function __construct($company, $title, $picture, $months)
    {
        parent::__construct($company, $title, $picture);
        $this->months = $months;
    }
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
