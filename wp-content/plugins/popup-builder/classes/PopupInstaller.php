<?php
class PopupInstaller
{
	public static function createTables($blogsId)
	{
		global $wpdb;
		update_option('SG_POPUP_VERSION', SG_POPUP_VERSION);
		$sgPopupBase = "CREATE TABLE IF NOT EXISTS ". $wpdb->prefix.$blogsId."sg_popup (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`type` varchar(255) NOT NULL,
			`title` varchar(255) NOT NULL,
			`options` text NOT NULL,
			PRIMARY KEY (id)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
		$sgPopupImageBase = "CREATE TABLE IF NOT EXISTS ". $wpdb->prefix.$blogsId."sg_image_popup (
				`id` int(11) NOT NULL,
				`url` varchar(255) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
		$sgPopupHtmlBase = "CREATE TABLE IF NOT EXISTS ". $wpdb->prefix.$blogsId."sg_html_popup (
				`id` int(11) NOT NULL,
				`content` text NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;";


		$wpdb->query($sgPopupBase);
		$wpdb->query($sgPopupImageBase);
		$wpdb->query($sgPopupHtmlBase);
	}

	public static function install()
	{
		$obj = new self();
		$obj->createTables("");

		if(is_multisite()) {
			$sites = wp_get_sites();
			foreach($sites as $site) {
				$blogsId = $site['blog_id']."_";
				global $wpdb;
				$obj->createTables($blogsId);
			}
		}
	}

	public static function uninstallTables($blogsId)
	{
		global $wpdb;
		$delete = "DELETE	FROM ".$wpdb->prefix.$blogsId."postmeta WHERE meta_key = 'sg_promotional_popup' ";
		$wpdb->query($delete);

		$popupTable = $wpdb->prefix.$blogsId."sg_popup";
		$popupSql = "DROP TABLE ". $popupTable;

		$popupImageTable = $wpdb->prefix.$blogsId."sg_image_popup";
		$popupImageSql = "DROP TABLE ". $popupImageTable;

		$popupHtmlTable = $wpdb->prefix.$blogsId."sg_html_popup";
		$popupHtmlSql = "DROP TABLE ". $popupHtmlTable;

		$wpdb->query($popupSql);
		$wpdb->query($popupImageSql);
		$wpdb->query($popupHtmlSql);

	}

	public static function uninstall() {
		global $wpdb;
		$obj = new self();
		$obj->uninstallTables("");

		if(is_multisite()) {
			$stites = wp_get_sites();
			foreach($stites as $site) {
				$blogsId = $site['blog_id']."_";
				global $wpdb;
				$obj->uninstallTables($blogsId);
			}
		}
	}
}