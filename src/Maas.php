<?php

namespace jblond\maas;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;
use Twig\TemplateWrapper;

class Maas
{
    /**
     * @var array
     */
    private array $twigConfig = [
        'cache' => false,
        'debug' => true,
        'auto_reload' => true,
        'strict_variables' => true
    ];

    /**
     * @var Environment
     */
    private Environment $twig;

    public function __construct()
    {
        $this->twig = new Environment(new FilesystemLoader('../templates'), $this->twigConfig);
        $this->twig->addExtension(new DebugExtension());
    }

    /**
     * @param string|TemplateWrapper $name
     * @param array $context An array of parameters to pass to the template
     * @return void|string The rendered template
     */
    public function render($name, array $context = array())
    {
        try {
            return $this->twig->render($name, $context);
        } catch (LoaderError $e){
            Logger::log($e);
        } catch (SyntaxError $e){
            Logger::log($e);
        } catch (RuntimeError $e){
            Logger::log($e);
        }
    }

}
