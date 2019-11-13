<?php
/**
 * Class that operate on table 'tbl_convo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblConvoMySqlExtDAO extends TblConvoMySqlDAO{

	public function getConvo($convoId) {
		$sql = "
			select
			convo.id,
			booking.departing_at,
			booking.returning_at,
			booking.status,
			booking.id booking_id,
			user.first_name,
			user.last_name,
			user.id user_id,
			tour.name,
			tour.image_public_path,
			tour.description,
			tourMeta.price,
			tourMeta.quantity

			from tbl_convo as convo
			inner join tbl_booking as booking
			on convo.tbl_booking_id = booking.id

			inner join tbl_tour_package_meta as tourMeta
			on booking.tbl_tour_package_meta_id = tourMeta.id

			inner join tbl_tour_package as tour
			on tourMeta.tbl_tour_package_id = tour.id

			inner join tbl_user as user
			on booking.tbl_user_id = user.id

			where convo.id = ".$convoId."
		";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}

	public function getCompleteConvos() {
		$sql = "
			select
			convo.id,
			convo.updated_at,
			convo.status convo_status,
			user.last_name,
			user.first_name,
			booking.departing_at,
			booking.returning_at,
			booking.status,
			booking.id booking_id,
			tour.name tour_name,
			place.type,
			place.name destination_name

			from tbl_convo as convo
			inner join tbl_booking as booking
			on convo.tbl_booking_id = booking.id
			
			inner join tbl_tour_package_meta as tourMeta
			on booking.tbl_tour_package_meta_id = tourMeta.id

			inner join tbl_tour_package as tour
			on tourMeta.tbl_tour_package_id = tour.id

			inner join tbl_place as place
			on tour.place_id = place.id

			inner join tbl_user as user
			on booking.tbl_user_id = user.id

			order by convo.updated_at desc
		";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}

	public function fetchConvoByStatus($status) {
		$sql = "
			select
			count(id)

			from tbl_convo
			where status = '".$status."'
		";

		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
}
?>