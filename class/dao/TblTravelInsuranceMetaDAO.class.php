<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-07-21 22:58
 */
interface TblTravelInsuranceMetaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblTravelInsuranceMeta 
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
 	 * @param tblTravelInsuranceMeta primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblTravelInsuranceMeta tblTravelInsuranceMeta
 	 */
	public function insert($tblTravelInsuranceMeta);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblTravelInsuranceMeta tblTravelInsuranceMeta
 	 */
	public function update($tblTravelInsuranceMeta);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTblTravelInsuranceId($value);

	public function queryByPassengerName($value);

	public function queryByAge($value);

	public function queryByBirthDate($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeletedAt($value);


	public function deleteByTblTravelInsuranceId($value);

	public function deleteByPassengerName($value);

	public function deleteByAge($value);

	public function deleteByBirthDate($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeletedAt($value);


}
?>