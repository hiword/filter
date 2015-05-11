<?php
namespace Filter\Component;
use Filter\FilterInterface;
class Shell implements FilterInterface  {
	
	/**
	 * (non-PHPdoc)
	 * @see \Filter\FilterInterface::filter()
	 */
	public function filters(array $data) {
		
		foreach ($data as &$item) {
			$item = is_array($item) ? $this->filters($item) : $this->filter($item);
		}
		return $data;
	}
	
	/**
	 * 单条数据过滤
	 * @param string|numeric $value
	 * @return string
	 */
	public function filter($data) {
		return escapeshellarg(trim($data));
	}
	
}