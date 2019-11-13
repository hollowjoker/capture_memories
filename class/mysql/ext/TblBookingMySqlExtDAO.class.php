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
			(booking.departing_at <= '".$params['departing']."' &&
			booking.returning_at >= '".$params['departing']."') &&
			booking.tbl_tour_package_meta_id = ".$params['metaId']."
		";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
}
?>