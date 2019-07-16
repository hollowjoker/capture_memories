<?php
/**
 * Class that operate on table 'tbl_tour_package'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblTourPackageMySqlExtDAO extends TblTourPackageMySqlDAO{

	public function getTourPlaceByType($tourType, $option) {
		$sql = "
			select
			tour.id,
			tour.name,
			tour.image_public_path,
			tour.description,
			place.name destination_name

			from tbl_tour_package as tour
			inner join tbl_place as place
			on tour.place_id = place.id

			where
			tour.status = 'active' && 
			tour.deleted_at = '0000-00-00 00:00:00'
		";

		if($tourType != "") {
			$sql .= " && place.type = '".$tourType."' ";
		}

		if(isset($option['id'])) {
			$sql .= " && tour.id = ".$option['id']." ";
		}

		if(isset($option['orderBy'])) {
			$sql .= " order by ".$option['column']." ".$option['orderBy']." ";
		}
		if(isset($option['limit'])) {
			$sql .= " limit ".$option['limit'];
		}
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}	
}
?>