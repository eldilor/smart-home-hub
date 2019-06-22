<?php


namespace src\services;


class FileWriterService {
	public static function append( string $filePath, string $fileContent ) {
		self::filePutContents( $filePath, $fileContent, FILE_APPEND );
	}

	public static function write( string $filePath, string $fileContent ) {
		self::filePutContents( $filePath, $fileContent );
	}

	private static function filePutContents( string $filePath, string $fileContent, int $flags = 0 ) {
		$dirsDelimiter = '/';
		$dirPath       = '';
		$filePathArray = explode( $dirsDelimiter, $filePath );

		if ( count( $filePathArray ) > 1 ) {
			foreach ( $filePathArray as $i => $filePathItem ) {
				if ( $i + 1 < count( $filePathArray ) ) {
					$dirPath .= $filePathItem . $dirsDelimiter;
				}
			}
		}

		if ( $dirPath && ! is_dir( $dirPath ) ) {
			mkdir( $dirPath, 0755, true );
		}

		file_put_contents( $filePath, $fileContent, $flags );
	}
}

