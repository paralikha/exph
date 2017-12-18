<?php

namespace Cart\Composers;

use Anam\Phpcart\Facades\Cart;
use Pluma\Support\Composers\BaseViewComposer;

class CartViewComposer extends BaseViewComposer
{
    /**
     * The name of the variable.
     *
     * @var string
     */
    protected $name = 'cart';

    /**
     * Main function.
     *
     * @return mixed
     */
    public function handle()
    {
        $cart = json_decode(json_encode([
            'items' => collect(Cart::getItems()),
            'total' => Cart::getTotal(),
        ]));

        return $cart;
    }
}
