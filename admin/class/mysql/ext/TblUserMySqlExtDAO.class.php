<?php
/**
 * Class that operate on table 'tbl_user'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblUserMySqlExtDAO extends TblUserMySqlDAO{

	function queryByEmailFilterType($email) {
		$sql = "SELECT * FROM tbl_user where email = '".$email."' AND type = 'admin' AND active = 'active'";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}

	public function fetchTotalCustomers() {
		$sql = "select count(id) from tbl_user where type = 'user'";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
}
?>