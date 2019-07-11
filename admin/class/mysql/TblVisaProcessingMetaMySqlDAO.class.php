<?php
/**
 * Class that operate on table 'tbl_visa_processing_meta'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-07-10 15:03
 */
class TblVisaProcessingMetaMySqlDAO implements TblVisaProcessingMetaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblVisaProcessingMetaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_visa_processing_meta WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_visa_processing_meta';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_visa_processing_meta ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblVisaProcessingMeta primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_visa_processing_meta WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblVisaProcessingMetaMySql tblVisaProcessingMeta
 	 */
	public function insert($tblVisaProcessingMeta){
		$sql = 'INSERT INTO tbl_visa_processing_meta (tbl_visa_processing_id, passenger_name, age, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblVisaProcessingMeta->tblVisaProcessingId);
		$sqlQuery->set($tblVisaProcessingMeta->passengerName);
		$sqlQuery->set($tblVisaProcessingMeta->age);
		$sqlQuery->set($tblVisaProcessingMeta->createdAt);
		$sqlQuery->set($tblVisaProcessingMeta->updatedAt);
		$sqlQuery->set($tblVisaProcessingMeta->deletedAt);

		$id = $this->executeInsert($sqlQuery);	
		$tblVisaProcessingMeta->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblVisaProcessingMetaMySql tblVisaProcessingMeta
 	 */
	public function update($tblVisaProcessingMeta){
		$sql = 'UPDATE tbl_visa_processing_meta SET tbl_visa_processing_id = ?, passenger_name = ?, age = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblVisaProcessingMeta->tblVisaProcessingId);
		$sqlQuery->set($tblVisaProcessingMeta->passengerName);
		$sqlQuery->set($tblVisaProcessingMeta->age);
		$sqlQuery->set($tblVisaProcessingMeta->createdAt);
		$sqlQuery->set($tblVisaProcessingMeta->updatedAt);
		$sqlQuery->set($tblVisaProcessingMeta->deletedAt);

		$sqlQuery->setNumber($tblVisaProcessingMeta->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_visa_processing_meta';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTblVisaProcessingId($value){
		$sql = 'SELECT * FROM tbl_visa_processing_meta WHERE tbl_visa_processing_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassengerName($value){
		$sql = 'SELECT * FROM tbl_visa_processing_meta WHERE passenger_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAge($value){
		$sql = 'SELECT * FROM tbl_visa_processing_meta WHERE age = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedAt($value){
		$sql = 'SELECT * FROM tbl_visa_processing_meta WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedAt($value){
		$sql = 'SELECT * FROM tbl_visa_processing_meta WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeletedAt($value){
		$sql = 'SELECT * FROM tbl_visa_processing_meta WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTblVisaProcessingId($value){
		$sql = 'DELETE FROM tbl_visa_processing_meta WHERE tbl_visa_processing_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassengerName($value){
		$sql = 'DELETE FROM tbl_visa_processing_meta WHERE passenger_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAge($value){
		$sql = 'DELETE FROM tbl_visa_processing_meta WHERE age = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedAt($value){
		$sql = 'DELETE FROM tbl_visa_processing_meta WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedAt($value){
		$sql = 'DELETE FROM tbl_visa_processing_meta WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletedAt($value){
		$sql = 'DELETE FROM tbl_visa_processing_meta WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblVisaProcessingMetaMySql 
	 */
	protected function readRow($row){
		$tblVisaProcessingMeta = new TblVisaProcessingMeta();
		
		$tblVisaProcessingMeta->id = $row['id'];
		$tblVisaProcessingMeta->tblVisaProcessingId = $row['tbl_visa_processing_id'];
		$tblVisaProcessingMeta->passengerName = $row['passenger_name'];
		$tblVisaProcessingMeta->age = $row['age'];
		$tblVisaProcessingMeta->createdAt = $row['created_at'];
		$tblVisaProcessingMeta->updatedAt = $row['updated_at'];
		$tblVisaProcessingMeta->deletedAt = $row['deleted_at'];

		return $tblVisaProcessingMeta;
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
	 * @return TblVisaProcessingMetaMySql 
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