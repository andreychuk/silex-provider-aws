<?php

namespace Vandreychuk\Tests\Provider;

use Aws\Common\Aws;
use Silex\Application;
use Silex\Provider\SerializerServiceProvider;
use ReflectionClass;
use Vandreychuk\Provider\AwsServiceProvider;


/**
 * AwsServiceProviderTest
 *
 * Class AwsServiceProviderTest
 * @package Vandreychuk\Tests\Provider
 */
class AwsServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    /*
     * testAws
     */
    public function testAWS()
    {
        $key = 'temp';
        $secret = 'secret';

        $app = new Application();
        $app->register(new AwsServiceProvider(), array('AWS' => array('key'=>$key, 'secret'=>$secret)));

        $aws = $app['aws'];

        $s3Client = $aws->get('s3');

        $this->assertInstanceOf('\Aws\Common\Aws', $aws);
        $this->assertInstanceOf('\Aws\S3\S3Client', $s3Client);
    }
}