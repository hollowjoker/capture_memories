<?php
/**
 * Class that operate on table 'tbl_message'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-11-14 06:33
 */
class TblMessageMySqlDAO implements TblMessageDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblMessageMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_message WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_message';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_message ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblMessage primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_message WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblMessageMySql tblMessage
 	 */
	public function insert($tblMessage){
		$sql = 'INSERT INTO tbl_message (tbl_convo_id, tbl_sender_id, tbl_receiver_id, description, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblMessage->tblConvoId);
		$sqlQuery->setNumber($tblMessage->tblSenderId);
		$sqlQuery->setNumber($tblMessage->tblReceiverId);
		$sqlQuery->set($tblMessage->description);
		$sqlQuery->set($tblMessage->createdAt);
		$sqlQuery->set($tblMessage->updatedAt);
		$sqlQuery->set($tblMessage->deletedAt);

		$id = $this->executeInsert($sqlQuery);	
		$tblMessage->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblMessageMySql tblMessage
 	 */
	public function update($tblMessage){
		$sql = 'UPDATE tbl_message SET tbl_convo_id = ?, tbl_sender_id = ?, tbl_receiver_id = ?, description = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblMessage->tblConvoId);
		$sqlQuery->setNumber($tblMessage->tblSenderId);
		$sqlQuery->setNumber($tblMessage->tblReceiverId);
		$sqlQuery->set($tblMessage->description);
		$sqlQuery->set($tblMessage->createdAt);
		$sqlQuery->set($tblMessage->updatedAt);
		$sqlQuery->set($tblMessage->deletedAt);

		$sqlQuery->setNumber($tblMessage->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_message';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTblConvoId($value){
		$sql = 'SELECT * FROM tbl_message WHERE tbl_convo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTblSenderId($value){
		$sql = 'SELECT * FROM tbl_message WHERE tbl_sender_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTblReceiverId($value){
		$sql = 'SELECT * FROM tbl_message WHERE tbl_receiver_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM tbl_message WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedAt($value){
		$sql = 'SELECT * FROM tbl_message WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedAt($value){
		$sql = 'SELECT * FROM tbl_message WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeletedAt($value){
		$sql = 'SELECT * FROM tbl_message WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTblConvoId($value){
		$sql = 'DELETE FROM tbl_message WHERE tbl_convo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTblSenderId($value){
		$sql = 'DELETE FROM tbl_message WHERE tbl_sender_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTblReceiverId($value){
		$sql = 'DELETE FROM tbl_message WHERE tbl_receiver_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM tbl_message WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedAt($value){
		$sql = 'DELETE FROM tbl_message WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedAt($value){
		$sql = 'DELETE FROM tbl_message WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletedAt($value){
		$sql = 'DELETE FROM tbl_message WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblMessageMySql 
	 */
	protected function readRow($row){
		$tblMessage = new TblMessage();
		
		$tblMessage->id = $row['id'];
		$tblMessage->tblConvoId = $row['tbl_convo_id'];
		$tblMessage->tblSenderId = $row['tbl_sender_id'];
		$tblMessage->tblReceiverId = $row['tbl_receiver_id'];
		$tblMessage->description = $row['description'];
		$tblMessage->createdAt = $row['created_at'];
		$tblMessage->updatedAt = $row['updated_at'];
		$tblMessage->deletedAt = $row['deleted_at'];

		return $tblMessage;
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
	 * @return TblMessageMySql 
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