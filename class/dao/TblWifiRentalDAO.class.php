<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-11-19 12:59
 */
interface TblWifiRentalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblWifiRental 
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
 	 * @param tblWifiRental primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblWifiRental tblWifiRental
 	 */
	public function insert($tblWifiRental);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblWifiRental tblWifiRental
 	 */
	public function update($tblWifiRental);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTblUserId($value);

	public function queryByPassengerName($value);

	public function queryByDestination($value);

	public function queryByTraveledFromAt($value);

	public function queryByTraveledToAt($value);

	public function queryByDestinationType($value);

	public function queryByStatus($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeletedAt($value);


	public function deleteByTblUserId($value);

	public function deleteByPassengerName($value);

	public function deleteByDestination($value);

	public function deleteByTraveledFromAt($value);

	public function deleteByTraveledToAt($value);

	public function deleteByDestinationType($value);

	public function deleteByStatus($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeletedAt($value);


}
?>