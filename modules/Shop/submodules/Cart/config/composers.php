<?php

return [
    ['appears' => [
        'Cart::carts.*',
        'Theme::cart.*',
        'Theme::carts.*',
        'Theme::shop.*',
    ],
    'class' => \Cart\Composers\CartViewComposer::class],
];
