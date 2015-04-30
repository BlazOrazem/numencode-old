<?php
	
	/**
	 * Display string or array in <pre> tags
	 *
	 * @param string $var
	 * @return string|array
	 */
	function debug($var)
	{
		print("<pre>" . print_r($var, true) . "</pre>");
	}
	
	/**
	 * Display string or array in <pre> tags and exit
	 *
	 * @param string $var
	 * @return string|array
	 */
	function diebug($var)
	{
		exit(debug($var));
	}
	
	/**
	 * Display string or array (as string) in console
	 *
	 * @param string $data
	 * @return string
	 */
	function debugc($data)
	{
		if (is_array($data)) {
			$output = "<script>console.log( '" . implode( '+', $data) . "' );</script>";
		} else {
			$output = "<script>console.log( '" . $data . "' );</script>";
		}
		echo $output;
	}
	
	
	
	/**
	 * Create hashcode
	 *
	 * @param string $algo The algorithm (md5, sha1, sha256, whirlpool, etc.)
	 * @param string $data The data to encode
	 * @param string $salt The salt (Should be the same throughout the system)
	 * @return string The hashed/salted data
	 */
	//function hash($algo = 'sha256', $data, $salt)
	//{
	//	$context = hash_init($algo, HASH_HMAC, $salt);
	//	hash_update($context, $data);
	//	return hash_final($context);
	//}
	
	/**
	 * Two-way data encryption and decryption with password key
	 *
	 * @param string $key Password key string
	 * @param string $string String to encrypt/decrypt
	 * @param string $request Type of request encrypt|decrypt
	 * @return string Returns encrypted/decrypted password
	 */
	function password($key, $string, $request = 'encrypt')
	{
		if ($request === 'encrypt') {
			$password = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
		}
		if ($request === 'decrypt') {
			$password = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
		}
		return $password;
	}
	
	/**
	 * Language pack translation
	 *
	 * @param string $code Language pack code
	 * @return string
	 */
	function t($code)
	{	
		$langfile = LANGPACK . ADMINLANG . '_general.php';
		
		if(!file_exists($langfile)){
			try {
				throw new Exception("Translation file <strong>{$langfile}</strong> not found");
			} catch (Exception $e) {
				debug("{$e->getMessage()} in <strong>" . __FILE__ . "</strong> on line <strong>{$e->getLine()}</strong>.");
				diebug($e->getTrace());
			}
		}
		
		$translation = require($langfile);
		
		if(isset($translation[$code])){
			return $translation[$code];
		}
	
		return $code;
	}
		
	/**
	 * Optimized url redirection with optional message
	 *
	 * @param string $url Url to redirect to
	 * @param string $msg Message to be displayed before redirection
	 * @param integer $time Message displayed for amount of time in seconds
	 */
	function redirectt($url, $msg = false, $time = 0)
	{
		if($msg && $time > 0){
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
			echo '<center><font color="red"><h3>'.$msg.'</h3><p>Preusmerjam...</p></font></center>';
			echo '<meta http-equiv="refresh" content="'.$time.';url='.$url.'">';
			exit();
		}
		else {
			header("Location: {$url}");
			exit();
		}
	}
	
	/**
	 * E-mail address format validation
	 *
	 * @param string $email
	 * @return boolean
	 */
	function isEmail($email)
	{
	    if(filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
	    else return false;
	}
	
	/**
	 * Convert date format from Slovenian to English format for database insertion
	 *
	 * @param date $date Date in Slovenian format, eg: 31.12.2012
	 * @return date $date Date in English format, eg: 2012-12-31
	 */
	function prepareDateForDB($date)
	{
		$a = explode('.',$date);
		return $a[2].'-'.$a[1].'-'.$a[0];
	}
	
	/**
	 * Convert string to array
	 *
	 * @param string $data Must be delimited with comma eg. piece1,piece2,piece3
	 * @param string $delimiter Delimiter string, default is comma
	 * @return array
	 */
	function toArray($data, $delimiter = ',')
	{
		$arr = array();
		$arr = explode($delimiter, $data);
		return $arr;
	}
	
	/**
	 * Set meta data
	 *
	 * @param string $title Page title
	 * @param string $metadesc Meta description
	 * @param string $metakw Meta keywords
	 * @return array
	 */
	function setMetadata($title = false, $metadesc = false, $metakw = false)
	{
		$metaData = array();
		$metaData["meta_title"] = $title;
		$metaData["meta_desc"] = $metadesc;
		$metaData["meta_kw"] = $metakw;
		return $metaData;
	}
	
	/**
	 * Smarty custom block plugin
	 * Included css styles and javascripts from template pass to <head>
	 *
	 * @param string $params
	 * @param string $content
	 * @param string $smarty
	 * @param bool $repeat
	 * @return none
	 */
	function smarty_block_cssjs($params, $content, &$smarty, &$repeat)
	{
		libs\View::$cssjs .= $content;
	}
	
	/**
	 * CK editor WYSIWYG
	 *
	 * @param string $name Unique name
	 * @param string $value Content
	 * @param string $width CKEditor width in px
	 * @param int $height CKEditor height in px
	 * @param string $toolbar CKEditor toolbar
	 * @param string $language CKEditor language
	 * @return ckEditor
	 */
	function getCK($name='content', $value='', $toolbar = 'Basic', $width='100%', $height='400', $language = 'sl')
	{
		if(libs\Auth::roleManager() == 'Admin') $toolbar = 'Admin';
		$id='ck_'.$name;
		return '	
		<textarea style="width:'.$width.'; height:'.$height.'px;" id="'.$id.'" name="'.$name.'">'.$value.'</textarea>
		<script type="text/javascript">
		//<![CDATA[
			CKEDITOR.replace( \''.$id.'\',
				{	
					language: \''.$language.'\',
					skin : \'moonocolor\',
					height: '.$height.',
					width: "'.$width.'",
					toolbar: \''.$toolbar.'\',
					resize_minWidth : "'.$width.'"
				});
		//]]>
		</script>
		';
	}