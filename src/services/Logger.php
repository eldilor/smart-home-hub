<?php


namespace src\services;


class Logger {
	public static function plain( string $fileName, string $content, bool $withDate ) {
		self::log( $fileName, $content, $withDate );
	}

	public static function success( string $fileName, string $content, bool $withDate ) {
		self::log( $fileName, '[SUCCESS] ' . $content, $withDate );
	}

	public static function info( string $fileName, string $content, bool $withDate ) {
		self::log( $fileName, '[INFO] ' . $content, $withDate );
	}

	public static function warning( string $fileName, string $content, bool $withDate ) {
		self::log( $fileName, '[WARNING] ' . $content, $withDate );
	}

	public static function error( string $fileName, string $content, bool $withDate ) {
		self::log( $fileName, '[ERROR] ' . $content, $withDate );
	}

	private static function log( string $fileName, string $content, bool $withDate ) {
		if ( getenv( 'LOGS' ) == 1 ) {
			$date = $withDate ? date( 'd-m-Y H:i:s' ) : '';

			FileWriterService::append( './logs/' . $fileName . '.log', $content . ' ' . $date . "\n" );
			FileWriterService::append( './logs/logs.log', $content . ' ' . $date . "\n" );
		}
	}
}

