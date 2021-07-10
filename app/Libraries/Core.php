<?php

class Core
{
    protected string $currentController = 'Pages';
    protected Pages $pageInstance;
    protected string $currentMethod = 'index';
    protected array $params = [];


    /**
     * Core constructor.
     * Extract URL from browser and dynamically map them onto the appropriate controller
     */
    public function __construct()
    {
        $url = $this->getUrl();
//        print_r($this->getUrl());

        if (!empty($url) && file_exists('../app/Controllers/' . ucwords($url[0]) . ".php")) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        require_once('../app/Controllers/' . $this->currentController . '.php');
        $this->pageInstance = new $this->currentController;


        if (isset($url[1]) && method_exists($this->currentController, $url[1])) {
            $this->currentMethod = $url[1];
            unset($url[1]);
        }

        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->pageInstance, $this->currentMethod], $this->params);
    }

    /**
     * @return string[]
     */
    public function getUrl(): array
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [$this->currentController];
    }
}