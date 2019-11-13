<?php
/**
 * Class that operate on table 'tbl_tour_package_meta'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-25 16:29
 */
class TblTourPackageMetaMySqlExtDAO extends TblTourPackageMetaMySqlDAO{

	public function getTourMeta($tourId, $option) {
		$sql = "select * from tbl_tour_package_meta where tbl_tour_package_id = ".$tourId;
		if(isset($option['orderBy'])) {
			$sql .=" order by ".$option['column']." ".$option['orderBy'];
		}
		if(isset($option['limit'])) {
			$sql .=" limit ".$option['limit'];
		}
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}

	public function fetchTour($metaId) {
		$sql = "
			select
			tour.tour_limit

			from tbl_tour_package_meta as meta
			inner join tbl_tour_package as tour
			on meta.tbl_tour_package_id = tour.id

			where meta.id = ".$metaId."
		";

		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
}
?>