<?php
/**
 * Class that operate on table 'tbl_visa_processing'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-11-19 12:59
 */
class TblVisaProcessingMySqlDAO implements TblVisaProcessingDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblVisaProcessingMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_visa_processing WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_visa_processing';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_visa_processing ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblVisaProcessing primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_visa_processing WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblVisaProcessingMySql tblVisaProcessing
 	 */
	public function insert($tblVisaProcessing){
		$sql = 'INSERT INTO tbl_visa_processing (tbl_user_id, passenger_name, age, traveled_from_at, traveled_to_at, status, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblVisaProcessing->tblUserId);
		$sqlQuery->set($tblVisaProcessing->passengerName);
		$sqlQuery->setNumber($tblVisaProcessing->age);
		$sqlQuery->set($tblVisaProcessing->traveledFromAt);
		$sqlQuery->set($tblVisaProcessing->traveledToAt);
		$sqlQuery->set($tblVisaProcessing->status);
		$sqlQuery->set($tblVisaProcessing->createdAt);
		$sqlQuery->set($tblVisaProcessing->updatedAt);
		$sqlQuery->set($tblVisaProcessing->deletedAt);

		$id = $this->executeInsert($sqlQuery);	
		$tblVisaProcessing->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblVisaProcessingMySql tblVisaProcessing
 	 */
	public function update($tblVisaProcessing){
		$sql = 'UPDATE tbl_visa_processing SET tbl_user_id = ?, passenger_name = ?, age = ?, traveled_from_at = ?, traveled_to_at = ?, status = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblVisaProcessing->tblUserId);
		$sqlQuery->set($tblVisaProcessing->passengerName);
		$sqlQuery->setNumber($tblVisaProcessing->age);
		$sqlQuery->set($tblVisaProcessing->traveledFromAt);
		$sqlQuery->set($tblVisaProcessing->traveledToAt);
		$sqlQuery->set($tblVisaProcessing->status);
		$sqlQuery->set($tblVisaProcessing->createdAt);
		$sqlQuery->set($tblVisaProcessing->updatedAt);
		$sqlQuery->set($tblVisaProcessing->deletedAt);

		$sqlQuery->setNumber($tblVisaProcessing->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_visa_processing';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTblUserId($value){
		$sql = 'SELECT * FROM tbl_visa_processing WHERE tbl_user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassengerName($value){
		$sql = 'SELECT * FROM tbl_visa_processing WHERE passenger_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAge($value){
		$sql = 'SELECT * FROM tbl_visa_processing WHERE age = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTraveledFromAt($value){
		$sql = 'SELECT * FROM tbl_visa_processing WHERE traveled_from_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTraveledToAt($value){
		$sql = 'SELECT * FROM tbl_visa_processing WHERE traveled_to_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tbl_visa_processing WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedAt($value){
		$sql = 'SELECT * FROM tbl_visa_processing WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedAt($value){
		$sql = 'SELECT * FROM tbl_visa_processing WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeletedAt($value){
		$sql = 'SELECT * FROM tbl_visa_processing WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTblUserId($value){
		$sql = 'DELETE FROM tbl_visa_processing WHERE tbl_user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassengerName($value){
		$sql = 'DELETE FROM tbl_visa_processing WHERE passenger_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAge($value){
		$sql = 'DELETE FROM tbl_visa_processing WHERE age = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTraveledFromAt($value){
		$sql = 'DELETE FROM tbl_visa_processing WHERE traveled_from_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTraveledToAt($value){
		$sql = 'DELETE FROM tbl_visa_processing WHERE traveled_to_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tbl_visa_processing WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedAt($value){
		$sql = 'DELETE FROM tbl_visa_processing WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedAt($value){
		$sql = 'DELETE FROM tbl_visa_processing WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletedAt($value){
		$sql = 'DELETE FROM tbl_visa_processing WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblVisaProcessingMySql 
	 */
	protected function readRow($row){
		$tblVisaProcessing = new TblVisaProcessing();
		
		$tblVisaProcessing->id = $row['id'];
		$tblVisaProcessing->tblUserId = $row['tbl_user_id'];
		$tblVisaProcessing->passengerName = $row['passenger_name'];
		$tblVisaProcessing->age = $row['age'];
		$tblVisaProcessing->traveledFromAt = $row['traveled_from_at'];
		$tblVisaProcessing->traveledToAt = $row['traveled_to_at'];
		$tblVisaProcessing->status = $row['status'];
		$tblVisaProcessing->createdAt = $row['created_at'];
		$tblVisaProcessing->updatedAt = $row['updated_at'];
		$tblVisaProcessing->deletedAt = $row['deleted_at'];

		return $tblVisaProcessing;
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
	 * @return TblVisaProcessingMySql 
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