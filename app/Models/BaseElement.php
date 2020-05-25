<?php

namespace App\Models;

class BaseElement
{
    // private $company; /* Inaccesible fuera de este scope */
    protected $company; /* Tmbién accesible desde las clases hijas */
    public $title;
    public $picture;
    public $visible = true;
    public $months;
    public $functions;
    public function __construct($company, $title, $picture)
    {
        $this->setCompany($company);
        $this->title = $title;
        $this->picture = $picture;
    }
    public function setCompany($company)
    {
        if ($company == '') {
            $this->company = 'N/A';
        } else {
            $this->company = $company;
        }
        return $this->company;
    }
    public function getCompany()
    {
        return $this->company;
    }
};
