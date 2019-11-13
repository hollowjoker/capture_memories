<?php
/**
 * Class that operate on table 'tbl_travel_insurance'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-07-26 21:16
 */
class TblTravelInsuranceMySqlDAO implements TblTravelInsuranceDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblTravelInsuranceMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_travel_insurance WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_travel_insurance';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_travel_insurance ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblTravelInsurance primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_travel_insurance WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblTravelInsuranceMySql tblTravelInsurance
 	 */
	public function insert($tblTravelInsurance){
		$sql = 'INSERT INTO tbl_travel_insurance (tbl_user_id, passenger_name, age, birth_date, status, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblTravelInsurance->tblUserId);
		$sqlQuery->set($tblTravelInsurance->passengerName);
		$sqlQuery->setNumber($tblTravelInsurance->age);
		$sqlQuery->set($tblTravelInsurance->birthDate);
		$sqlQuery->set($tblTravelInsurance->status);
		$sqlQuery->set($tblTravelInsurance->createdAt);
		$sqlQuery->set($tblTravelInsurance->updatedAt);
		$sqlQuery->set($tblTravelInsurance->deletedAt);

		$id = $this->executeInsert($sqlQuery);	
		$tblTravelInsurance->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblTravelInsuranceMySql tblTravelInsurance
 	 */
	public function update($tblTravelInsurance){
		$sql = 'UPDATE tbl_travel_insurance SET tbl_user_id = ?, passenger_name = ?, age = ?, birth_date = ?, status = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblTravelInsurance->tblUserId);
		$sqlQuery->set($tblTravelInsurance->passengerName);
		$sqlQuery->setNumber($tblTravelInsurance->age);
		$sqlQuery->set($tblTravelInsurance->birthDate);
		$sqlQuery->set($tblTravelInsurance->status);
		$sqlQuery->set($tblTravelInsurance->createdAt);
		$sqlQuery->set($tblTravelInsurance->updatedAt);
		$sqlQuery->set($tblTravelInsurance->deletedAt);

		$sqlQuery->setNumber($tblTravelInsurance->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_travel_insurance';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTblUserId($value){
		$sql = 'SELECT * FROM tbl_travel_insurance WHERE tbl_user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassengerName($value){
		$sql = 'SELECT * FROM tbl_travel_insurance WHERE passenger_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAge($value){
		$sql = 'SELECT * FROM tbl_travel_insurance WHERE age = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBirthDate($value){
		$sql = 'SELECT * FROM tbl_travel_insurance WHERE birth_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tbl_travel_insurance WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedAt($value){
		$sql = 'SELECT * FROM tbl_travel_insurance WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedAt($value){
		$sql = 'SELECT * FROM tbl_travel_insurance WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeletedAt($value){
		$sql = 'SELECT * FROM tbl_travel_insurance WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTblUserId($value){
		$sql = 'DELETE FROM tbl_travel_insurance WHERE tbl_user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassengerName($value){
		$sql = 'DELETE FROM tbl_travel_insurance WHERE passenger_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAge($value){
		$sql = 'DELETE FROM tbl_travel_insurance WHERE age = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBirthDate($value){
		$sql = 'DELETE FROM tbl_travel_insurance WHERE birth_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tbl_travel_insurance WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedAt($value){
		$sql = 'DELETE FROM tbl_travel_insurance WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedAt($value){
		$sql = 'DELETE FROM tbl_travel_insurance WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletedAt($value){
		$sql = 'DELETE FROM tbl_travel_insurance WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblTravelInsuranceMySql 
	 */
	protected function readRow($row){
		$tblTravelInsurance = new TblTravelInsurance();
		
		$tblTravelInsurance->id = $row['id'];
		$tblTravelInsurance->tblUserId = $row['tbl_user_id'];
		$tblTravelInsurance->passengerName = $row['passenger_name'];
		$tblTravelInsurance->age = $row['age'];
		$tblTravelInsurance->birthDate = $row['birth_date'];
		$tblTravelInsurance->status = $row['status'];
		$tblTravelInsurance->createdAt = $row['created_at'];
		$tblTravelInsurance->updatedAt = $row['updated_at'];
		$tblTravelInsurance->deletedAt = $row['deleted_at'];

		return $tblTravelInsurance;
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
	 * @return TblTravelInsuranceMySql 
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