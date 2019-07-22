<?php
/**
 * Class that operate on table 'tbl_tour_package_meta'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-07-21 22:58
 */
class TblTourPackageMetaMySqlDAO implements TblTourPackageMetaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblTourPackageMetaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_tour_package_meta WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_tour_package_meta';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_tour_package_meta ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblTourPackageMeta primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_tour_package_meta WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblTourPackageMetaMySql tblTourPackageMeta
 	 */
	public function insert($tblTourPackageMeta){
		$sql = 'INSERT INTO tbl_tour_package_meta (tbl_tour_package_id, quantity, price, status, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblTourPackageMeta->tblTourPackageId);
		$sqlQuery->set($tblTourPackageMeta->quantity);
		$sqlQuery->setNumber($tblTourPackageMeta->price);
		$sqlQuery->set($tblTourPackageMeta->status);
		$sqlQuery->set($tblTourPackageMeta->createdAt);
		$sqlQuery->set($tblTourPackageMeta->updatedAt);
		$sqlQuery->set($tblTourPackageMeta->deletedAt);

		$id = $this->executeInsert($sqlQuery);	
		$tblTourPackageMeta->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblTourPackageMetaMySql tblTourPackageMeta
 	 */
	public function update($tblTourPackageMeta){
		$sql = 'UPDATE tbl_tour_package_meta SET tbl_tour_package_id = ?, quantity = ?, price = ?, status = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblTourPackageMeta->tblTourPackageId);
		$sqlQuery->set($tblTourPackageMeta->quantity);
		$sqlQuery->setNumber($tblTourPackageMeta->price);
		$sqlQuery->set($tblTourPackageMeta->status);
		$sqlQuery->set($tblTourPackageMeta->createdAt);
		$sqlQuery->set($tblTourPackageMeta->updatedAt);
		$sqlQuery->set($tblTourPackageMeta->deletedAt);

		$sqlQuery->setNumber($tblTourPackageMeta->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_tour_package_meta';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTblTourPackageId($value){
		$sql = 'SELECT * FROM tbl_tour_package_meta WHERE tbl_tour_package_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuantity($value){
		$sql = 'SELECT * FROM tbl_tour_package_meta WHERE quantity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrice($value){
		$sql = 'SELECT * FROM tbl_tour_package_meta WHERE price = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tbl_tour_package_meta WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedAt($value){
		$sql = 'SELECT * FROM tbl_tour_package_meta WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedAt($value){
		$sql = 'SELECT * FROM tbl_tour_package_meta WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeletedAt($value){
		$sql = 'SELECT * FROM tbl_tour_package_meta WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTblTourPackageId($value){
		$sql = 'DELETE FROM tbl_tour_package_meta WHERE tbl_tour_package_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuantity($value){
		$sql = 'DELETE FROM tbl_tour_package_meta WHERE quantity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrice($value){
		$sql = 'DELETE FROM tbl_tour_package_meta WHERE price = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tbl_tour_package_meta WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedAt($value){
		$sql = 'DELETE FROM tbl_tour_package_meta WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedAt($value){
		$sql = 'DELETE FROM tbl_tour_package_meta WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletedAt($value){
		$sql = 'DELETE FROM tbl_tour_package_meta WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblTourPackageMetaMySql 
	 */
	protected function readRow($row){
		$tblTourPackageMeta = new TblTourPackageMeta();
		
		$tblTourPackageMeta->id = $row['id'];
		$tblTourPackageMeta->tblTourPackageId = $row['tbl_tour_package_id'];
		$tblTourPackageMeta->quantity = $row['quantity'];
		$tblTourPackageMeta->price = $row['price'];
		$tblTourPackageMeta->status = $row['status'];
		$tblTourPackageMeta->createdAt = $row['created_at'];
		$tblTourPackageMeta->updatedAt = $row['updated_at'];
		$tblTourPackageMeta->deletedAt = $row['deleted_at'];

		return $tblTourPackageMeta;
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
	 * @return TblTourPackageMetaMySql 
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