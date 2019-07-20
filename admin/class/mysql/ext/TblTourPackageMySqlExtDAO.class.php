<?php
/**
 * Class that operate on table 'tbl_tour_package'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblTourPackageMySqlExtDAO extends TblTourPackageMySqlDAO{

	
	public function getTourPlaceData() {
		$sql = "
			select
			tour.id,
			tour.name tour_name,
			tour.travel_period_from_at,
			tour.travel_period_to_at,
			tour.selling_period,
			tour.status,
			tour.image_path,
			tour.image_public_path,
			place.name place_name,
			place.type

			from tbl_tour_package as tour
			inner join tbl_place as place
			on tour.place_id = place.id

			where tour.status = 'active' &&
			tour.deleted_at = '0000-00-00 00:00:00'
		";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
}
?>