<?php

class Rss extends Eloquent {

	public $timestamps = true;
	protected $table = 'Rss';

    public function box()
    {
        return $this->belongsTo('Box');
    }
	
	public function getRss() 
	{
		if (file_get_contents($this->feed) != "") {
			$rss_file = join(' ', file($this->feed));						
			$rss_array = explode("<item>", $rss_file );
		
			$i = 0;
			$text = "";
		
			foreach ($rss_array as $news) {			
				if ($i < 20) {
					$title = $this->parse_rss("title>", $news);
					$link = $this->parse_rss("link>", $news);
				
					if ($i > 0) {
						$title_array = explode(":", $title);
						
						if (mb_detect_encoding($rss_file) == false) {
							$title0 = utf8_encode($title_array[0]);
							$title1 = utf8_encode($title_array[1]);
						} else {
							$title0 = $title_array[0];
							$title1 = $title_array[1];
						}				
					
						$text.= '<a href="' . $link . '"><b>' . $title0 . '</b>:' . $title1 . '</a><br />';				
					}
				}
			
				$i++;
			}
		
			return $text;		
		} else {
			return "<p>RSS-Feed nicht gefunden</p>";
		}
		
	}


	private function parse_rss ($tag, $feed) {
		$ret = explode($tag, $feed);
		return substr($ret[1], 0, -2);
	}
	
}
