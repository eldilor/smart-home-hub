<?php


namespace src\services;


use src\App;

class GpioService {
	private static $STATE_ON = 0;
	private static $STATE_OFF = 1;
	private static $OUT_DIRECTION = 'out';
	private static $IN_DIRECTION = 'in';

	public static function turnOn( string $pinNumber ) {
		self::gpio( $pinNumber, self::$OUT_DIRECTION, self::$STATE_ON );
	}

	public static function turnOff( string $pinNumber ) {
		self::gpio( $pinNumber, self::$OUT_DIRECTION, self::$STATE_OFF );
	}

	public static function getState( string $pinNumber ) {
		$state = (int) self::gpio( $pinNumber, self::$IN_DIRECTION );

		if ( $state === self::$STATE_ON ) {
			$state = 1;
		} else if ( $state === self::$STATE_OFF ) {
			$state = 0;
		}

		return $state;
	}

	private static function gpio( string $pinNumber, string $pinDirection, int $pinState = - 1 ) {
		$stdError = App::isDev() ? ' 2>&1' : '';
		$state    = $pinState !== - 1 && $pinDirection === self::$OUT_DIRECTION ? $pinState : '';

		return shell_exec( "sudo -t /usr/bin/php ./gpio-controller $pinNumber $pinDirection $state $stdError" );
	}
}

