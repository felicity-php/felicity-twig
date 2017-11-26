<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2017 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace felicity\twig;

use Twig_Environment;
use Twig_Extension_Debug;
use Twig_Loader_Filesystem;
use felicity\config\Config;

/**
 * Class Twig
 */
class Twig
{
    /** @var Twig $instance */
    public static $instance;

    /** @var Twig_Environment $twig */
    private $twig;

    /**
     * Twig constructor
     */
    private function __construct()
    {
        $debug = Config::get('felicity.twig.debug', false);

        $loader = new Twig_Loader_Filesystem(
            Config::get('felicity.twig.templatePaths', [])
        );

        $this->twig = new Twig_Environment($loader, [
            'debug' => $debug,
            'charset' => Config::get('felicity.twig.charset', 'UTF-8'),
            'base_template_class' => Config::get('felicity.twig.base_template_class', 'Twig_Template'),
            'cache' => Config::get('felicity.twig.cache', false),
            'auto_reload' => Config::get('felicity.twig.auto_reload'),
            'strict_variables' => Config::get('felicity.twig.strict_variables', false),
            'autoescape' => Config::get('felicity.twig.autoescape', 'html'),
            'optimizations' => Config::get('felicity.twig.optimizations', -1),
        ]);

        if ($debug) {
            $this->twig->addExtension(new Twig_Extension_Debug());
        }
    }

    /**
     * Gets the config class instance
     * @return Twig Singleton
     */
    public static function getInstance() : Twig
    {
        if (! self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Gets the Twig Environment
     * @return Twig_Environment
     */
    public static function get() : Twig_Environment
    {
        return self::getInstance()->getTwig();
    }

    /**
     * Gets the Twig Environment
     * @return Twig_Environment
     */
    public function getTwig() : Twig_Environment
    {
        return $this->twig;
    }
}
