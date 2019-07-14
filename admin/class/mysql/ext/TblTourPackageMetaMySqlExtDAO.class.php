<?php
/**
 * Class that operate on table 'tbl_tour_package_meta'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblTourPackageMetaMySqlExtDAO extends TblTourPackageMetaMySqlDAO{

	public function getTourMetaData($id) {
		$sql = "select * from tbl_tour_package_meta where tbl_tour_package_id = ".$id;
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
}
?>