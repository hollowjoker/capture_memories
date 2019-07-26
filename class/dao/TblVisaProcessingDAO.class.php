<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-07-26 08:38
 */
interface TblVisaProcessingDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblVisaProcessing 
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
 	 * @param tblVisaProcessing primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblVisaProcessing tblVisaProcessing
 	 */
	public function insert($tblVisaProcessing);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblVisaProcessing tblVisaProcessing
 	 */
	public function update($tblVisaProcessing);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTblUserId($value);

	public function queryByQuantity($value);

	public function queryByDestination($value);

	public function queryByTraveledFromAt($value);

	public function queryByTraveledToAt($value);

	public function queryByStatus($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeleted($value);


	public function deleteByTblUserId($value);

	public function deleteByQuantity($value);

	public function deleteByDestination($value);

	public function deleteByTraveledFromAt($value);

	public function deleteByTraveledToAt($value);

	public function deleteByStatus($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeleted($value);


}
?>