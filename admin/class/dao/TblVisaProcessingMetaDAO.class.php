<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-07-21 22:58
 */
interface TblVisaProcessingMetaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblVisaProcessingMeta 
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
 	 * @param tblVisaProcessingMeta primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblVisaProcessingMeta tblVisaProcessingMeta
 	 */
	public function insert($tblVisaProcessingMeta);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblVisaProcessingMeta tblVisaProcessingMeta
 	 */
	public function update($tblVisaProcessingMeta);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTblVisaProcessingId($value);

	public function queryByPassengerName($value);

	public function queryByAge($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeletedAt($value);


	public function deleteByTblVisaProcessingId($value);

	public function deleteByPassengerName($value);

	public function deleteByAge($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeletedAt($value);


}
?>