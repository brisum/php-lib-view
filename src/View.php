<?php

namespace Brisum\Lib;

class View
{
    /**
     * @var string
     */
    protected $dirTemplate;

    /**
     * View constructor.
     * @param string $dirTemplate
     */
    public function __construct($dirTemplate = '')
    {
        $this->dirTemplate = rtrim($dirTemplate, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }

    /**
     * @param string $template
     * @param array $vars
     * @return void
     */
    public function render($template, array $vars = [])
    {
        extract($vars);
        require $this->dirTemplate . $template;
    }

    /**
     * @param string $template
     * @param array $vars
     * @return string
     */
    public function content($template, array $vars = [])
    {
        ob_start();
        $this->render($template, $vars);
        $content = ob_get_contents();
        ob_clean();

        return $content;
    }
}
