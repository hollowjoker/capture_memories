<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return TblAirlineTicketResDAO
	 */
	public static function getTblAirlineTicketResDAO(){
		return new TblAirlineTicketResMySqlExtDAO();
	}

	/**
	 * @return TblBookingDAO
	 */
	public static function getTblBookingDAO(){
		return new TblBookingMySqlExtDAO();
	}

	/**
	 * @return TblBookingMetaDAO
	 */
	public static function getTblBookingMetaDAO(){
		return new TblBookingMetaMySqlExtDAO();
	}

	/**
	 * @return TblConvoDAO
	 */
	public static function getTblConvoDAO(){
		return new TblConvoMySqlExtDAO();
	}

	/**
	 * @return TblMessageDAO
	 */
	public static function getTblMessageDAO(){
		return new TblMessageMySqlExtDAO();
	}

	/**
	 * @return TblPlaceDAO
	 */
	public static function getTblPlaceDAO(){
		return new TblPlaceMySqlExtDAO();
	}

	/**
	 * @return TblServicesDAO
	 */
	public static function getTblServicesDAO(){
		return new TblServicesMySqlExtDAO();
	}

	/**
	 * @return TblServicesMessageDAO
	 */
	public static function getTblServicesMessageDAO(){
		return new TblServicesMessageMySqlExtDAO();
	}

	/**
	 * @return TblSiteDAO
	 */
	public static function getTblSiteDAO(){
		return new TblSiteMySqlExtDAO();
	}

	/**
	 * @return TblTourPackageDAO
	 */
	public static function getTblTourPackageDAO(){
		return new TblTourPackageMySqlExtDAO();
	}

	/**
	 * @return TblTourPackageImagesDAO
	 */
	public static function getTblTourPackageImagesDAO(){
		return new TblTourPackageImagesMySqlExtDAO();
	}

	/**
	 * @return TblTourPackageMetaDAO
	 */
	public static function getTblTourPackageMetaDAO(){
		return new TblTourPackageMetaMySqlExtDAO();
	}

	/**
	 * @return TblTravelInsuranceDAO
	 */
	public static function getTblTravelInsuranceDAO(){
		return new TblTravelInsuranceMySqlExtDAO();
	}

	/**
	 * @return TblUserDAO
	 */
	public static function getTblUserDAO(){
		return new TblUserMySqlExtDAO();
	}

	/**
	 * @return TblVisaProcessingDAO
	 */
	public static function getTblVisaProcessingDAO(){
		return new TblVisaProcessingMySqlExtDAO();
	}

	/**
	 * @return TblWifiRentalDAO
	 */
	public static function getTblWifiRentalDAO(){
		return new TblWifiRentalMySqlExtDAO();
	}


}
?>