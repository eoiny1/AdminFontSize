<?php
declare(strict_types=1);

namespace Neon\AdminFontSize\Observer\Backend\Layout;

class RenderBefore implements \Magento\Framework\Event\ObserverInterface
{

  
  const CSS_CUSTOM_NAME = "admin-custom-font-size";

   /**
   * @var Config
   */
   protected $config;
  
  
  /**
  * @var Session
  */
  protected $authSession;
  
  
  
  /**
  * @var Neon\AdminFontSize\Helper
  */
  protected $helper;

 
   /**
    * LoadBefore constructor.
    *
    * @param Config                $config
    */
   public function __construct(
     \Magento\Framework\View\Page\Config $config,
     \Magento\Backend\Model\Auth\Session $authSession,
      \Neon\AdminFontSize\Helper\Config $helper
   ) {
       $this->config = $config;
       $this->authSession = $authSession;
       $this->helper = $helper;
   }
  
    /**
     * Execute observer
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(
        \Magento\Framework\Event\Observer $observer
      
    ) {
      
        $user = $this->getCurrentUser();
        
        if($this->helper->isEnabled()) {
      
          if($user) {

            if($this->isCustomUser($user->getUserId())) {

                  $this->config->addBodyClass(self::CSS_CUSTOM_NAME);
            }
            
          }
        
        }
      
  }
  
  
  protected function isCustomUser($userId) {
    
        $users_array = $this->helper->getUser();
    
        foreach($users_array as $user) {
          
           if($user["user"] == $userId) {
             return true;
           }
          
        }

  }
  
  
  
  
  public function getCurrentUser()
  {
    return $this->authSession->getUser();
  }
  
  
  
  
}