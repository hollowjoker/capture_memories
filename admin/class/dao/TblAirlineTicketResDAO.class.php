<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-07-10 15:03
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

	public function queryByUserId($value);

	public function queryByLocation($value);

	public function queryByQuantity($value);

	public function queryByStatus($value);

	public function queryByTraveledFromAt($value);

	public function queryByTraveledToAt($value);

	public function queryByType($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeletedAt($value);


	public function deleteByUserId($value);

	public function deleteByLocation($value);

	public function deleteByQuantity($value);

	public function deleteByStatus($value);

	public function deleteByTraveledFromAt($value);

	public function deleteByTraveledToAt($value);

	public function deleteByType($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeletedAt($value);


}
?>