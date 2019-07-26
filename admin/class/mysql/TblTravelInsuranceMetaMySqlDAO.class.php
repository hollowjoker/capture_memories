<?php
/**
 * Class that operate on table 'tbl_travel_insurance_meta'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-07-26 08:38
 */
class TblTravelInsuranceMetaMySqlDAO implements TblTravelInsuranceMetaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblTravelInsuranceMetaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_travel_insurance_meta WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_travel_insurance_meta';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_travel_insurance_meta ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblTravelInsuranceMeta primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_travel_insurance_meta WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblTravelInsuranceMetaMySql tblTravelInsuranceMeta
 	 */
	public function insert($tblTravelInsuranceMeta){
		$sql = 'INSERT INTO tbl_travel_insurance_meta (tbl_travel_insurance_id, passenger_name, age, birth_date, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblTravelInsuranceMeta->tblTravelInsuranceId);
		$sqlQuery->set($tblTravelInsuranceMeta->passengerName);
		$sqlQuery->setNumber($tblTravelInsuranceMeta->age);
		$sqlQuery->set($tblTravelInsuranceMeta->birthDate);
		$sqlQuery->set($tblTravelInsuranceMeta->createdAt);
		$sqlQuery->set($tblTravelInsuranceMeta->updatedAt);
		$sqlQuery->set($tblTravelInsuranceMeta->deletedAt);

		$id = $this->executeInsert($sqlQuery);	
		$tblTravelInsuranceMeta->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblTravelInsuranceMetaMySql tblTravelInsuranceMeta
 	 */
	public function update($tblTravelInsuranceMeta){
		$sql = 'UPDATE tbl_travel_insurance_meta SET tbl_travel_insurance_id = ?, passenger_name = ?, age = ?, birth_date = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblTravelInsuranceMeta->tblTravelInsuranceId);
		$sqlQuery->set($tblTravelInsuranceMeta->passengerName);
		$sqlQuery->setNumber($tblTravelInsuranceMeta->age);
		$sqlQuery->set($tblTravelInsuranceMeta->birthDate);
		$sqlQuery->set($tblTravelInsuranceMeta->createdAt);
		$sqlQuery->set($tblTravelInsuranceMeta->updatedAt);
		$sqlQuery->set($tblTravelInsuranceMeta->deletedAt);

		$sqlQuery->setNumber($tblTravelInsuranceMeta->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_travel_insurance_meta';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTblTravelInsuranceId($value){
		$sql = 'SELECT * FROM tbl_travel_insurance_meta WHERE tbl_travel_insurance_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassengerName($value){
		$sql = 'SELECT * FROM tbl_travel_insurance_meta WHERE passenger_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAge($value){
		$sql = 'SELECT * FROM tbl_travel_insurance_meta WHERE age = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBirthDate($value){
		$sql = 'SELECT * FROM tbl_travel_insurance_meta WHERE birth_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedAt($value){
		$sql = 'SELECT * FROM tbl_travel_insurance_meta WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedAt($value){
		$sql = 'SELECT * FROM tbl_travel_insurance_meta WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeletedAt($value){
		$sql = 'SELECT * FROM tbl_travel_insurance_meta WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTblTravelInsuranceId($value){
		$sql = 'DELETE FROM tbl_travel_insurance_meta WHERE tbl_travel_insurance_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassengerName($value){
		$sql = 'DELETE FROM tbl_travel_insurance_meta WHERE passenger_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAge($value){
		$sql = 'DELETE FROM tbl_travel_insurance_meta WHERE age = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBirthDate($value){
		$sql = 'DELETE FROM tbl_travel_insurance_meta WHERE birth_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedAt($value){
		$sql = 'DELETE FROM tbl_travel_insurance_meta WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedAt($value){
		$sql = 'DELETE FROM tbl_travel_insurance_meta WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletedAt($value){
		$sql = 'DELETE FROM tbl_travel_insurance_meta WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblTravelInsuranceMetaMySql 
	 */
	protected function readRow($row){
		$tblTravelInsuranceMeta = new TblTravelInsuranceMeta();
		
		$tblTravelInsuranceMeta->id = $row['id'];
		$tblTravelInsuranceMeta->tblTravelInsuranceId = $row['tbl_travel_insurance_id'];
		$tblTravelInsuranceMeta->passengerName = $row['passenger_name'];
		$tblTravelInsuranceMeta->age = $row['age'];
		$tblTravelInsuranceMeta->birthDate = $row['birth_date'];
		$tblTravelInsuranceMeta->createdAt = $row['created_at'];
		$tblTravelInsuranceMeta->updatedAt = $row['updated_at'];
		$tblTravelInsuranceMeta->deletedAt = $row['deleted_at'];

		return $tblTravelInsuranceMeta;
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
	 * @return TblTravelInsuranceMetaMySql 
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