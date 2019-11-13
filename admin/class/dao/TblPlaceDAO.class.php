<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-11-13 10:12
 */
interface TblPlaceDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblPlace 
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
 	 * @param tblPlace primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblPlace tblPlace
 	 */
	public function insert($tblPlace);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblPlace tblPlace
 	 */
	public function update($tblPlace);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByDescription($value);

	public function queryByType($value);

	public function queryByAirlineStatus($value);

	public function queryByVisaStatus($value);

	public function queryByWifiStatus($value);

	public function queryByTourStatus($value);

	public function queryByStatus($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeletedAt($value);


	public function deleteByName($value);

	public function deleteByDescription($value);

	public function deleteByType($value);

	public function deleteByAirlineStatus($value);

	public function deleteByVisaStatus($value);

	public function deleteByWifiStatus($value);

	public function deleteByTourStatus($value);

	public function deleteByStatus($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeletedAt($value);


}
?>