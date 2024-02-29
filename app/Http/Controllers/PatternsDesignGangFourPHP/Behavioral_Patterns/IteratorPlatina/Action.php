<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\IteratorPlatina;

use App\Models\ProductsData;

interface Action {
    public function apply(ProductsData $product);
}
