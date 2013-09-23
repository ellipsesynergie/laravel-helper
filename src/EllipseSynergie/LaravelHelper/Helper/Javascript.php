<?php namespace EllipseSynergie\LaravelHelper\Helper;

/**
 * String Helper
 *
 * @author Maxime Beaudoin <maxime.beaudoin@ellipse-synergie.com>
 */
class Javascript {
	
	public $namespace;
	
	/**
	 * Initialization string for application
	 * 
	 * @var string
	 */
	public $application;
	
	/**
	 * Modules list
	 *
	 * @var array
	 */
	public $modules = array();

	/**
	 * Custom list
	 *
	 * @var array
	 */
	public $custom = array();
	
	/**
	 * Constructor
	 * 
	 * @param string $namespace
	 * @param array $options
	 */
	public function __construct($namespace, array $options = array())
	{		
		$this->namespace = $namespace;
		$this->options = $options;
				
	} //__construct()
	
	/**
	 * Load javascript files
	 * 
	 * return JsIntegration
	 */
	public function load()
	{
		//For each module
		foreach ($this->modules as $module_name => $module){
			
			//Include the related module js file
			Assets::addJs(array(
				'js/modules/' . $module_name . '/' . $module_name . '.min.js',
			));
			
			//For each module controllers
			foreach($module['controllers'] as $controller_name => $controller)
			{
				//Include the related module js file
				Assets::addJs(array(
					'js/modules/' .$module_name . '/controllers/' . $controller_name . '.min.js',
					'js/modules/' .$module_name . '/views/' . $controller_name . '.min.js',
				));
			}
			
		}
		
	} //load()
	
	/**
	 * Render javascript
	 * 
	 * return string
	 */
	public function render()
	{

		//Init the application
		$render = "\n" . $this->namespace . '.Application = new ' . $this->namespace . '.Prototype.Application(' . (!empty($this->options)?json_encode($this->options):'') . ');' . "\n";
		$render .= $this->namespace . '.Application.Modules = {};' . "\n";
		
		//For each module
		foreach ($this->modules as $module_name => $module){			

			//Generate controller options
			$options = (!empty($module['options'])) ? json_encode($module['options']) : '';
			
			$module_object = $this->namespace . '.Application.Modules.' .ucfirst($module_name);
			
			//Create the module
			$render .= $module_object . ' = new ' . $this->namespace . '.' .ucfirst($module_name) . '(' .  $options .');' . "\n";
			
			//Create module controllers
			foreach($module['controllers'] as $controller_name => $value)
			{
				//Reset options
				$c_options = $value;
					
				//If the controller is a array it's because he have options
				if(!is_array($c_options)){
					
					//The value is the controller name
					$controller_name = $value;
					
					//Clear the options
					$c_options = '';
				}
				
				//Generate controller options
				$c_options = (!empty($c_options)) ? json_encode($c_options) : '';
				
				//Create the module
				$render .= $module_object . '.Controllers.' . ucfirst($controller_name) . ' = new  ' . $this->namespace . '.' .ucfirst($module_name) . '.Controller.' . ucfirst($controller_name) . '(' .  $c_options .');' . "\n";
			}
			
			//Init the module views
			$render .= $module_object.'.initViews();' . "\n";
			
		}

		// Custom
		foreach ($this->custom as $customJs) {
			$render .= $customJs . "\n";
		}
		
		return $render;
		
	} //render()
	
	/**
	 * Add a new module
	 * 
	 * @param string $module
	 * @param array $options
	 * @param array $controllers
	 * @return JsIntegration
	 */
	public function addModule($module, array $options = array(), array $controllers = array())
	{
		$this->modules[$module] = array(
			'options' => $options,
			'controllers' => $controllers
		);
		
		return $this;
		
	} //addModule()
	
	public function addController($module, $controller, array $options = array())
	{
		$this->modules[$module]['controllers'][$controller] = $options;
	}

	public function addCustom($js)
	{
		$this->custom[] = $js;
	}
	
	/**
	 * Get the application
	 * 
	 * @return string
	 */
	public function getApplication()
	{
		return $this->application;
		
	} //getApplication()
	
	/**
	 * Get the module
	 *
	 * @return string
	 */
	public function getModules()
	{
		return $this->modules;
		
	} //getModules()
}