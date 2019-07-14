<?php
/**
 * Class that operate on table 'tbl_tour_package_meta'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblTourPackageMetaMySqlExtDAO extends TblTourPackageMetaMySqlDAO{

	public function getTourMeta($tourId, $option) {
		$sql = "select * from tbl_tour_package_meta where tbl_tour_package_id = ".$tourId;
		if(isset($option['orderBy'])) {
			$sql .=" order by '".$option['column']."' ".$option['orderBy'];
		}
		if(isset($option['limit'])) {
			$sql .=" limit ".$option['limit'];
		}
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
}
?>