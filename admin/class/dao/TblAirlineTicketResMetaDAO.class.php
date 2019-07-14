<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-07-10 15:03
 */
interface TblAirlineTicketResMetaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblAirlineTicketResMeta 
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
 	 * @param tblAirlineTicketResMeta primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblAirlineTicketResMeta tblAirlineTicketResMeta
 	 */
	public function insert($tblAirlineTicketResMeta);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblAirlineTicketResMeta tblAirlineTicketResMeta
 	 */
	public function update($tblAirlineTicketResMeta);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTblAirlineTicketResId($value);

	public function queryByPassengerName($value);

	public function queryByAge($value);

	public function queryByBirthDate($value);

	public function queryByPassportNumber($value);

	public function queryByExpiryDate($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeletedAt($value);


	public function deleteByTblAirlineTicketResId($value);

	public function deleteByPassengerName($value);

	public function deleteByAge($value);

	public function deleteByBirthDate($value);

	public function deleteByPassportNumber($value);

	public function deleteByExpiryDate($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeletedAt($value);


}
?>