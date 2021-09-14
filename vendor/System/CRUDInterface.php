<?php
interface CRUDInterface {
	/**
	 * Creation Method Implementation
	 * @param string $table: The name of the table to insert into
	 * @param string $array: The array of data to be inserted
	 */
	public function create($table, $array);

	/**
	 * Retrieval Method Implementation
	 * @param string $query: The SQL query to be passed
	 * @param array $array: The SQL query parameters to be binded
	 * @param constant $fetchingMode: Returns the array indexed by column name
	 * @return all
	 */
	public function retrieve($query, $array, $fetchingMode);

	/**
	 * Updation Method Implementation
	 * @param string $table: The name of the table to insert into
	 * @param string $array: The array of data to be inserted
	 * @param string $where: The 'WHERE' part of the query
	 */
	public function update($table, $array, $where);

	/**
	 * Deletion Method Implementation
	 * @param string $table: The name of the table to be deleted onto
	 * @param string $where: The 'WHERE' part of the query
	 * @param integer $limit: The limit of rows to be deleted with the specified parameters
	 * @return integer: Affected rows
	 */
	public function delete($table, $where, $limit);
}
?>