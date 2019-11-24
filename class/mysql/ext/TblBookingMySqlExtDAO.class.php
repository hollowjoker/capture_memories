<?php
/**
 * Class that operate on table 'tbl_booking'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblBookingMySqlExtDAO extends TblBookingMySqlDAO{

	public function tourChecker($params) {
		$sql = "
			select
			meta.quantity
			from tbl_booking as booking
			inner join tbl_tour_package_meta as meta
			on booking.tbl_tour_package_meta_id = meta.id

			where
			booking.tbl_tour_package_meta_id = ".$params['metaId']."
		";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}

	public function fetchBookingCounter($userId) {
		$sql = "
			select
			(select m1.tbl_receiver_id from tbl_message as m1 where m1.tbl_convo_id = convo.id order by m1.created_at desc limit 1) receiver,
			booking.id

			from tbl_booking as booking
			inner join tbl_convo as convo
			on booking.id = convo.tbl_booking_id
			where booking.tbl_user_id = ".$userId."
			group by convo.id
		";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
}
?>