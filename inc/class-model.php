<?php
class WaterReviewsModel {

public $id;     // (int)
public $name;  // имя (tinytext)
public $last_name;// фамилия(tinytext)
public $date;  // дата (tinytext)
public $schema_date;  // дата публикации (tinytext)
public $text;    // текст (text)



/**
 * Run
 */
public function __construct(){

}



public function get($id){
	global $wpdb;

	$query = "SELECT * FROM `" . WATER_REVIEWS_DB_TABLE_NAME . "` WHERE id = '" . $id . "' LIMIT 1";
	$row = $wpdb->get_row($query, 'OBJECT');

	$this->id 		= $id;
	$this->name 	= is_null($row->name)   ? '' : $row->name;
	$this->last_name  = is_null($row->last_name) ? '' : $row->last_name;
	$this->date 	= is_null($row->date)   ? '' : $row->date;
	$this->schema_date 	= is_null($row->schema_date)   ? '' : $row->schema_date;
	$this->text 	= is_null($row->text)   ? '' : $row->text;

	return $this;
}

public function get_list(){
	global $wpdb;

	$query = "SELECT * FROM `" . WATER_REVIEWS_DB_TABLE_NAME . "`";
	$list = $wpdb->get_results($query, 'OBJECT_K');

	if ( $list )
		return $list;
	else
		return [];
}

public function save(){
	global $wpdb;

	if (is_null($this->id))
		$this->add();
	else
		$this->edit();

	return $this;
}

public function delete($id){
	global $wpdb;

	return  $wpdb->delete(
				WATER_REVIEWS_DB_TABLE_NAME,
				[
					'id' => $id
				]
			);
}

public function add(){
	global $wpdb;

	$rows_affected = $wpdb->insert(
				WATER_REVIEWS_DB_TABLE_NAME,
				[
					'name' 	=> $this->name,
					'last_name'   => $this->last_name,
					'date'     => $this->date,
					'schema_date'     => $this->schema_date,
					'text' 		=> $this->text					
				]
			);
	return $rows_affected;
}

public function edit(){
	global $wpdb;

	return 	$wpdb->update(
				WATER_REVIEWS_DB_TABLE_NAME,
				[
					'name' 	=> $this->name,
					'last_name'   => $this->last_name,
					'date'     => $this->date,
					'schema_date'     => $this->schema_date,
					'text' 		=> $this->text
				],
				[
					'id' => $this->id
				]
			);
}

}
