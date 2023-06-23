<?php

namespace model;

class education
{
    public function __construct($DB)
    {
        parent::__construct($DB);
        $this->TABLA = 'educations';
        $this->PRKEY = 'edu_id';
    }
}
