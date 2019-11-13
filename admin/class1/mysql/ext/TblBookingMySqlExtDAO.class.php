<?php
/**
 * Class that operate on table 'tbl_booking'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblBookingMySqlExtDAO extends TblBookingMySqlDAO{

	
	public function fetchBookingWithStatus($status) {
		$sql = "
			select
			user.first_name,
			user.last_name,
			booking.departing_at,
			booking.returning_at,
			tourMeta.price,
			tour.name

			from tbl_booking as booking
			inner join tbl_user as user
			on booking.tbl_user_id = user.id

			inner join tbl_tour_package_meta as tourMeta
			on booking.tbl_tour_package_meta_id = tourMeta.id

			inner join tbl_tour_package as tour
			on tour.id = tourMeta.tbl_tour_package_id

			where booking.status = 'approved' 
		";
		if($status == "ongoing") {
			$sql .= " && booking.returning_at >= '".date("Y-m-d")."'";
		} else {
			$sql .= " && booking.returning_at < '".date("Y-m-d")."'";
		}
		$sql .= " order by booking.returning_at desc";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
}
?>