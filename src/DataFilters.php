<?php
namespace Filter;
class DataFilters {
	
	protected $filter;
	
	public function __construct(FilterInterface $filter) 
	{
		$this->filter = $filter;
	}

	public function filters(array $data) 
	{
		return $this->filter->filters($data);
	}
	
	public function filter($data)
	{
		return $this->filter->filter($data);
	}
}