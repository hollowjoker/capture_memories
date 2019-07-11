<?php
/**
 * Class that operate on table 'tbl_place'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblPlaceMySqlExtDAO extends TblPlaceMySqlDAO{

	public function getPlaceByAvailability($availability) {
		$sql = "select * from tbl_place where ".$availability." = 'yes'";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
	
}
?>