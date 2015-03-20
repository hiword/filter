<?php
namespace Filter\Component;

use Filter\FilterInterface;

class Xss implements FilterInterface {
	
	/**
	 * (non-PHPdoc)
	 * @see \Filter\FilterInterface::filter()
	 */
	public function filter($data) {
		return is_array($data) ? $this->filterArray($data) : $this->filterSingle($data);
	}
	
	/**
	 * 过滤数组
	 * @param array $data
	 * @return array
	 */
	public function filterArray(array $data) {
		foreach ($data as &$item) {
			$item = is_array($item) ? $this->filterArray($item) : $this->filterSingle($value);
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