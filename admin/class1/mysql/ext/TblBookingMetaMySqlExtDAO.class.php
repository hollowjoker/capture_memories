<?php
/**
 * Class that operate on table 'tbl_booking_meta'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-07-21 22:58
 */
class TblBookingMetaMySqlExtDAO extends TblBookingMetaMySqlDAO{

	public function getMetaByBooking($option) {
		$sql = "select * from tbl_booking_meta where tbl_booking_id = ".$option['bookingId'];
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