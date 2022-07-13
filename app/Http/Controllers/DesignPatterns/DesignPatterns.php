<?php

namespace App\Http\Controllers\DesignPatterns;

use App\DesignPatterns\Fundamental\PropertyContainer\PropertyContainer;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class DesignPatterns extends Controller
{
    protected PropertyContainer $propertyContainer;

    public function __construct(PropertyContainer $propertyContainer)
    {
        $this->propertyContainer = $propertyContainer;
    }


    /**
     * @throws Exception
     */
    function renderOutput(Request $request): \Illuminate\Http\Response
    {
        $this->propertyContainer->addProperty("designPatterns", ["welcome" => 1]);


        return response()->view("welcome");
    }
}
