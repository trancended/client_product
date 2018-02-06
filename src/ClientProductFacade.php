<?php
declare(strict_types=1);

namespace Trancended\ClientProduct;

use Illuminate\Support\Facades\Facade;

class ClientProductFacade extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'api_product';
    }
}
