<?php
/**
 * Class that operate on table 'tbl_services_message'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-07-26 21:16
 */
class TblServicesMessageMySqlDAO implements TblServicesMessageDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblServicesMessageMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_services_message WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_services_message';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_services_message ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblServicesMessage primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_services_message WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblServicesMessageMySql tblServicesMessage
 	 */
	public function insert($tblServicesMessage){
		$sql = 'INSERT INTO tbl_services_message (tbl_services_id, tbl_sender_id, tbl_receiver_id, description, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblServicesMessage->tblServicesId);
		$sqlQuery->setNumber($tblServicesMessage->tblSenderId);
		$sqlQuery->setNumber($tblServicesMessage->tblReceiverId);
		$sqlQuery->set($tblServicesMessage->description);
		$sqlQuery->set($tblServicesMessage->createdAt);
		$sqlQuery->set($tblServicesMessage->updatedAt);
		$sqlQuery->set($tblServicesMessage->deletedAt);

		$id = $this->executeInsert($sqlQuery);	
		$tblServicesMessage->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblServicesMessageMySql tblServicesMessage
 	 */
	public function update($tblServicesMessage){
		$sql = 'UPDATE tbl_services_message SET tbl_services_id = ?, tbl_sender_id = ?, tbl_receiver_id = ?, description = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblServicesMessage->tblServicesId);
		$sqlQuery->setNumber($tblServicesMessage->tblSenderId);
		$sqlQuery->setNumber($tblServicesMessage->tblReceiverId);
		$sqlQuery->set($tblServicesMessage->description);
		$sqlQuery->set($tblServicesMessage->createdAt);
		$sqlQuery->set($tblServicesMessage->updatedAt);
		$sqlQuery->set($tblServicesMessage->deletedAt);

		$sqlQuery->setNumber($tblServicesMessage->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_services_message';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTblServicesId($value){
		$sql = 'SELECT * FROM tbl_services_message WHERE tbl_services_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTblSenderId($value){
		$sql = 'SELECT * FROM tbl_services_message WHERE tbl_sender_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTblReceiverId($value){
		$sql = 'SELECT * FROM tbl_services_message WHERE tbl_receiver_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM tbl_services_message WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedAt($value){
		$sql = 'SELECT * FROM tbl_services_message WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedAt($value){
		$sql = 'SELECT * FROM tbl_services_message WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeletedAt($value){
		$sql = 'SELECT * FROM tbl_services_message WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTblServicesId($value){
		$sql = 'DELETE FROM tbl_services_message WHERE tbl_services_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTblSenderId($value){
		$sql = 'DELETE FROM tbl_services_message WHERE tbl_sender_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTblReceiverId($value){
		$sql = 'DELETE FROM tbl_services_message WHERE tbl_receiver_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM tbl_services_message WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedAt($value){
		$sql = 'DELETE FROM tbl_services_message WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedAt($value){
		$sql = 'DELETE FROM tbl_services_message WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletedAt($value){
		$sql = 'DELETE FROM tbl_services_message WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblServicesMessageMySql 
	 */
	protected function readRow($row){
		$tblServicesMessage = new TblServicesMessage();
		
		$tblServicesMessage->id = $row['id'];
		$tblServicesMessage->tblServicesId = $row['tbl_services_id'];
		$tblServicesMessage->tblSenderId = $row['tbl_sender_id'];
		$tblServicesMessage->tblReceiverId = $row['tbl_receiver_id'];
		$tblServicesMessage->description = $row['description'];
		$tblServicesMessage->createdAt = $row['created_at'];
		$tblServicesMessage->updatedAt = $row['updated_at'];
		$tblServicesMessage->deletedAt = $row['deleted_at'];

		return $tblServicesMessage;
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
	 * @return TblServicesMessageMySql 
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