<?php 
    /*
     * App Core Class
     * Creates URL & loads core controler
     * URL FORMAT - /controller/method/params
    */

    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct() {
            // print_r($this->getUrl());
            $url = $this->getUrl();

            // Look into controllers for first index/value
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // if exists, set as controller
                $this->currentController = ucwords($url[0]);
                // Unset 0 Index
                unset($url[0]);
            }
        
            // Require the controller
            require_once '../app/controllers/' . $this->currentController . '.php';

            // Instantiate controller class
            $this->currentController = new $this->currentController;

            // Check for second part of the $url
            if (isset($url[1])) {
                // Check to see if Method exists in controller
                if (method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    // Unset 1 index
                    unset($url[1]);
                }
            }

            // Get params
            $this->params = $url ? array_values($url) : [];

            // Call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);


            // echo $this->currentMethod;
        }

        public function getUrl() {
            // echo $_GET['url'];

            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);

                // make the $url array using explode to divide the url in every '/'
                $url = explode('/', $url);
                // print_r($url);

                return $url;
            }
        }
    }

?>