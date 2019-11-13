<?php
/**
 * Class that operate on table 'tbl_services_message'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-07-26 19:52
 */
class TblServicesMessageMySqlExtDAO extends TblServicesMessageMySqlDAO{

	public function getMessageByService($option) {
		$sql = "
			select 
			message.description,
			message.created_at,
			user.type,
			user.first_name,
			user.last_name,
			message.updated_at

			from tbl_services_message message
			inner join tbl_services as service
			on message.tbl_services_id = service.id

			inner join tbl_user as user
			on message.tbl_sender_id = user.id
			
			where service.id = ".$option['serviceId']
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

	public function fetchConvoByStatus() {
		$sql = "
			select
			count(id)

			from tbl_services_message
			where created_at = updated_at
		";

		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}

	public function updateMessageOpen($id) {
		$sql = "
			update tbl_services_message set updated_at = '".date('Y-m-d')."' where tbl_services_id = ".$id."
		";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
}
?>