<?php

interface iPage {
    

    
    public function __construct($request, $name);
    
    public function render();
    
    public function getString();
}

class page implements iPage {
    
   protected $string;
   protected $name;
   protected $request;
   protected $title = 'Stringcrusher';
   
   public function __construct($request, $name){
       $this->name = $name;
       $this->request = $request;
       $this->configure();
   }   
   
   protected function configure(){
       
   }
    
   public function render(){
       echo $this->getString();
   }
      
   public function getString(){
       
       ob_start();
       
       include('views/'.$this->name.'.php');
       
       $string = ob_get_clean();
       $title = $this->title;
       $content = $string;
       
       ob_start();
       include('layout.php');
       $this->string = ob_get_clean();
       return $this->string;
   }
    
}

class index extends page {
    
    protected function configure(){
        $this->title = 'Welcome to string crusher';
    }
}

class test extends page{
    
}

class pageFactory {
    
    public static function getPage($name){
        
        $myPage = new $name($_REQUEST, $name);
        
        return $myPage;
        
    }
    
}