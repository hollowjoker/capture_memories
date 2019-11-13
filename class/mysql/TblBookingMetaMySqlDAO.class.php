<?php
/**
 * Class that operate on table 'tbl_booking_meta'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-11-13 09:17
 */
class TblBookingMetaMySqlDAO implements TblBookingMetaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblBookingMetaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_booking_meta WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_booking_meta';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_booking_meta ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblBookingMeta primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_booking_meta WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblBookingMetaMySql tblBookingMeta
 	 */
	public function insert($tblBookingMeta){
		$sql = 'INSERT INTO tbl_booking_meta (tbl_booking_id, companion_name, age, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblBookingMeta->tblBookingId);
		$sqlQuery->set($tblBookingMeta->companionName);
		$sqlQuery->set($tblBookingMeta->age);
		$sqlQuery->set($tblBookingMeta->createdAt);
		$sqlQuery->set($tblBookingMeta->updatedAt);
		$sqlQuery->set($tblBookingMeta->deletedAt);

		$id = $this->executeInsert($sqlQuery);	
		$tblBookingMeta->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblBookingMetaMySql tblBookingMeta
 	 */
	public function update($tblBookingMeta){
		$sql = 'UPDATE tbl_booking_meta SET tbl_booking_id = ?, companion_name = ?, age = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblBookingMeta->tblBookingId);
		$sqlQuery->set($tblBookingMeta->companionName);
		$sqlQuery->set($tblBookingMeta->age);
		$sqlQuery->set($tblBookingMeta->createdAt);
		$sqlQuery->set($tblBookingMeta->updatedAt);
		$sqlQuery->set($tblBookingMeta->deletedAt);

		$sqlQuery->setNumber($tblBookingMeta->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_booking_meta';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTblBookingId($value){
		$sql = 'SELECT * FROM tbl_booking_meta WHERE tbl_booking_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCompanionName($value){
		$sql = 'SELECT * FROM tbl_booking_meta WHERE companion_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAge($value){
		$sql = 'SELECT * FROM tbl_booking_meta WHERE age = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedAt($value){
		$sql = 'SELECT * FROM tbl_booking_meta WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedAt($value){
		$sql = 'SELECT * FROM tbl_booking_meta WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeletedAt($value){
		$sql = 'SELECT * FROM tbl_booking_meta WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTblBookingId($value){
		$sql = 'DELETE FROM tbl_booking_meta WHERE tbl_booking_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCompanionName($value){
		$sql = 'DELETE FROM tbl_booking_meta WHERE companion_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAge($value){
		$sql = 'DELETE FROM tbl_booking_meta WHERE age = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedAt($value){
		$sql = 'DELETE FROM tbl_booking_meta WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedAt($value){
		$sql = 'DELETE FROM tbl_booking_meta WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletedAt($value){
		$sql = 'DELETE FROM tbl_booking_meta WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblBookingMetaMySql 
	 */
	protected function readRow($row){
		$tblBookingMeta = new TblBookingMeta();
		
		$tblBookingMeta->id = $row['id'];
		$tblBookingMeta->tblBookingId = $row['tbl_booking_id'];
		$tblBookingMeta->companionName = $row['companion_name'];
		$tblBookingMeta->age = $row['age'];
		$tblBookingMeta->createdAt = $row['created_at'];
		$tblBookingMeta->updatedAt = $row['updated_at'];
		$tblBookingMeta->deletedAt = $row['deleted_at'];

		return $tblBookingMeta;
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
	 * @return TblBookingMetaMySql 
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