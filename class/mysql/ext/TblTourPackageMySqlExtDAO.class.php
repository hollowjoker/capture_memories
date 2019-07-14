<?php
/**
 * Class that operate on table 'tbl_tour_package'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblTourPackageMySqlExtDAO extends TblTourPackageMySqlDAO{

	public function getTourPlaceByType($tourType) {
		$sql = "
			select
			tour.id,
			tour.name,
			tour.image_public_path,
			place.name destination_name

			from tbl_tour_package as tour
			inner join tbl_place as place
			on tour.place_id = place.id

			where
			tour.status = 'active' &&
			place.type = '".$tourType."'
		";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}	
}
?>