<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-11-19 12:59
 */
interface TblTourPackageImagesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblTourPackageImages 
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
 	 * @param tblTourPackageImage primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblTourPackageImages tblTourPackageImage
 	 */
	public function insert($tblTourPackageImage);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblTourPackageImages tblTourPackageImage
 	 */
	public function update($tblTourPackageImage);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTblTourPackageId($value);

	public function queryByImagePath($value);

	public function queryByImagePublicPath($value);

	public function queryByCreatedAt($value);

	public function queryByUpdatedAt($value);

	public function queryByDeletedAt($value);


	public function deleteByTblTourPackageId($value);

	public function deleteByImagePath($value);

	public function deleteByImagePublicPath($value);

	public function deleteByCreatedAt($value);

	public function deleteByUpdatedAt($value);

	public function deleteByDeletedAt($value);


}
?>