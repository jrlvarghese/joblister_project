<?php
class Template{
    // path to template
    protected $template;
    // variables passed in
    protected $vars = array();

    // constructor
    public function __construct($template){
        $this->template = $template;
    }
    // get method
    public function __get($key){
        return $this->vars[$key];
    }
    // set method
    public function __set($key, $value){
        $this->vars[$key] = $value;
    }
    // when used as a string
    public function __toString(){
        // extract variables
        extract($this->$vars);
        // get the path
        chdir(dirname($this->template));
        // output the template after starting the buffer
        ob_start();

        include basename($this->template);
        return ob_get_clean();
    }
}