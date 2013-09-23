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
	 * Convert HTML characters to entities.
	 *
	 * The encoding specified in the application configuration file will be used.
	 *
	 * @todo Use Html::entities($value)
	 * @param  string  $value
	 * @return string
	 */
	public function entities($value)
	{
		return htmlentities($value, ENT_QUOTES, $this->encoding, false);

	} // entities()

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
}