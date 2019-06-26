<?php
/**
 * Class that operate on table 'tbl_airline_ticket_res_meta'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblAirlineTicketResMetaMySqlDAO implements TblAirlineTicketResMetaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblAirlineTicketResMetaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_airline_ticket_res_meta WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_airline_ticket_res_meta';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_airline_ticket_res_meta ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblAirlineTicketResMeta primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_airline_ticket_res_meta WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblAirlineTicketResMetaMySql tblAirlineTicketResMeta
 	 */
	public function insert($tblAirlineTicketResMeta){
		$sql = 'INSERT INTO tbl_airline_ticket_res_meta (tbl_airline_ticket_res_id, passenger_name, age, birth_date, passport_number, expiry_date, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblAirlineTicketResMeta->tblAirlineTicketResId);
		$sqlQuery->set($tblAirlineTicketResMeta->passengerName);
		$sqlQuery->set($tblAirlineTicketResMeta->age);
		$sqlQuery->set($tblAirlineTicketResMeta->birthDate);
		$sqlQuery->set($tblAirlineTicketResMeta->passportNumber);
		$sqlQuery->set($tblAirlineTicketResMeta->expiryDate);
		$sqlQuery->set($tblAirlineTicketResMeta->createdAt);
		$sqlQuery->set($tblAirlineTicketResMeta->updatedAt);
		$sqlQuery->set($tblAirlineTicketResMeta->deletedAt);

		$id = $this->executeInsert($sqlQuery);	
		$tblAirlineTicketResMeta->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblAirlineTicketResMetaMySql tblAirlineTicketResMeta
 	 */
	public function update($tblAirlineTicketResMeta){
		$sql = 'UPDATE tbl_airline_ticket_res_meta SET tbl_airline_ticket_res_id = ?, passenger_name = ?, age = ?, birth_date = ?, passport_number = ?, expiry_date = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblAirlineTicketResMeta->tblAirlineTicketResId);
		$sqlQuery->set($tblAirlineTicketResMeta->passengerName);
		$sqlQuery->set($tblAirlineTicketResMeta->age);
		$sqlQuery->set($tblAirlineTicketResMeta->birthDate);
		$sqlQuery->set($tblAirlineTicketResMeta->passportNumber);
		$sqlQuery->set($tblAirlineTicketResMeta->expiryDate);
		$sqlQuery->set($tblAirlineTicketResMeta->createdAt);
		$sqlQuery->set($tblAirlineTicketResMeta->updatedAt);
		$sqlQuery->set($tblAirlineTicketResMeta->deletedAt);

		$sqlQuery->setNumber($tblAirlineTicketResMeta->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_airline_ticket_res_meta';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTblAirlineTicketResId($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res_meta WHERE tbl_airline_ticket_res_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassengerName($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res_meta WHERE passenger_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAge($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res_meta WHERE age = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBirthDate($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res_meta WHERE birth_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassportNumber($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res_meta WHERE passport_number = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByExpiryDate($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res_meta WHERE expiry_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedAt($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res_meta WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedAt($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res_meta WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeletedAt($value){
		$sql = 'SELECT * FROM tbl_airline_ticket_res_meta WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTblAirlineTicketResId($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res_meta WHERE tbl_airline_ticket_res_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassengerName($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res_meta WHERE passenger_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAge($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res_meta WHERE age = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBirthDate($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res_meta WHERE birth_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassportNumber($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res_meta WHERE passport_number = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByExpiryDate($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res_meta WHERE expiry_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedAt($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res_meta WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedAt($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res_meta WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletedAt($value){
		$sql = 'DELETE FROM tbl_airline_ticket_res_meta WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblAirlineTicketResMetaMySql 
	 */
	protected function readRow($row){
		$tblAirlineTicketResMeta = new TblAirlineTicketResMeta();
		
		$tblAirlineTicketResMeta->id = $row['id'];
		$tblAirlineTicketResMeta->tblAirlineTicketResId = $row['tbl_airline_ticket_res_id'];
		$tblAirlineTicketResMeta->passengerName = $row['passenger_name'];
		$tblAirlineTicketResMeta->age = $row['age'];
		$tblAirlineTicketResMeta->birthDate = $row['birth_date'];
		$tblAirlineTicketResMeta->passportNumber = $row['passport_number'];
		$tblAirlineTicketResMeta->expiryDate = $row['expiry_date'];
		$tblAirlineTicketResMeta->createdAt = $row['created_at'];
		$tblAirlineTicketResMeta->updatedAt = $row['updated_at'];
		$tblAirlineTicketResMeta->deletedAt = $row['deleted_at'];

		return $tblAirlineTicketResMeta;
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
	 * @return TblAirlineTicketResMetaMySql 
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