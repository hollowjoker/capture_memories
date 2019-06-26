<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
interface TblUserDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblUser 
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
 	 * @param tblUser primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblUser tblUser
 	 */
	public function insert($tblUser);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblUser tblUser
 	 */
	public function update($tblUser);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByFirstName($value);

	public function queryByLastName($value);

	public function queryByEmail($value);

	public function queryByPassword($value);

	public function queryByPhone($value);

	public function queryByBirthDate($value);

	public function queryByType($value);

	public function queryByActive($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeletedAt($value);


	public function deleteByFirstName($value);

	public function deleteByLastName($value);

	public function deleteByEmail($value);

	public function deleteByPassword($value);

	public function deleteByPhone($value);

	public function deleteByBirthDate($value);

	public function deleteByType($value);

	public function deleteByActive($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeletedAt($value);


}
?>