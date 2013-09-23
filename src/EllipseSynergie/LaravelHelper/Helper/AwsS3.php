<?php namespace EllipseSynergie\LaravelHelper\Helper;

use Aws\S3\S3Client;
use Aws\S3\Enum\CannedAcl;

/**
 * AwsS3 Helper
 *
 * @author Dominic Martineau <dominic.martineau@ellipse-synergie.com>
 */
class AwsS3 {
	
	protected $_key;	
	protected $_secret;
	protected $_bucket;
	
	/**
	 * Constructor
	 * 
	 * @param string $key;
	 * @param string $secret;
	 * @param string $bucket;
	 */
	public function __construct($key, $secret, $bucket)
	{
		$this->_key = $key;
		$this->_secret = $secret;
		$this->_bucket = $bucket;
	}

    /**
     * Upload a file
     *
     * @param string $path
     * @param string $filename
     */
    public function upload($path, $filename)
    {
        $client = S3Client::factory(array(
            'key'    => $this->_key,
            'secret' => $this->_secret
        ));

        // Upload an object to Amazon S3
        $result = $client->putObject(array(
            'Bucket'     => $this->_bucket,
            'Key'        => $filename,
            'SourceFile' => $path,
            'Metadata'   => array(),
            'ACL'        => CannedAcl::PUBLIC_READ,
            'Expires'    => (time() + 60*60*24*365)
        ));

    } // upload()

    /**
     * Copy a file
     *
     * @param string $from
     * @param string $to
     */
    public function copy($from, $to)
    {
        $client = S3Client::factory(array(
            'key'    => $this->_key,
            'secret' => $this->_secret
        ));

        // Upload an object to Amazon S3
        $result = $client->copyObject(array(
            'CopySource' => $this->_bucket . '/' . $from,
            'Bucket'     => $this->_bucket,
            'Key'        => $to,
            'Metadata'   => array(),
            'ACL'        => CannedAcl::PUBLIC_READ,
            'Expires'    => (time() + 60*60*24*365)
        ));

    } // copy()

} // Cdn