<?php
namespace Filter;
class Filters {
	
	protected $filter;
	
	public function __construct(FilterInterface $filter) {
		$this->filter = $filter;
	}

	public function filter($data) {
		return $this->filter->filter($data);
	}
	
}