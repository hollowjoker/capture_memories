<?php
/**
 * Class that operate on table 'tbl_message'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblMessageMySqlExtDAO extends TblMessageMySqlDAO{

	public function getMessageByConvo($option) {
		$sql = "select * from tbl_message where tbl_convo_id = ".$option['convoId'];
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