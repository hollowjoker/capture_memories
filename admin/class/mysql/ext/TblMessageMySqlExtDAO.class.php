<?php
/**
 * Class that operate on table 'tbl_message'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblMessageMySqlExtDAO extends TblMessageMySqlDAO{

	public function getMessageByConvo($option) {
		$sql = "
			select 
			message.description,
			message.created_at,
			user.type,
			user.first_name,
			user.last_name

			from tbl_message message
			inner join tbl_convo as convo
			on message.tbl_convo_id = convo.id

			inner join tbl_user as user
			on message.tbl_sender_id = user.id
			
			where convo.id = ".$option['id']
		;
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