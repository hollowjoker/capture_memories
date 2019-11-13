<?php
/**
 * Class that operate on table 'tbl_wifi_rental'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-07-26 21:16
 */
class TblWifiRentalMySqlDAO implements TblWifiRentalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblWifiRentalMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_wifi_rental WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_wifi_rental';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_wifi_rental ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblWifiRental primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_wifi_rental WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblWifiRentalMySql tblWifiRental
 	 */
	public function insert($tblWifiRental){
		$sql = 'INSERT INTO tbl_wifi_rental (tbl_user_id, passenger_name, destination, traveled_from_at, traveled_to_at, destination_type, status, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblWifiRental->tblUserId);
		$sqlQuery->set($tblWifiRental->passengerName);
		$sqlQuery->set($tblWifiRental->destination);
		$sqlQuery->set($tblWifiRental->traveledFromAt);
		$sqlQuery->set($tblWifiRental->traveledToAt);
		$sqlQuery->set($tblWifiRental->destinationType);
		$sqlQuery->set($tblWifiRental->status);
		$sqlQuery->set($tblWifiRental->createdAt);
		$sqlQuery->set($tblWifiRental->updatedAt);
		$sqlQuery->set($tblWifiRental->deletedAt);

		$id = $this->executeInsert($sqlQuery);	
		$tblWifiRental->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblWifiRentalMySql tblWifiRental
 	 */
	public function update($tblWifiRental){
		$sql = 'UPDATE tbl_wifi_rental SET tbl_user_id = ?, passenger_name = ?, destination = ?, traveled_from_at = ?, traveled_to_at = ?, destination_type = ?, status = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblWifiRental->tblUserId);
		$sqlQuery->set($tblWifiRental->passengerName);
		$sqlQuery->set($tblWifiRental->destination);
		$sqlQuery->set($tblWifiRental->traveledFromAt);
		$sqlQuery->set($tblWifiRental->traveledToAt);
		$sqlQuery->set($tblWifiRental->destinationType);
		$sqlQuery->set($tblWifiRental->status);
		$sqlQuery->set($tblWifiRental->createdAt);
		$sqlQuery->set($tblWifiRental->updatedAt);
		$sqlQuery->set($tblWifiRental->deletedAt);

		$sqlQuery->setNumber($tblWifiRental->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_wifi_rental';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTblUserId($value){
		$sql = 'SELECT * FROM tbl_wifi_rental WHERE tbl_user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassengerName($value){
		$sql = 'SELECT * FROM tbl_wifi_rental WHERE passenger_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDestination($value){
		$sql = 'SELECT * FROM tbl_wifi_rental WHERE destination = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTraveledFromAt($value){
		$sql = 'SELECT * FROM tbl_wifi_rental WHERE traveled_from_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTraveledToAt($value){
		$sql = 'SELECT * FROM tbl_wifi_rental WHERE traveled_to_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDestinationType($value){
		$sql = 'SELECT * FROM tbl_wifi_rental WHERE destination_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tbl_wifi_rental WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedAt($value){
		$sql = 'SELECT * FROM tbl_wifi_rental WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedAt($value){
		$sql = 'SELECT * FROM tbl_wifi_rental WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeletedAt($value){
		$sql = 'SELECT * FROM tbl_wifi_rental WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTblUserId($value){
		$sql = 'DELETE FROM tbl_wifi_rental WHERE tbl_user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassengerName($value){
		$sql = 'DELETE FROM tbl_wifi_rental WHERE passenger_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDestination($value){
		$sql = 'DELETE FROM tbl_wifi_rental WHERE destination = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTraveledFromAt($value){
		$sql = 'DELETE FROM tbl_wifi_rental WHERE traveled_from_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTraveledToAt($value){
		$sql = 'DELETE FROM tbl_wifi_rental WHERE traveled_to_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDestinationType($value){
		$sql = 'DELETE FROM tbl_wifi_rental WHERE destination_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tbl_wifi_rental WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedAt($value){
		$sql = 'DELETE FROM tbl_wifi_rental WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedAt($value){
		$sql = 'DELETE FROM tbl_wifi_rental WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletedAt($value){
		$sql = 'DELETE FROM tbl_wifi_rental WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblWifiRentalMySql 
	 */
	protected function readRow($row){
		$tblWifiRental = new TblWifiRental();
		
		$tblWifiRental->id = $row['id'];
		$tblWifiRental->tblUserId = $row['tbl_user_id'];
		$tblWifiRental->passengerName = $row['passenger_name'];
		$tblWifiRental->destination = $row['destination'];
		$tblWifiRental->traveledFromAt = $row['traveled_from_at'];
		$tblWifiRental->traveledToAt = $row['traveled_to_at'];
		$tblWifiRental->destinationType = $row['destination_type'];
		$tblWifiRental->status = $row['status'];
		$tblWifiRental->createdAt = $row['created_at'];
		$tblWifiRental->updatedAt = $row['updated_at'];
		$tblWifiRental->deletedAt = $row['deleted_at'];

		return $tblWifiRental;
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
	 * @return TblWifiRentalMySql 
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