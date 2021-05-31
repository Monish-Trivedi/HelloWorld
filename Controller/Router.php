<?php
namespace Monish\HelloWorld\Controller;

class Router implements \Magento\Framework\App\RouterInterface
{
    /**
     * @var \Magento\Framework\App\ActionFactory
     */
    protected $actionFactory;

    /**
     * Response
     *
     * @var \Magento\Framework\App\ResponseInterface
     */
    protected $_response;

    /**
     * @param \Magento\Framework\App\ActionFactory $actionFactory
     * @param \Magento\Framework\App\ResponseInterface $response
     */
    public function __construct(\Magento\Framework\App\ActionFactory $actionFactory, \Magento\Framework\App\ResponseInterface $response)
    {
        $this->actionFactory = $actionFactory;
        $this->_response = $response;
    }

    /**
     * @param \Magento\Framework\App\RequestInterface $request
     * @return \Magento\Framework\App\ActionInterface|void
     */
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $identifier = trim($request->getPathInfo() , '/');        
        if (strpos($identifier, 'monishhelloworld') !== false)
        {
           
            $request->setModuleName('helloworld')
                ->setControllerName('index')
                ->setActionName('index');
        }
        else
        {
            return;
        }

        return $this
            ->actionFactory
            ->create('Magento\Framework\App\Action\Forward', ['request' => $request]);
    }
}