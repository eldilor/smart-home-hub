<?php


namespace src;


use src\services\GpioService;

class App {
	public static function run() {
		$app = new self();

		if ( $_SERVER['REQUEST_METHOD'] === 'GET' ) {
			$app->get();
		} else if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
			$app->post();
		}
	}

	private function get() {
		$pin = $_GET['pin'];

		$pinState = GpioService::getState( $pin );
		echo $pinState;
	}

	private function post() {
		$pin    = $_POST['pin'];
		$action = $_POST['action'];

		if ( $pin ) {
			switch ( $action ) {
				case 'TURN_ON':
					GpioService::turnOn( $pin );
					break;
				case 'TURN_OFF':
					GpioService::turnOff( $pin );
					break;
			}
		}
	}

	public static function isDev() {
		return getenv( 'DEV' ) == 1;
	}
}
