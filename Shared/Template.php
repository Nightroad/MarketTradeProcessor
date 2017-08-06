<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 06.08.17
 * Time: 14:19
 */

namespace MarketTradeProcessor\Shared;


class Template {

    /**
     * @var Template
     */
    private static $instance = null;

    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var \Twig_Loader_Filesystem
     */
    private $twigLoader;

    /**
     * @return Template
     */
    public static function getInstance()
    {
        if (null == self::$instance)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct()
    {
        $this->initTwig();
    }

    private function initTwig()
    {
        InitComposer();

        $templatePath = PathJoin(APPLICATION_BASE_DIR, 'MessageFrontend', 'template');
        if (CONFIG_TWIG_CACHE_ENABLE)
        {
            $cachePath = PathJoin(APPLICATION_BASE_DIR, 'cache');
        }
        else
        {
            $cachePath = false;
        }

        $this->twigLoader = new \Twig_Loader_Filesystem($templatePath);
        $this->twig = new \Twig_Environment($this->twigLoader, array(
            'cache' => $cachePath,
        ));
    }

    /**
     * @return \Twig_Environment
     */
    public function getTwig()
    {
        return $this->twig;
    }

} 