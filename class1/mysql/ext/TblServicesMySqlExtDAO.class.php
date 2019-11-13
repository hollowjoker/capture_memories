<?php
/**
 * Class that operate on table 'tbl_services'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblServicesMySqlExtDAO extends TblServicesMySqlDAO{

	public function getServices($userId, $type) {

		$sql = "
			select
			service.id,
			service.type,
		";

		if($type == 'wifi') {
			$sql .= "
				item.destination,
				item.status,
				item.traveled_from_at,
				item.traveled_to_at
				
				from tbl_services as service
				inner join tbl_wifi_rental as item
				on service.tbl_service_id = item.id
			";
		}
		if($type == 'airline') {
			$sql .= "
				item.status,
				item.type sub_type
				
				from tbl_services as service
				inner join tbl_airline_ticket_res as item
				on service.tbl_service_id = item.id
			";
		}
		if($type == 'visa') {
			$sql .= "
				item.status,
				item.traveled_from_at,
				item.traveled_to_at
				
				from tbl_services as service
				inner join tbl_visa_processing as item
				on service.tbl_service_id = item.id
			";
		}
		if($type == 'travel') {
			$sql .= "
				item.status
				
				from tbl_services as service
				inner join tbl_travel_insurance as item
				on service.tbl_service_id = item.id
			";
		}

		$sql .= " 
			where 
			service.tbl_user_id = ".$userId." && 
			service.type='".$type."'

			order by service.updated_at desc
		";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}

	public function getSingleService($id, $type) {

		
		$sql = "
			select
			service.id,
			service.type,
			service.updated_at,
			user.first_name,
			user.last_name,
		";

		if($type == 'wifi') {
			$sql .= "
				item.passenger_name,
				item.destination,
				item.status,
				item.traveled_from_at,
				item.traveled_to_at
				
				from tbl_services as service
				inner join tbl_wifi_rental as item
				on service.tbl_service_id = item.id
			";
		}
		if($type == 'airline') {
			$sql .= "
				item.status,
				item.passenger_name,
				item.birth_date,
				item.age,
				item.passport_no,
				item.expiry_date,
				item.type sub_type
				
				from tbl_services as service
				inner join tbl_airline_ticket_res as item
				on service.tbl_service_id = item.id
			";
		}
		if($type == 'visa') {
			$sql .= "
				item.status,
				item.passenger_name,
				item.age,
				item.traveled_from_at,
				item.traveled_to_at
				
				from tbl_services as service
				inner join tbl_visa_processing as item
				on service.tbl_service_id = item.id
			";
		}
		if($type == 'travel') {
			$sql .= "
				item.status,
				item.passenger_name,
				item.age,
				item.birth_date
				
				from tbl_services as service
				inner join tbl_travel_insurance as item
				on service.tbl_service_id = item.id
			";
		}
		

		$sql .= "
			inner join tbl_user as user
			on service.tbl_user_id = user.id
			where service.id = ".$id."
		";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);

	}
}
?>