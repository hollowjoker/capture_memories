<?php
/**
 * Class that operate on table 'tbl_place'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblPlaceMySqlExtDAO extends TblPlaceMySqlDAO{

	public function getPlace($option) {
		$sql = "
			select
			*
			from tbl_place

			where status = 'active' && deleted_at = '0000-00-00 00:00:00'
		";
		if(isset($option['where'])) {
			$sql .= " && ".$option['where']['column']." = '".$option['where']['value']."'";
		}

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