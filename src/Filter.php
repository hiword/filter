<?php
namespace Filter;
class Filter {
	
	protected $filterType = [
		'xss',
	];
	
	public function get($data,array $type = array()) {
		
	}
	
	/**
	 *	 过滤数组
	 * @param array|mixed $data
	 * @return boolean
	 */
	public function filters(array $data) {
		foreach ($data as &$value) {
			$value = is_array($value) ? $this->filters($value) : $this->filter($value);
		}
		return $data;
	}
	
	/**
	 * 单条数据过滤
	 * @param unknown $value
	 * @return string
	 */
	public function filter($value) {
		return strip_tags($value);
	}
	
}