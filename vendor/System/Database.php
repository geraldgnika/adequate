<?php
/**
 * The Singleton Creational Pattern Implementation
 * In Database Connection Class
 */
class Database extends PDO implements CRUDInterface {
	private static $_instance = null;

  	public static function getInstance() {
    	if (self::$_instance == null) {
      		self::$_instance = new self;
      	}
 
    	return self::$_instance;
    }

	private function __construct() {
		try {
			// Connect with the database using the construct method from parent class PDO
			parent::__construct(DB_TYPE .
								':host=' . DB_HOST .
								';dbname=' . DB_NAME,
								DB_USERNAME,
								DB_PASSWORD);
			parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (Exception $e) {
			echo DB_CONN_FAILED . ' | ' . $e->getMessage();
		}
	}

	// -------------- CRUD Functionality Implementation -------------- //

	// Overloading create(); from the interface
	public function create($table, $array) {
		// Sort the array in ascending order according to its key values
		ksort($array);

		// Get the isolated keys
		$keys = implode('`, `', array_keys($array));

		// Get the isolated values
		$values = ':' . implode(', :', array_keys($array));

		$statement = $this->prepare("INSERT INTO $table (`$keys`) VALUES ($values)");

		foreach ($array as $key => $value) {
			$statement->bindValue(":$key", $value);
		}

		$statement->execute();
	}

	// Overloading retrieve(); from the interface
	public function retrieve($query, $array = array(), $fetchingMode = PDO::FETCH_ASSOC) {
		$statement = $this->prepare($query);

		foreach ($array as $key => $value) {
			$statement->bindValue("$key", $value);
		}

		$statement->execute();

		$output = $statement->fetchAll($fetchingMode);
		$output = array_values($output)[0];

		return $output;
	}

	// Overloading update(); from the interface
	public function update($table, $array, $where) {
		// Sort the array in ascending order according to its key values
		ksort($array);

		$fieldsToUpdate = NULL;

		// Assign the values next to the name of the field to be updated respectively
		foreach ($array as $key => $value) {
			$fieldsToUpdate .= "`$key`=:$key,";
		}

		// Removes the ',' character from the right side of the field name since it is an array
		$fieldsToUpdate = rtrim($fieldsToUpdate, ',');

		$statement = $this->prepare("UPDATE $table SET $fieldsToUpdate WHERE $where");

		foreach ($array as $key => $value) {
			$statement->bindValue(":$key", $value);
		}

		$statement->execute();
	}

	// Overloading delete(); from the interface
	public function delete($table, $where, $limit = 1) {
		return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
	}
}
?>