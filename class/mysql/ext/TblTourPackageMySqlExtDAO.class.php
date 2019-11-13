<?php
/**
 * Class that operate on table 'tbl_tour_package'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblTourPackageMySqlExtDAO extends TblTourPackageMySqlDAO{

	public function getTourPlaceByType($tourType, $option) {
		$search = isset($_GET['search']) ? $_GET['search'] : '';
		$travelPeriodFrom = isset($_GET['traveled_period_from_at']) && $_GET['traveled_period_from_at'] != "" ? date('Y-m-d', strtotime($_GET['traveled_period_from_at'])) : ''; 
		$travelPeriodTo = isset($_GET['traveled_period_to_at']) && $_GET['traveled_period_to_at'] != "" ? date('Y-m-d', strtotime($_GET['traveled_period_to_at'])) : ''; 

		$sql = "
			select
			tour.id,
			tour.name,
			tour.travel_period_from_at,
			tour.travel_period_to_at,
			tour.image_public_path,
			tour.description,
			place.name destination_name,
			tour.tour_limit

			from tbl_tour_package as tour
			inner join tbl_place as place
			on tour.place_id = place.id

			where
			tour.status = 'active' && 
			tour.deleted_at = '0000-00-00 00:00:00' &&
			tour.travel_period_to_at >= '".date('Y-m-d')."'
		";

		if(isset($_GET['search'])) {
			$sql .= "
				&& (
					tour.name like '%".$search."%' ||
					place.name like '%".$search."%'
				)
			";
		}

		if($travelPeriodFrom != "" ) {
			$sql .= "
				&& tour.travel_period_from_at <= '".$travelPeriodFrom."' 
			";
		}
		if($travelPeriodTo != "" ) {
			$sql .= "
				&& tour.travel_period_to_at >= '".$travelPeriodTo."' 
			";
		}

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