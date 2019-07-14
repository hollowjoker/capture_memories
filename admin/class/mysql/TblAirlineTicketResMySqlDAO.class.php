<?php
/**
 * Class that operate on table 'tbl_airline_ticket_res'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-07-10 15:03
 */
class TblAirlineTicketResMySqlDAO implements TblAirlineTicketResDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblAirlineTicketResMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_airline_ticket_res';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_airline_ticket_res ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblAirlineTicketRe primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblAirlineTicketResMySql tblAirlineTicketRe
 	 */
	public function insert($tblAirlineTicketRe){
		$sql = 'INSERT INTO tbl_airline_ticket_res (user_id, location, quantity, status, traveled_from_at, traveled_to_at, type, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblAirlineTicketRe->userId);
		$sqlQuery->set($tblAirlineTicketRe->location);
		$sqlQuery->setNumber($tblAirlineTicketRe->quantity);
		$sqlQuery->set($tblAirlineTicketRe->status);
		$sqlQuery->set($tblAirlineTicketRe->traveledFromAt);
		$sqlQuery->set($tblAirlineTicketRe->traveledToAt);
		$sqlQuery->set($tblAirlineTicketRe->type);
		$sqlQuery->set($tblAirlineTicketRe->createdAt);
		$sqlQuery->set($tblAirlineTicketRe->updatedAt);
		$sqlQuery->set($tblAirlineTicketRe->deletedAt);

		$id = $this->executeInsert($sqlQuery);	
		$tblAirlineTicketRe->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblAirlineTicketResMySql tblAirlineTicketRe
 	 */
	public function update($tblAirlineTicketRe){
		$sql = 'UPDATE tbl_airline_ticket_res SET user_id = ?, location = ?, quantity = ?, status = ?, traveled_from_at = ?, traveled_to_at = ?, type = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblAirlineTicketRe->userId);
		$sqlQuery->set($tblAirlineTicketRe->location);
		$sqlQuery->setNumber($tblAirlineTicketRe->quantity);
		$sqlQuery->set($tblAirlineTicketRe->status);
		$sqlQuery->set($tblAirlineTicketRe->traveledFromAt);
		$sqlQuery->set($tblAirlineTicketRe->traveledToAt);
		$sqlQuery->set($tblAirlineTicketRe->type);
		$sqlQuery->set($tblAirlineTicketRe->createdAt);
		$sqlQuery->set($tblAirlineTicketRe->updatedAt);
		$sqlQuery->set($tblAirlineTicketRe->deletedAt);

		$sqlQuery->setNumber($tblAirlineTicketRe->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_airline_ticket_res';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUserId($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLocation($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE location = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuantity($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE quantity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTraveledFromAt($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE traveled_from_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTraveledToAt($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE traveled_to_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByType($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedAt($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedAt($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeletedAt($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUserId($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLocation($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE location = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuantity($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE quantity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTraveledFromAt($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE traveled_from_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTraveledToAt($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE traveled_to_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByType($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedAt($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedAt($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletedAt($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblAirlineTicketResMySql 
	 */
	protected function readRow($row){
		$tblAirlineTicketRe = new TblAirlineTicketRe();
		
		$tblAirlineTicketRe->id = $row['id'];
		$tblAirlineTicketRe->userId = $row['user_id'];
		$tblAirlineTicketRe->location = $row['location'];
		$tblAirlineTicketRe->quantity = $row['quantity'];
		$tblAirlineTicketRe->status = $row['status'];
		$tblAirlineTicketRe->traveledFromAt = $row['traveled_from_at'];
		$tblAirlineTicketRe->traveledToAt = $row['traveled_to_at'];
		$tblAirlineTicketRe->type = $row['type'];
		$tblAirlineTicketRe->createdAt = $row['created_at'];
		$tblAirlineTicketRe->updatedAt = $row['updated_at'];
		$tblAirlineTicketRe->deletedAt = $row['deleted_at'];

		return $tblAirlineTicketRe;
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
	 * @return TblAirlineTicketResMySql 
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