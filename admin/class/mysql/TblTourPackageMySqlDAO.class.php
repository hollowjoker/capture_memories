<?php
/**
 * Class that operate on table 'tbl_tour_package'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-11-13 09:17
 */
class TblTourPackageMySqlDAO implements TblTourPackageDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblTourPackageMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_tour_package WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_tour_package';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_tour_package ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblTourPackage primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_tour_package WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblTourPackageMySql tblTourPackage
 	 */
	public function insert($tblTourPackage){
		$sql = 'INSERT INTO tbl_tour_package (place_id, name, description, travel_period_from_at, travel_period_to_at, selling_period, limit, image_path, image_public_path, status, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblTourPackage->placeId);
		$sqlQuery->set($tblTourPackage->name);
		$sqlQuery->set($tblTourPackage->description);
		$sqlQuery->set($tblTourPackage->travelPeriodFromAt);
		$sqlQuery->set($tblTourPackage->travelPeriodToAt);
		$sqlQuery->set($tblTourPackage->sellingPeriod);
		$sqlQuery->setNumber($tblTourPackage->limit);
		$sqlQuery->set($tblTourPackage->imagePath);
		$sqlQuery->set($tblTourPackage->imagePublicPath);
		$sqlQuery->set($tblTourPackage->status);
		$sqlQuery->set($tblTourPackage->createdAt);
		$sqlQuery->set($tblTourPackage->updatedAt);
		$sqlQuery->set($tblTourPackage->deletedAt);

		$id = $this->executeInsert($sqlQuery);	
		$tblTourPackage->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblTourPackageMySql tblTourPackage
 	 */
	public function update($tblTourPackage){
		$sql = 'UPDATE tbl_tour_package SET place_id = ?, name = ?, description = ?, travel_period_from_at = ?, travel_period_to_at = ?, selling_period = ?, limit = ?, image_path = ?, image_public_path = ?, status = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblTourPackage->placeId);
		$sqlQuery->set($tblTourPackage->name);
		$sqlQuery->set($tblTourPackage->description);
		$sqlQuery->set($tblTourPackage->travelPeriodFromAt);
		$sqlQuery->set($tblTourPackage->travelPeriodToAt);
		$sqlQuery->set($tblTourPackage->sellingPeriod);
		$sqlQuery->setNumber($tblTourPackage->limit);
		$sqlQuery->set($tblTourPackage->imagePath);
		$sqlQuery->set($tblTourPackage->imagePublicPath);
		$sqlQuery->set($tblTourPackage->status);
		$sqlQuery->set($tblTourPackage->createdAt);
		$sqlQuery->set($tblTourPackage->updatedAt);
		$sqlQuery->set($tblTourPackage->deletedAt);

		$sqlQuery->setNumber($tblTourPackage->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_tour_package';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPlaceId($value){
		$sql = 'SELECT * FROM tbl_tour_package WHERE place_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM tbl_tour_package WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM tbl_tour_package WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTravelPeriodFromAt($value){
		$sql = 'SELECT * FROM tbl_tour_package WHERE travel_period_from_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTravelPeriodToAt($value){
		$sql = 'SELECT * FROM tbl_tour_package WHERE travel_period_to_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySellingPeriod($value){
		$sql = 'SELECT * FROM tbl_tour_package WHERE selling_period = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLimit($value){
		$sql = 'SELECT * FROM tbl_tour_package WHERE limit = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImagePath($value){
		$sql = 'SELECT * FROM tbl_tour_package WHERE image_path = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImagePublicPath($value){
		$sql = 'SELECT * FROM tbl_tour_package WHERE image_public_path = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tbl_tour_package WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedAt($value){
		$sql = 'SELECT * FROM tbl_tour_package WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedAt($value){
		$sql = 'SELECT * FROM tbl_tour_package WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeletedAt($value){
		$sql = 'SELECT * FROM tbl_tour_package WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPlaceId($value){
		$sql = 'DELETE FROM tbl_tour_package WHERE place_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByName($value){
		$sql = 'DELETE FROM tbl_tour_package WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM tbl_tour_package WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTravelPeriodFromAt($value){
		$sql = 'DELETE FROM tbl_tour_package WHERE travel_period_from_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTravelPeriodToAt($value){
		$sql = 'DELETE FROM tbl_tour_package WHERE travel_period_to_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySellingPeriod($value){
		$sql = 'DELETE FROM tbl_tour_package WHERE selling_period = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLimit($value){
		$sql = 'DELETE FROM tbl_tour_package WHERE limit = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImagePath($value){
		$sql = 'DELETE FROM tbl_tour_package WHERE image_path = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImagePublicPath($value){
		$sql = 'DELETE FROM tbl_tour_package WHERE image_public_path = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tbl_tour_package WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedAt($value){
		$sql = 'DELETE FROM tbl_tour_package WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedAt($value){
		$sql = 'DELETE FROM tbl_tour_package WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletedAt($value){
		$sql = 'DELETE FROM tbl_tour_package WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblTourPackageMySql 
	 */
	protected function readRow($row){
		$tblTourPackage = new TblTourPackage();
		
		$tblTourPackage->id = $row['id'];
		$tblTourPackage->placeId = $row['place_id'];
		$tblTourPackage->name = $row['name'];
		$tblTourPackage->description = $row['description'];
		$tblTourPackage->travelPeriodFromAt = $row['travel_period_from_at'];
		$tblTourPackage->travelPeriodToAt = $row['travel_period_to_at'];
		$tblTourPackage->sellingPeriod = $row['selling_period'];
		$tblTourPackage->limit = $row['limit'];
		$tblTourPackage->imagePath = $row['image_path'];
		$tblTourPackage->imagePublicPath = $row['image_public_path'];
		$tblTourPackage->status = $row['status'];
		$tblTourPackage->createdAt = $row['created_at'];
		$tblTourPackage->updatedAt = $row['updated_at'];
		$tblTourPackage->deletedAt = $row['deleted_at'];

		return $tblTourPackage;
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
	 * @return TblTourPackageMySql 
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