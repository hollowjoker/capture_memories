<?php
/**
 * Class that operate on table 'tbl_airline_ticket_res'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-11-14 06:33
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
		$sql = 'INSERT INTO tbl_airline_ticket_res (tbl_user_id, passenger_name, birth_date, age, type, passport_no, expiry_date, status, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblAirlineTicketRe->tblUserId);
		$sqlQuery->set($tblAirlineTicketRe->passengerName);
		$sqlQuery->set($tblAirlineTicketRe->birthDate);
		$sqlQuery->setNumber($tblAirlineTicketRe->age);
		$sqlQuery->set($tblAirlineTicketRe->type);
		$sqlQuery->set($tblAirlineTicketRe->passportNo);
		$sqlQuery->set($tblAirlineTicketRe->expiryDate);
		$sqlQuery->set($tblAirlineTicketRe->status);
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
		$sql = 'UPDATE tbl_airline_ticket_res SET tbl_user_id = ?, passenger_name = ?, birth_date = ?, age = ?, type = ?, passport_no = ?, expiry_date = ?, status = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblAirlineTicketRe->tblUserId);
		$sqlQuery->set($tblAirlineTicketRe->passengerName);
		$sqlQuery->set($tblAirlineTicketRe->birthDate);
		$sqlQuery->setNumber($tblAirlineTicketRe->age);
		$sqlQuery->set($tblAirlineTicketRe->type);
		$sqlQuery->set($tblAirlineTicketRe->passportNo);
		$sqlQuery->set($tblAirlineTicketRe->expiryDate);
		$sqlQuery->set($tblAirlineTicketRe->status);
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

	public function queryByTblUserId($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE tbl_user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassengerName($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE passenger_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBirthDate($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE birth_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAge($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE age = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByType($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassportNo($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE passport_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByExpiryDate($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE expiry_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res WHERE status = ?';
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


	public function deleteByTblUserId($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE tbl_user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassengerName($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE passenger_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBirthDate($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE birth_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAge($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE age = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByType($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassportNo($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE passport_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByExpiryDate($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE expiry_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res WHERE status = ?';
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
		$tblAirlineTicketRe->tblUserId = $row['tbl_user_id'];
		$tblAirlineTicketRe->passengerName = $row['passenger_name'];
		$tblAirlineTicketRe->birthDate = $row['birth_date'];
		$tblAirlineTicketRe->age = $row['age'];
		$tblAirlineTicketRe->type = $row['type'];
		$tblAirlineTicketRe->passportNo = $row['passport_no'];
		$tblAirlineTicketRe->expiryDate = $row['expiry_date'];
		$tblAirlineTicketRe->status = $row['status'];
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