<?php


namespace Neon\AdminFontSize\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\Module\Manager as ModuleManager;
use Magento\Framework\UrlInterface;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\Encryption\EncryptorInterface;

use Magento\Framework\App\Helper\AbstractHelper;



/**
 * Class Config
 *
 * @package Neon\Rms\Helper
 */
class Config extends AbstractHelper
{

  const ENABLE_CUSTOM_STYLE = "adminfontsize/fontsetting/enable_custom_style";
  const USER = "adminfontsize/fontsetting/user";

  
  
  
    /**
    **/
    protected $serializer;
  
      
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;
    
    /**
     * Module manager
     *
     * @var ModuleManager
     */
    protected $moduleManager;
    
    /**
     * @var UrlInterface
     */
    private $urlBuilder;
  
  
    /**
    *
    */
    protected $encryptor;
  
  
   /**
     * @param ScopeConfigInterface $scopeConfig
     * @param ModuleManager $moduleManager
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        ModuleManager $moduleManager,
        UrlInterface $urlBuilder,
        SerializerInterface $serializer,
        EncryptorInterface $encryptor,
        \Magento\Framework\App\Helper\Context $context
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->moduleManager = $moduleManager;
        $this->urlBuilder = $urlBuilder;
        $this->serializer = $serializer;
        $this->encryptor = $encryptor;
      
        
        parent::__construct($context);
    }
  
  
  
  
     /**
    *
    */
    public function isEnabled($storeId = null) {
            
       return $this->scopeConfig->getValue(
            self::ENABLE_CUSTOM_STYLE,
            ScopeInterface::SCOPE_STORE,
            $storeId
         );

    }


   /**
    *
    */
    public function getUser($storeId = null) {
      
       return $this->serializer->unserialize($this->scopeConfig->getValue(
            self::USER,
            ScopeInterface::SCOPE_STORE,
            $storeId
         ));

    }
  
  
    
  
  
  
  
  


}

