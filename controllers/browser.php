<?php



class browser extends page {
    
    protected function configure(){
	
		$d = new Flickr();
		
		$foo = $d->searchPhotos('cat');
		
        $this->title = 'Welcome to iFlickr';
		$this->images = $foo;
    }

}
