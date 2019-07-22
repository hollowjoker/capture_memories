<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-07-21 22:58
 */
interface TblTravelInsuranceDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblTravelInsurance 
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
 	 * @param tblTravelInsurance primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblTravelInsurance tblTravelInsurance
 	 */
	public function insert($tblTravelInsurance);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblTravelInsurance tblTravelInsurance
 	 */
	public function update($tblTravelInsurance);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTblUserId($value);

	public function queryByQuantity($value);

	public function queryByStatus($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeletedAt($value);


	public function deleteByTblUserId($value);

	public function deleteByQuantity($value);

	public function deleteByStatus($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeletedAt($value);


}
?>