<?php
include_once('database.php');

class TodoAPI
{
	var $database;
	
	function __construct()
	{
		$this->database = new MySqlDb("localhost", "cakemail", "cakemail", "cakemail");
	}
	
	function get_lists()
	{
		$fields = array("id","label");
		$result = $this->database->query("todolists", $fields);
		return $result;
	}
	
	function get_list($id)
	{
		$fields = array("label");
		$result = $this->database->query("todolists", $fields, "id=".$id);
		return $result;
	}
	
	function get_all_items()
	{
		$fields = array("id", "label", "done");
		$result = $this->database->query("todoitems", $fields);
		return $result;
	}
	
	function get_list_items($listId, $done = null)
	{
		$where = "listId=".$listId;
		if(!is_null($done))
			$where .= " AND done=".$done;
		$fields = array("id", "label", "done");
		$result = $this->database->query("todoitems", $fields, $where);
		return $result;
	}
	
	function add_list($label)
	{
		$values = array("label"=>$label);
		return $this->database->insert("todolists", $values);
	}
	
	function update_list($id, $label)
	{
		$values = array("label"=>$label);
		return $this->database->update("todolists", $id, $values);
	}
	
	function remove_list($id)
	{
		return $this->database->delete("todolists", $id);
	}
	
	function get_item($id)
	{
		$fields = array("label");
		$result = $this->database->query("todoitems", $fields, "id=".$id);
		return $result;
	}
	
	function get_not_done_items()
	{
		return array_filter($this->items, "is_not_done");
	}
	
	function is_not_done($item)
	{
		return $this->item.done;
	}
	
	function update_item($id, $fields)
	{
		$this->database->update("todoitems", $id, $fields);
	}
	
	function add_item($fields, $listId)
	{
		$fields["listId"] = $listId;
		return $this->database->insert("todoitems", $fields);
	}
	
	function change_label($id, $label)
	{
		$values = array("label"=>$label);
		return $this->database->update("todoitems", $id, $values);
	}
	
	function remove_item($id)
	{
		return $this->database->delete("todoitems", $id);
	}
}

?>