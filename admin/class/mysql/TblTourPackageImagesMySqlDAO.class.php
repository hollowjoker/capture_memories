<?php
/**
 * Class that operate on table 'tbl_tour_package_images'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-11-19 12:59
 */
class TblTourPackageImagesMySqlDAO implements TblTourPackageImagesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblTourPackageImagesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_tour_package_images WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_tour_package_images';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_tour_package_images ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblTourPackageImage primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_tour_package_images WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblTourPackageImagesMySql tblTourPackageImage
 	 */
	public function insert($tblTourPackageImage){
		$sql = 'INSERT INTO tbl_tour_package_images (tbl_tour_package_id, image_path, image_public_path, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblTourPackageImage->tblTourPackageId);
		$sqlQuery->set($tblTourPackageImage->imagePath);
		$sqlQuery->set($tblTourPackageImage->imagePublicPath);
		$sqlQuery->set($tblTourPackageImage->createdAt);
		$sqlQuery->set($tblTourPackageImage->updatedAt);
		$sqlQuery->set($tblTourPackageImage->deletedAt);

		$id = $this->executeInsert($sqlQuery);	
		$tblTourPackageImage->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblTourPackageImagesMySql tblTourPackageImage
 	 */
	public function update($tblTourPackageImage){
		$sql = 'UPDATE tbl_tour_package_images SET tbl_tour_package_id = ?, image_path = ?, image_public_path = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblTourPackageImage->tblTourPackageId);
		$sqlQuery->set($tblTourPackageImage->imagePath);
		$sqlQuery->set($tblTourPackageImage->imagePublicPath);
		$sqlQuery->set($tblTourPackageImage->createdAt);
		$sqlQuery->set($tblTourPackageImage->updatedAt);
		$sqlQuery->set($tblTourPackageImage->deletedAt);

		$sqlQuery->setNumber($tblTourPackageImage->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_tour_package_images';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTblTourPackageId($value){
		$sql = 'SELECT * FROM tbl_tour_package_images WHERE tbl_tour_package_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImagePath($value){
		$sql = 'SELECT * FROM tbl_tour_package_images WHERE image_path = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImagePublicPath($value){
		$sql = 'SELECT * FROM tbl_tour_package_images WHERE image_public_path = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedAt($value){
		$sql = 'SELECT * FROM tbl_tour_package_images WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedAt($value){
		$sql = 'SELECT * FROM tbl_tour_package_images WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeletedAt($value){
		$sql = 'SELECT * FROM tbl_tour_package_images WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTblTourPackageId($value){
		$sql = 'DELETE FROM tbl_tour_package_images WHERE tbl_tour_package_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImagePath($value){
		$sql = 'DELETE FROM tbl_tour_package_images WHERE image_path = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImagePublicPath($value){
		$sql = 'DELETE FROM tbl_tour_package_images WHERE image_public_path = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedAt($value){
		$sql = 'DELETE FROM tbl_tour_package_images WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedAt($value){
		$sql = 'DELETE FROM tbl_tour_package_images WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletedAt($value){
		$sql = 'DELETE FROM tbl_tour_package_images WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblTourPackageImagesMySql 
	 */
	protected function readRow($row){
		$tblTourPackageImage = new TblTourPackageImage();
		
		$tblTourPackageImage->id = $row['id'];
		$tblTourPackageImage->tblTourPackageId = $row['tbl_tour_package_id'];
		$tblTourPackageImage->imagePath = $row['image_path'];
		$tblTourPackageImage->imagePublicPath = $row['image_public_path'];
		$tblTourPackageImage->createdAt = $row['created_at'];
		$tblTourPackageImage->updatedAt = $row['updated_at'];
		$tblTourPackageImage->deletedAt = $row['deleted_at'];

		return $tblTourPackageImage;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return TblTourPackageImagesMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>