<?php
namespace Filter\Component;

use Filter\FilterInterface;

class Xss implements FilterInterface {
	
	/**
	 * (non-PHPdoc)
	 * @see \Filter\FilterInterface::filter()
	 */
	public function filter(array $data) {
		
		foreach ($data as &$item) {
			$item = is_array($item) ? $this->filter($item) : $this->filterSingle($item);
		}
		return $data;
	}
	
	/**
	 * 单条数据过滤
	 * @param unknown $value
	 * @return string
	 */
	public function filterSingle($data) {
		return strip_tags(trim($data));
	}
	
}