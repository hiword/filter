<?php
namespace Filter;
class Filters {
	
	protected $filter;
	protected $data;
	
	public function __construct(FilterInterface $filter,$data) {
		$this->filter = $filter;
		$this->data = $data;
	}

	public function filter() {
		return $this->filter->filter($this->data);
	}
	
}