<ul>
	<?php foreach($this->images as $img){
		
		echo("\t<li><a href=\"{$img->getPhotoHref()}\"><img title=\"{$img->title}\" src=\"{$img->getPhotoUrl(Flickr::SMALL)}\"></a></li>\n");
		
		
	}?>
</ul>