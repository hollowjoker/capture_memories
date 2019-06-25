<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 15:01
 */
interface TblMessageDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblMessage 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param tblMessage primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblMessage tblMessage
 	 */
	public function insert($tblMessage);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblMessage tblMessage
 	 */
	public function update($tblMessage);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTblConvoId($value);

	public function queryByTblSenderId($value);

	public function queryByTblReceiverId($value);

	public function queryByDescription($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeletedAt($value);


	public function deleteByTblConvoId($value);

	public function deleteByTblSenderId($value);

	public function deleteByTblReceiverId($value);

	public function deleteByDescription($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeletedAt($value);


}
?>