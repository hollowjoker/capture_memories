<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-11-13 09:17
 */
interface TblAirlineTicketResDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblAirlineTicketRes 
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
 	 * @param tblAirlineTicketRe primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblAirlineTicketRes tblAirlineTicketRe
 	 */
	public function insert($tblAirlineTicketRe);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblAirlineTicketRes tblAirlineTicketRe
 	 */
	public function update($tblAirlineTicketRe);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTblUserId($value);

	public function queryByPassengerName($value);

	public function queryByBirthDate($value);

	public function queryByAge($value);

	public function queryByType($value);

	public function queryByPassportNo($value);

	public function queryByExpiryDate($value);

	public function queryByStatus($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeletedAt($value);


	public function deleteByTblUserId($value);

	public function deleteByPassengerName($value);

	public function deleteByBirthDate($value);

	public function deleteByAge($value);

	public function deleteByType($value);

	public function deleteByPassportNo($value);

	public function deleteByExpiryDate($value);

	public function deleteByStatus($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeletedAt($value);


}
?>