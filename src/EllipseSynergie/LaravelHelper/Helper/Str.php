<?php namespace EllipseSynergie\LaravelHelper\Helper;

/**
 * String Helper
 *
 * @author Maxime Beaudoin <maxime.beaudoin@ellipse-synergie.com>
 */
class Str {
	
	/**
	 * Constructor
	 * 
	 * @param string $encoding
	 */
	public function __construct($encoding)
	{
		$this->encoding = $encoding;
	}

	/**
	 * Replace accents by their letter counterpart (e.g 'é' becoming 'e')
	 *
	 * @param string $str
	 * @return string
	 */
	public function replaceAccents($str)
	{
	    return str_replace(
	    	array('á', 'à', 'â', 'ä', 'é', 'è', 'ê', 'ë', 'í', 'î', 'ì', 'ï', 'ó', 'ô', 'ò', 'ø', 'õ', 'ö', 'ú', 'û', 'ù', 'ü'),
	    	array('a', 'a', 'a', 'a', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u'),
	    	mb_strtolower($str, $this->encoding)
	    );
	}
	
	/**
	 * Method to cleanup a array of data
	 */
	public function arrayStripTags($array)
	{
		$result = array();
	
		foreach ($array as $key => $value) {
			// Don't allow tags on key either, maybe useful for dynamic forms.
			$key = strip_tags($key);
	
			// If the value is an array, we will just recurse back into the
			// function to keep stripping the tags out of the array,
			// otherwise we will set the stripped value.
			if (is_array($value)) {
				$result[$key] = static::arrayStripTags($value);
			} else {
				// I am using strip_tags(), you may use htmlentities(),
				// also I am doing trim() here, you may remove it, if you wish.
				$result[$key] = trim(strip_tags($value));
			}
		}
	
		return $result;
	}
}