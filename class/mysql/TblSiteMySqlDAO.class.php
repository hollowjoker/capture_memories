<?php
/**
 * Class that operate on table 'tbl_site'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-07-26 08:38
 */
class TblSiteMySqlDAO implements TblSiteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblSiteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_site WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_site';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_site ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblSite primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_site WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblSiteMySql tblSite
 	 */
	public function insert($tblSite){
		$sql = 'INSERT INTO tbl_site (name, logo_path, invoice_header, invoice_footer, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tblSite->name);
		$sqlQuery->set($tblSite->logoPath);
		$sqlQuery->set($tblSite->invoiceHeader);
		$sqlQuery->set($tblSite->invoiceFooter);
		$sqlQuery->set($tblSite->createdAt);
		$sqlQuery->set($tblSite->updatedAt);
		$sqlQuery->set($tblSite->deletedAt);

		$id = $this->executeInsert($sqlQuery);	
		$tblSite->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblSiteMySql tblSite
 	 */
	public function update($tblSite){
		$sql = 'UPDATE tbl_site SET name = ?, logo_path = ?, invoice_header = ?, invoice_footer = ?, created_at = ?, updated_at = ?, deleted_at = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tblSite->name);
		$sqlQuery->set($tblSite->logoPath);
		$sqlQuery->set($tblSite->invoiceHeader);
		$sqlQuery->set($tblSite->invoiceFooter);
		$sqlQuery->set($tblSite->createdAt);
		$sqlQuery->set($tblSite->updatedAt);
		$sqlQuery->set($tblSite->deletedAt);

		$sqlQuery->setNumber($tblSite->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_site';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM tbl_site WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLogoPath($value){
		$sql = 'SELECT * FROM tbl_site WHERE logo_path = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByInvoiceHeader($value){
		$sql = 'SELECT * FROM tbl_site WHERE invoice_header = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByInvoiceFooter($value){
		$sql = 'SELECT * FROM tbl_site WHERE invoice_footer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedAt($value){
		$sql = 'SELECT * FROM tbl_site WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedAt($value){
		$sql = 'SELECT * FROM tbl_site WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeletedAt($value){
		$sql = 'SELECT * FROM tbl_site WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM tbl_site WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogoPath($value){
		$sql = 'DELETE FROM tbl_site WHERE logo_path = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByInvoiceHeader($value){
		$sql = 'DELETE FROM tbl_site WHERE invoice_header = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByInvoiceFooter($value){
		$sql = 'DELETE FROM tbl_site WHERE invoice_footer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedAt($value){
		$sql = 'DELETE FROM tbl_site WHERE created_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedAt($value){
		$sql = 'DELETE FROM tbl_site WHERE updated_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletedAt($value){
		$sql = 'DELETE FROM tbl_site WHERE deleted_at = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblSiteMySql 
	 */
	protected function readRow($row){
		$tblSite = new TblSite();
		
		$tblSite->id = $row['id'];
		$tblSite->name = $row['name'];
		$tblSite->logoPath = $row['logo_path'];
		$tblSite->invoiceHeader = $row['invoice_header'];
		$tblSite->invoiceFooter = $row['invoice_footer'];
		$tblSite->createdAt = $row['created_at'];
		$tblSite->updatedAt = $row['updated_at'];
		$tblSite->deletedAt = $row['deleted_at'];

		return $tblSite;
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
	 * @return TblSiteMySql 
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