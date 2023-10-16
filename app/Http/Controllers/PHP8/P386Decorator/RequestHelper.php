<?php

namespace App\Http\Controllers\PHP8\P386Decorator;

class RequestHelper
{
    private array $requestData;

    public function __construct(array $requestData)
    {
        $this->requestData = $requestData;
    }

    public function getRequestData(): array
    {
        return $this->requestData;
    }
}
