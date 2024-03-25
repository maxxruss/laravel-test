<?php
// app/Services/StringProcessingService.php

namespace App\Services;

// use App\Services\MathServices;

class StringProcessingService
{
    protected $math_service;

    public function __construct($math_service)
    {
        $this->math_service = $math_service;
    }

    public function processString($string, $number)
    {
        // Логика обработки строки...
        $math_result = $this->math_service->processMath($number);
        $upper_string = strtoupper($string);

        return $upper_string . ' - ' . $math_result;
    }
}
