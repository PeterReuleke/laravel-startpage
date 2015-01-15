<?php

class Rss extends Eloquent {

	public $timestamps = true;
	protected $table = 'Rss';
	public $items = array();

    public function box()
    {
        return $this->belongsTo('Box');
    }
	
	public function getRss() 
	{		
		$contents = @file_get_contents($this->feed);
		
		if ($contents !== false) {				
			$rss_array = explode("<item>", $contents );	
			$i = 0;
	
			foreach ($rss_array as $news) {			
				if ($i < 20) {
					$title = $this->parse_rss("title>", $news);
					$link = $this->parse_rss("link>", $news);
			
					if ($i > 0) {
						$title_array = explode(":", $title);
					
						if (mb_detect_encoding($contents) == false) {
							$title0 = utf8_encode($title_array[0]);
							$title1 = utf8_encode($title_array[1]);
						} else {
							$title0 = $title_array[0];
							$title1 = $title_array[1];
						}	

						$this->items[] = array(
							'href' => $link,
							'title0' => $title0,
							'title1' => $title1
						);					
					}
				}
		
				$i++;
			}
			
			return $this->items;
		} else {
			return null;
		}
	}

	private function parse_rss ($tag, $feed) {
		$ret = explode($tag, $feed);
		return substr($ret[1], 0, -2);
	}
	
}