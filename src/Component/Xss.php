<?php
namespace Filter\Component;

use Filter\FilterInterface;

class Xss implements FilterInterface {
	
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
	 * @param string $value
	 * @return string
	 */
	public function filter($data) {
		return strip_tags(trim($data));
	}
	
}