<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-11-13 10:12
 */
interface TblTourPackageMetaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblTourPackageMeta 
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
 	 * @param tblTourPackageMeta primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblTourPackageMeta tblTourPackageMeta
 	 */
	public function insert($tblTourPackageMeta);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblTourPackageMeta tblTourPackageMeta
 	 */
	public function update($tblTourPackageMeta);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTblTourPackageId($value);

	public function queryByQuantity($value);

	public function queryByPrice($value);

	public function queryByStatus($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeletedAt($value);


	public function deleteByTblTourPackageId($value);

	public function deleteByQuantity($value);

	public function deleteByPrice($value);

	public function deleteByStatus($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeletedAt($value);


}
?>