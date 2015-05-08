<?php
namespace Filter;
interface FilterInterface {
	
	public function filters(array $data);
	
	public function filter($data);
	
}