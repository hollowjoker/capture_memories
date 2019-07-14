<?php
/**
 * Class that operate on table 'tbl_place'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-07-10 15:03
 */
class TblPlaceMySqlDAO implements TblPlaceDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblPlaceMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_place WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_place';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_place ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblPlace primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_place WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblPlaceMySql tblPlace
 	 */
	public function insert($tblPlace){
		$sql = 'INSERT INTO tbl_place (name, description, type, airline_status, visa_status, wifi_status, tour_status, status, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tblPlace->name);
		$sqlQuery->set($tblPlace->description);
		$sqlQuery->set($tblPlace->type);
		$sqlQuery->set($tblPlace->airlineStatus);
		$sqlQuery->set($tblPlace->visaStatus);
		$sqlQuery->set($tblPlace->wifiStatus);
		$sqlQuery->set($tblPlace->tourStatus);
		$sqlQuery->set($tblPlace->status);
		$sqlQuery->set($tblPlace->createdAt);
		$sqlQuery->set($tblPlace->updatedAt);
		$sqlQuery->set($tblPlace->deletedAt);

		$id = $this->executeInsert($sqlQuery);	
		$tblPlace->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblPlaceMySql tblPlace
 	 */
	public function update($tblPlace){
		$sql = 'UPDATE tbl_place SET name = ?, description = ?, type = ?, airline_status = ?, visa_status = ?, wifi_status = ?, tour_status = ?, status = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tblPlace->name);
		$sqlQuery->set($tblPlace->description);
		$sqlQuery->set($tblPlace->type);
		$sqlQuery->set($tblPlace->airlineStatus);
		$sqlQuery->set($tblPlace->visaStatus);
		$sqlQuery->set($tblPlace->wifiStatus);
		$sqlQuery->set($tblPlace->tourStatus);
		$sqlQuery->set($tblPlace->status);
		$sqlQuery->set($tblPlace->createdAt);
		$sqlQuery->set($tblPlace->updatedAt);
		$sqlQuery->set($tblPlace->deletedAt);

		$sqlQuery->setNumber($tblPlace->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_place';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM tbl_place WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM tbl_place WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByType($value){
		$sql = 'SELECT * FROM tbl_place WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAirlineStatus($value){
		$sql = 'SELECT * FROM tbl_place WHERE airline_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVisaStatus($value){
		$sql = 'SELECT * FROM tbl_place WHERE visa_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWifiStatus($value){
		$sql = 'SELECT * FROM tbl_place WHERE wifi_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTourStatus($value){
		$sql = 'SELECT * FROM tbl_place WHERE tour_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tbl_place WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedAt($value){
		$sql = 'SELECT * FROM tbl_place WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedAt($value){
		$sql = 'SELECT * FROM tbl_place WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeletedAt($value){
		$sql = 'SELECT * FROM tbl_place WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM tbl_place WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM tbl_place WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByType($value){
		$sql = 'DELETE FROM tbl_place WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAirlineStatus($value){
		$sql = 'DELETE FROM tbl_place WHERE airline_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVisaStatus($value){
		$sql = 'DELETE FROM tbl_place WHERE visa_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWifiStatus($value){
		$sql = 'DELETE FROM tbl_place WHERE wifi_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTourStatus($value){
		$sql = 'DELETE FROM tbl_place WHERE tour_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tbl_place WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedAt($value){
		$sql = 'DELETE FROM tbl_place WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedAt($value){
		$sql = 'DELETE FROM tbl_place WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletedAt($value){
		$sql = 'DELETE FROM tbl_place WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblPlaceMySql 
	 */
	protected function readRow($row){
		$tblPlace = new TblPlace();
		
		$tblPlace->id = $row['id'];
		$tblPlace->name = $row['name'];
		$tblPlace->description = $row['description'];
		$tblPlace->type = $row['type'];
		$tblPlace->airlineStatus = $row['airline_status'];
		$tblPlace->visaStatus = $row['visa_status'];
		$tblPlace->wifiStatus = $row['wifi_status'];
		$tblPlace->tourStatus = $row['tour_status'];
		$tblPlace->status = $row['status'];
		$tblPlace->createdAt = $row['created_at'];
		$tblPlace->updatedAt = $row['updated_at'];
		$tblPlace->deletedAt = $row['deleted_at'];

		return $tblPlace;
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
	 * @return TblPlaceMySql 
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