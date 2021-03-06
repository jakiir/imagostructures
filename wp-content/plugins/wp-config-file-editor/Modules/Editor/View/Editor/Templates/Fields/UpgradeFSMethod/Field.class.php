<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\UpgradeFSMethod;

# Input field base
use WCFE\Modules\Editor\View\Editor\Fields\DropDownField;

/**
* 
*/
class Field extends DropDownField {

	/**
	* put your comment there...
	* 
	*/
	public function getText() {
		return $this->__( 'File System Method' );
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return $this->__( 'forces the filesystem method. It should only be "direct", "ssh2", "ftpext", or "ftpsockets". Generally, you should only change this if you are experiencing update problems. If you change it and it doesn\'t help, change it back/remove it. Under most circumstances, setting it to \'ftpsockets\' will work if the automatically chosen method does not.<br><br>(Primary Preference) "direct" forces it to use Direct File I/O requests from within PHP, this is fraught with opening up security issues on poorly configured hosts, This is chosen automatically when appropriate
		<br><br><strong>
		(Secondary Preference) "ssh2" is to force the usage of the SSH PHP Extension if installed</strong>
		<br><br><strong>
		(3rd Preference) "ftpext" is to force the usage of the FTP PHP Extension for FTP Access, and finally</strong>
		<br><br><strong>
		(4th Preference) "ftpsockets" utilises the PHP Sockets Class for FTP Access.</strong>' );
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getOptionsList() {
		# Create locale list
		$list = array(
			'' => '',
			'direct' => $this->__( 'Direct (direct)' ),
			'ssh2' => $this->__( 'SSH 2 (ssh2)' ),
			'ftpext' => $this->__( 'FTP Extension (ftpext)' ),
			'ftpsockets' => $this->__( 'FTP Sockets (ftpsockets)' ),
		);
		# Use locale name as keys and values
		return $list;
	}

}
