<?php
/**
 * Class that operate on table 'tbl_user'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblUserMySqlExtDAO extends TblUserMySqlDAO{

	public function queryByEmailWhereActive($email) {
		$sql = "
			select * from tbl_user where email = '".$email."' && type = 'user' && active = 'active' && deleted_at = '0000-00-00 00:00:00' 
		";
		$sqLQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqLQuery);
	}

	public function getAdmin($option) {
		$sql = "select * from tbl_user where type = 'admin'";

		if(isset($option['orderBy'])) {
			$sql .=" order by ".$option['column']." ".$option['orderBy'];
		}
		if(isset($option['limit'])) {
			$sql .=" limit ".$option['limit'];
		}

		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
}
?>