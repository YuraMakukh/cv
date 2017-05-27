<?php

namespace common;

/**
 * Class Template
 * @package application
 */
class Template
{
    /**
     * @var null
     */
    private $layout = null;

    /**
     * @param null $layout
     * @return Template
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
        return $this;
    }

    /**
     * @var null
     */
    private $template = null;

    /**
     * @param null $template
     * @return Template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @var string
     */
    private $templatesExtension = 'php';

    /**
     * @param string $templatesExtension
     * @return Template
     */
    public function setTemplatesExtension($templatesExtension)
    {
        $this->templatesExtension = $templatesExtension;
        return $this;
    }

    /**
     * @var string
     */
    private $templatesDirectory = __DIR__ . DIRECTORY_SEPARATOR;

    /**
     * @param string $templatesDirectory
     * @return Template
     */
    public function setTemplatesDirectory($templatesDirectory)
    {
        $this->templatesDirectory = $templatesDirectory;
        return $this;
    }

    /**
     * @param string $template
     * @param array $variables
     * @return string
     * @throws \Exception
     */
    public function render($template, array $variables = [])
    {
        if (empty($this->layout)) {
            throw new \Exception('Layout can not be empty');
        }

        $variables['content'] = $this->renderPartial($template, $variables);
        return $this->renderPartial($this->layout, $variables);
    }

    /**
     * @param string $template
     * @param array $variables
     * @return string
     * @throws \Exception
     */
    public function renderPartial($template, array $variables = [])
    {
        $template = $this->prepareTemplate($template);
        ob_start();
        extract($variables);
        require_once($template);
        return ob_get_clean();
    }

    /**
     * @param string $template
     * @return string
     * @throws \Exception
     */
    private function prepareTemplate($template)
    {
        $ext = substr($template, strlen($template) - strlen($this->templatesExtension));
        $template .= $this->templatesExtension == $ext ? '' : ".{$this->templatesExtension}";

        if (false === stripos($template, $this->templatesDirectory)) {
            $template = $this->templatesDirectory . DIRECTORY_SEPARATOR . $template;
        }

        if (file_exists($template)) {
            return $template;
        }

        throw new \Exception("Template {$template} is not exists");
    }
}