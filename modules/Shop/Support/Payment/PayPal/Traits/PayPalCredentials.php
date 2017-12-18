<?php

namespace Shop\Support\Payment\PayPal\Traits;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

trait PayPalCredentials
{
    /**
     * The PayPal API context.
     *
     * @var \PayPal\Rest\ApiContext
     */
    protected $apiContext;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->setupApiCredentials();
    }

    /**
     * Setup Credentials.
     *
     * @param string|hash $clientID
     * @param string|hash $clientSecret
     */
    public function setupApiCredentials()
    {
        // $this->setApiContext(
        //     settings('shop.payment.paypal.client_id', env('PAYPAL_CLIENT_ID', 'AVLY5sOQutPQXnif-aZGq0JlFzUY_GYyH0gPtEetQ92mFQOl2GbJmF_PtAzeKci7L2tYOWFbnFUaRS12')),
        //     settings('shop.payment.paypal.secret', env('PAYPAL_SECRET', 'EEH6GkWdkpo5tpD5EdTsJzyAyVf9v28evq93tQNNIHnZHbzw7zH_MT74ZoZN3WCPTLEYde0_IbTjkmLH')),
        //     settings('shop.payment.paypal.config', [])
        // );

        $this->setApiContext(
            'AVLY5sOQutPQXnif-aZGq0JlFzUY_GYyH0gPtEetQ92mFQOl2GbJmF_PtAzeKci7L2tYOWFbnFUaRS12',
            'EEH6GkWdkpo5tpD5EdTsJzyAyVf9v28evq93tQNNIHnZHbzw7zH_MT74ZoZN3WCPTLEYde0_IbTjkmLH',
            [
                'mode' => 'sandbox'
            ]
        );
    }

    /**
     * Setup the API Context.
     *
     * @param  string $clientID
     * @param  string $clientSecret
     * @param  string $config
     */
    protected function setApiContext($clientID, $clientSecret, $config = [])
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential($clientID, $clientSecret)
        );

        $this->apiContext->setConfig($config);
    }

    /**
     * Returns the API Context
     *
     * @return \PayPal\Rest\ApiContext
     */
    public function getApiContext()
    {
        return $this->apiContext;
    }

    /**
     * Static alias for getApiContext
     *
     * @return \PayPal\Rest\ApiContext
     */
    public static function apiContext()
    {
        return (new static)->getApiContext();
    }
}
