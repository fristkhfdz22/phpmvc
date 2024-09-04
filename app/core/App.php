<?php  

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parse_url();

        // Check if the URL array is not empty and the file exists
        if (isset($url[0]) && file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        } else {
            // Optional: Handle the case where the controller file does not exist
            // e.g., set default controller or log an error
        }

        // Require the controller file
        require_once '../app/controllers/' . $this->controller . '.php';

        // Instantiate the controller
        if (class_exists($this->controller)) {
            $this->controller = new $this->controller;
        } else {
            // Handle the case where the controller class does not exist
            // e.g., set default controller or log an error
        }

        // Check if method exists and update $this->method
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // Assign remaining parameters
        $this->params = array_values($url);

        // Call the method with parameters
        if (method_exists($this->controller, $this->method)) {
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else {
            // Handle the case where the method does not exist
            // e.g., show an error or use a default method
        }
    }

    public function parse_url()
    {
        if (isset($_GET['url'])) {
            // Sanitize and split the URL into segments
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // Remove empty segments
            return array_filter($url);
        }
        return []; // Return an empty array if 'url' is not set
    }
}
