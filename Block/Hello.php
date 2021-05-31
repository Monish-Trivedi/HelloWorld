<?php
/**
 *
 * @package     magento2
 * @author      Monish Trivedi
 */

namespace Monish\HelloWorld\Block;

use Magento\Framework\View\Element\Template;

class Hello extends Template
{
    public function getText() {
        return "Hello World This is my first extension";
    }
}