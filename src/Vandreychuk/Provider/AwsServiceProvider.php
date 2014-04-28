<?php

namespace Vandreychuk\Provider;

use Aws\Common\Aws;
use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * AwsServiceProvider
 *
 * Class AwsServiceProvider
 * @package Vandreychuk\Provider
 */
class AwsServiceProvider implements ServiceProviderInterface
{
    /**
     * register
     *
     * @param Application $app
     */
    public function register(Application $app)
    {
        $app['aws'] = $app->share(function() use ($app) {
            if(isset($app['AWS']) && is_array($app['AWS'])) {
                $aws = Aws::factory(
                    array(
                        'key' => $app['AWS']['key'],
                        'secret' => $app['AWS']['secret']
                    ));
            } else {
                throw new \Exception("Error: Array key 'AWS' does not exist or input data not Array");
            }
            return $aws;
        });
    }

    /**
     * boot
     *
     * @param Application $app
     */
    public function boot(Application $app)
    {

    }
}