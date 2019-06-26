<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
interface TblTourPackageDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblTourPackage 
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
 	 * @param tblTourPackage primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblTourPackage tblTourPackage
 	 */
	public function insert($tblTourPackage);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblTourPackage tblTourPackage
 	 */
	public function update($tblTourPackage);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByTravelPeriodFromAt($value);

	public function queryByTravelPeriodToAt($value);

	public function queryBySellingPeriod($value);

	public function queryByImagePath($value);

	public function queryByStatus($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeletedAt($value);


	public function deleteByName($value);

	public function deleteByTravelPeriodFromAt($value);

	public function deleteByTravelPeriodToAt($value);

	public function deleteBySellingPeriod($value);

	public function deleteByImagePath($value);

	public function deleteByStatus($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeletedAt($value);


}
?>