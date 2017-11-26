<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2017 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace tests;

use felicity\twig\Twig;
use Twig_Loader_Filesystem;
use felicity\config\Config;
use PHPUnit\Framework\TestCase;

/**
 * Class EventManagerTest
 */
class TwigTest extends TestCase
{
    /**
     * Tests the event manager
     */
    public function testConfig()
    {
        Config::set('felicity.twig.templatePaths', __DIR__ . '/templates');

        $twig = Twig::get();

        self::assertEquals(
            "This is a test: testVal\n",
            $twig->render('test.twig', [
                'test' => 'testVal',
            ])
        );

        /** @var Twig_Loader_Filesystem $loader */
        $loader = $twig->getLoader();

        $loader->addPath(__DIR__ . '/templates2', 'test');

        self::assertEquals(
            "testTemplate\n",
            $twig->render('@test/testDir/testTemplate.twig')
        );
    }
}
