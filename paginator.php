<?php
/*
W-PHP Paginator
=====================
File: paginator.php
Author: Ali Candan [Webkolog] <webkolog@gmail.com> 
Homepage: http://webkolog.net
GitHub Repo: https://github.com/webkolog/php-paginator
Last Modified: 2016-03-10
Created Date: 2016-03-10
Compatibility: PHP 5.4+
@version     1.0

Copyright (C) 2015 Ali Candan
Licensed under the MIT license http://mit-license.org

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
class Paginator {

	public $baseURL = "?page=";
	public $urlPrefix = null;
	public $urlSuffix = null;
	public $totalRows = 0;
	public $perPage = 10;
	public $page = 1;
	public $numbers = 5;
	public $linksFL = true;
	public $linksPN = true;
	public $links = null;
	public $start = 0;
	public $txtPrev = "Previous";
	public $txtNext = "Next";
	public $txtFirst = "First";
	public $txtLast = "Last";
	public $varLast = "last";
	public $showLflAsNum = false;
	private $arrayLinks = array();
	private $totalPages = 0;
	private $linkStatus = false;
	public $lang = 'en';
	
	public function __construct($lang = 'en') {
        $this->lang = $lang;
        $this->loadLanguage();
    }
	
	private function loadLanguage() {
        $langFile = __DIR__ . '/language/' . $this->lang . '.php';
        if (file_exists($langFile)) {
            $langData = include $langFile;
            $this->txtPrev = $langData['prev'];
            $this->txtNext = $langData['next'];
            $this->txtFirst = $langData['first'];
            $this->txtLast = $langData['last'];
        }
    }
	
	public function createLinks()
	{
		if (!$linkStatus)
		{
			$this->totalPages = ceil($this->totalRows / $this->perPage);
			if (!ctype_digit($this->page))
			{
				if ($this->page == $this->varLast)
				{
					$this->page = $this->totalPages;
					$this->start = ($this->totalPages * $this->perPage) - $this->perPage;
				} else {
					$this->page = 1;
					$this->start = ($this->page * $this->perPage) - $this->perPage;
				}
			} else {
				$this->page = $this->page?$this->page:1;
				$this->start = ($this->page * $this->perPage) - $this->perPage;
			}
			$i = $this->page - $this->numbers;
			$limit = $this->page + $this->numbers;
			if ($limit > $this->totalPages)
				$limit = $this->totalPages;
			if ($i < 1)
				$i = 1;
			if($this->page > $this->numbers)
			{
				if ($this->linksPN)
					array_push($this->arrayLinks,'<li><a href="'.$this->urlPrefix.$this->baseURL.($this->page - 1).$this->urlSuffix.'">'.$this->txtPrev.'</a></li>');
				if ($this->linksFL)
					array_push($this->arrayLinks,'<li><a href="'.$this->urlPrefix.$this->baseURL."1".$this->urlSuffix.'">'.($this->showLflAsNum?1:$this->txtFirst).'</a></li>');
			}
			for ($i; $i <= ($limit - 1); $i++)
			{ 
				if ($this->page == $i)
					array_push($this->arrayLinks,'<li class="active"><a href="javascript:void(0);">'.$i.'</a></li>');
				else
					array_push($this->arrayLinks,'<li><a href="'.$this->urlPrefix.$this->baseURL.$i.$this->urlSuffix.'">'.$i.'</a></li>');
			}
			if($limit < $this->totalPages)
			{
				if ($this->linksFL)
					array_push($this->arrayLinks,'<li><a href="'.$this->urlPrefix.$this->baseURL.$this->totalPages.$this->urlSuffix.'">'.($this->showLflAsNum?$this->totalPages:$this->txtLast).'</a></li>');
				if ($this->linksPN)
					array_push($this->arrayLinks,'<li><a href="'.$this->urlPrefix.$this->baseURL.($this->page + 1).$this->urlSuffix.'">'.$this->txtNext.'</a></li>');
			} else {
				if ($this->page == $i)
					array_push($this->arrayLinks,'<li class="active"><a href="javascript:void(0);">'.$i.'</a></li>');
				else
					array_push($this->arrayLinks,'<li><a href="'.$this->urlPrefix.$this->baseURL.$i.$this->urlSuffix.'">'.$i.'</a></li>');
			}
			$this->linkStatus = true;
			$this->links = '<ul class="pagination pagination-sm">'.join("", $this->arrayLinks).'</ul>';
		}
	}
	
}
