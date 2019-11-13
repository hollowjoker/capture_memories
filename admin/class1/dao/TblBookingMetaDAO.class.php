<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-07-26 21:16
 */
interface TblBookingMetaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblBookingMeta 
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
 	 * @param tblBookingMeta primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblBookingMeta tblBookingMeta
 	 */
	public function insert($tblBookingMeta);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblBookingMeta tblBookingMeta
 	 */
	public function update($tblBookingMeta);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTblBookingId($value);

	public function queryByCompanionName($value);

	public function queryByAge($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeletedAt($value);


	public function deleteByTblBookingId($value);

	public function deleteByCompanionName($value);

	public function deleteByAge($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeletedAt($value);


}
?>