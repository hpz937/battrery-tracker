<?php

class Battery extends SqlClass {
	public $id;
	public $brand;
	public $model;
	public $c_rating;
	public $capacity;
	public $date_added;

	static public function getAll() {
		$sql = "SELECT * FROM batteries";
		return self::populateClass(new self,self::query($sql));
	}

	static public function getById($id) {
		$sql = "SELECT * FROM batteries WHERE id={$id}";
		return array_shift(self::populateClass(new self,self::query($sql)));
	}

	public function save() {
		$i_fields = "";
		$i_values = "";
		$u_values = "";
		foreach($this as $field=>$value) {
			$i_fields .= self::$database->escape_string($field).",";
			$i_values .= "'".self::$database->escape_string($value)."',";
			if($field!='id') {
				if($field=='date_added' and empty($value)) {
					$value = date('Y-m-d');
				}
				$u_values .= self::$database->escape_string($field)."='".self::$database->escape_string($value)."',";
			}
		}
		$i_fields = rtrim($i_fields,",");
		$i_values = rtrim($i_values,",");
		$u_values = rtrim($u_values,",");
		$insert = "insert into batteries ({$i_fields}) values ({$i_values})";
		$update = "update batteries set {$u_values} where id='{$this->id}'";
		self::$database->query($insert) or self::$database->query($update) or die("Error: ".self::$database->error);
		return true;
	}

	public function __construct($args=[]) {
		$this->id = $args['id'] ?? 0;
		$this->brand = $args['brand'] ?? '';
		$this->model = $args['model'] ?? '';
		$this->c_rating = $args['c_rating'] ?? 0;
		$this->capacity = $args['capacity'] ?? 0;
		$this->date_added = $args['date_added'] ?? '';
	}
}
