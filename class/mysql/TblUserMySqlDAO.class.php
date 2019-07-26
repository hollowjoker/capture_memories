<?php
/**
 * Class that operate on table 'tbl_user'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-07-26 08:38
 */
class TblUserMySqlDAO implements TblUserDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblUserMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_user WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_user';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_user ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblUser primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_user WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblUserMySql tblUser
 	 */
	public function insert($tblUser){
		$sql = 'INSERT INTO tbl_user (first_name, last_name, email, password, phone, birth_date, address, about, type, active, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tblUser->firstName);
		$sqlQuery->set($tblUser->lastName);
		$sqlQuery->set($tblUser->email);
		$sqlQuery->set($tblUser->password);
		$sqlQuery->set($tblUser->phone);
		$sqlQuery->set($tblUser->birthDate);
		$sqlQuery->set($tblUser->address);
		$sqlQuery->set($tblUser->about);
		$sqlQuery->set($tblUser->type);
		$sqlQuery->set($tblUser->active);
		$sqlQuery->set($tblUser->createdAt);
		$sqlQuery->set($tblUser->updatedAt);
		$sqlQuery->set($tblUser->deletedAt);

		$id = $this->executeInsert($sqlQuery);	
		$tblUser->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblUserMySql tblUser
 	 */
	public function update($tblUser){
		$sql = 'UPDATE tbl_user SET first_name = ?, last_name = ?, email = ?, password = ?, phone = ?, birth_date = ?, address = ?, about = ?, type = ?, active = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tblUser->firstName);
		$sqlQuery->set($tblUser->lastName);
		$sqlQuery->set($tblUser->email);
		$sqlQuery->set($tblUser->password);
		$sqlQuery->set($tblUser->phone);
		$sqlQuery->set($tblUser->birthDate);
		$sqlQuery->set($tblUser->address);
		$sqlQuery->set($tblUser->about);
		$sqlQuery->set($tblUser->type);
		$sqlQuery->set($tblUser->active);
		$sqlQuery->set($tblUser->createdAt);
		$sqlQuery->set($tblUser->updatedAt);
		$sqlQuery->set($tblUser->deletedAt);

		$sqlQuery->setNumber($tblUser->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_user';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByFirstName($value){
		$sql = 'SELECT * FROM tbl_user WHERE first_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLastName($value){
		$sql = 'SELECT * FROM tbl_user WHERE last_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM tbl_user WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassword($value){
		$sql = 'SELECT * FROM tbl_user WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPhone($value){
		$sql = 'SELECT * FROM tbl_user WHERE phone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBirthDate($value){
		$sql = 'SELECT * FROM tbl_user WHERE birth_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAddress($value){
		$sql = 'SELECT * FROM tbl_user WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAbout($value){
		$sql = 'SELECT * FROM tbl_user WHERE about = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByType($value){
		$sql = 'SELECT * FROM tbl_user WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByActive($value){
		$sql = 'SELECT * FROM tbl_user WHERE active = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedAt($value){
		$sql = 'SELECT * FROM tbl_user WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedAt($value){
		$sql = 'SELECT * FROM tbl_user WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeletedAt($value){
		$sql = 'SELECT * FROM tbl_user WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByFirstName($value){
		$sql = 'DELETE FROM tbl_user WHERE first_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLastName($value){
		$sql = 'DELETE FROM tbl_user WHERE last_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM tbl_user WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassword($value){
		$sql = 'DELETE FROM tbl_user WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPhone($value){
		$sql = 'DELETE FROM tbl_user WHERE phone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBirthDate($value){
		$sql = 'DELETE FROM tbl_user WHERE birth_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAddress($value){
		$sql = 'DELETE FROM tbl_user WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAbout($value){
		$sql = 'DELETE FROM tbl_user WHERE about = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByType($value){
		$sql = 'DELETE FROM tbl_user WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByActive($value){
		$sql = 'DELETE FROM tbl_user WHERE active = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedAt($value){
		$sql = 'DELETE FROM tbl_user WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedAt($value){
		$sql = 'DELETE FROM tbl_user WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletedAt($value){
		$sql = 'DELETE FROM tbl_user WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblUserMySql 
	 */
	protected function readRow($row){
		$tblUser = new TblUser();
		
		$tblUser->id = $row['id'];
		$tblUser->firstName = $row['first_name'];
		$tblUser->lastName = $row['last_name'];
		$tblUser->email = $row['email'];
		$tblUser->password = $row['password'];
		$tblUser->phone = $row['phone'];
		$tblUser->birthDate = $row['birth_date'];
		$tblUser->address = $row['address'];
		$tblUser->about = $row['about'];
		$tblUser->type = $row['type'];
		$tblUser->active = $row['active'];
		$tblUser->createdAt = $row['created_at'];
		$tblUser->updatedAt = $row['updated_at'];
		$tblUser->deletedAt = $row['deleted_at'];

		return $tblUser;
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
	 * @return TblUserMySql 
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