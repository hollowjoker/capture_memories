<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 15:01
 */
interface TblConvoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblConvo 
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
 	 * @param tblConvo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblConvo tblConvo
 	 */
	public function insert($tblConvo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblConvo tblConvo
 	 */
	public function update($tblConvo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTblUserId($value);

	public function queryByStatus($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeletedAt($value);


	public function deleteByTblUserId($value);

	public function deleteByStatus($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeletedAt($value);


}
?>