<?php



class FlickrPhoto {
	
	public $farm;
	public $id;
	public $owner;
	public $secret;
	public $server;
	public $title;
	

	public function __construct($farm, $id, $owner, $secret, $server, $title = ''){
		$this->farm = $farm;
		$this->id = $id;
		$this->owner = $owner;
		$this->secret = $secret;
		$this->server = $server;
		$this->title = $title;
	}
	 
	
	public function getPhotoUrl($size = false){
		
		$suffix = '';
		if($size){
			$suffix = '_'. $size;
		}
		
		$url = "http://farm{$this->farm}.static.flickr.com/{$this->server}/{$this->id}_{$this->secret}{$suffix}.jpg";
		
		return $url;
		
	}
	
	public function getPhotoHref(){
		return "http://www.flickr.com/photos/{$this->owner}/{$this->id}";
	}	
	
}

class Flickr {
	
	const SMALL_SQUARE = 's';
	const THUMBNAIL = 't';
    const SMALL = 'm';
	const LARGE = 'o';
	
	
	public function __construct(){
		
	}
	
	public function searchPhotos($query, $limit = 10){
		$query = "select * from flickr.photos.search where text=\"$query\" limit $limit";
		
		$yql = new YQL($query);
		$res = $yql->execute()->results->photo;
		$ret = array();
		foreach($res as $ph){
			$ret[] = new FlickrPhoto($ph->farm, $ph->id, $ph->owner, $ph->secret, $ph->server, $ph->title);
		}
		
		return $ret;
	}
	
}