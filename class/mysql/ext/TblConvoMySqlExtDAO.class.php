<?php
/**
 * Class that operate on table 'tbl_convo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblConvoMySqlExtDAO extends TblConvoMySqlDAO{

	public function getConvo($userId) {
		$sql = "
			select
			convo.id,
			convo.tbl_user_id user_id,
			booking.departing_at,
			booking.returning_at,
			booking.status,
			place.name destination_name,
			tour.image_public_path

			from tbl_convo as convo
			inner join tbl_booking as booking
			on convo.tbl_booking_id = booking.id
			
			inner join tbl_tour_package_meta as tourMeta
			on booking.tbl_tour_package_meta_id = tourMeta.id

			inner join tbl_tour_package as tour
			on tourMeta.tbl_tour_package_id = tour.id

			inner join tbl_place as place
			on tour.place_id = place.id

			where booking.tbl_user_id = ".$userId."
			order by convo.updated_at desc
		";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}

	public function getConvoById($convoId) {
		$sql = "
			select
			convo.id,
			booking.departing_at,
			booking.returning_at,
			booking.created_at,
			booking.status,
			booking.transaction_no,
			booking.id booking_id,
			tour.name,
			tour.image_public_path,
			tour.description,
			tourMeta.price,
			tourMeta.quantity,
			tour.downpayment_duration

			from tbl_convo as convo
			inner join tbl_booking as booking
			on convo.tbl_booking_id = booking.id

			inner join tbl_tour_package_meta as tourMeta
			on booking.tbl_tour_package_meta_id = tourMeta.id

			inner join tbl_tour_package as tour
			on tourMeta.tbl_tour_package_id = tour.id

			where convo.id = ".$convoId."
		";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
}
?>