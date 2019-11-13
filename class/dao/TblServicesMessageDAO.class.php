<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-11-13 10:12
 */
interface TblServicesMessageDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblServicesMessage 
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
 	 * @param tblServicesMessage primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblServicesMessage tblServicesMessage
 	 */
	public function insert($tblServicesMessage);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblServicesMessage tblServicesMessage
 	 */
	public function update($tblServicesMessage);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTblServicesId($value);

	public function queryByTblSenderId($value);

	public function queryByTblReceiverId($value);

	public function queryByDescription($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeletedAt($value);


	public function deleteByTblServicesId($value);

	public function deleteByTblSenderId($value);

	public function deleteByTblReceiverId($value);

	public function deleteByDescription($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeletedAt($value);


}
?>