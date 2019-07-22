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
	 * @return TblAirlineTicketResMetaDAO
	 */
	public static function getTblAirlineTicketResMetaDAO(){
		return new TblAirlineTicketResMetaMySqlExtDAO();
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
	 * @return TblTravelInsuranceMetaDAO
	 */
	public static function getTblTravelInsuranceMetaDAO(){
		return new TblTravelInsuranceMetaMySqlExtDAO();
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
	 * @return TblVisaProcessingMetaDAO
	 */
	public static function getTblVisaProcessingMetaDAO(){
		return new TblVisaProcessingMetaMySqlExtDAO();
	}

	/**
	 * @return TblWifiRentalDAO
	 */
	public static function getTblWifiRentalDAO(){
		return new TblWifiRentalMySqlExtDAO();
	}


}
?>