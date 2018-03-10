<?php

/**
 * @package Summernote
 * @author Iurii Makukh
 * @copyright Copyright (c) 2017, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\summernote;

use gplcart\core\Module;

/**
 * Main class for Summernote module
 */
class Main
{

    /**
     * Module class instance
     * @var \gplcart\core\Module $module
     */
    protected $module;

    /**
     * @param Module $module
     */
    public function __construct(Module $module)
    {
        $this->module = $module;
    }

    /**
     * Implements hook "library.list"
     * @param array $libraries
     */
    public function hookLibraryList(array &$libraries)
    {
        $libraries['summernote'] = array(
            'name' => 'Summernote', // @text
            'description' => 'Super simple WYSIWYG Editor', // @text
            'type' => 'asset',
            'module' => 'summernote',
            'url' => 'https://github.com/summernote/summernote',
            'download' => 'https://github.com/summernote/summernote/archive/v0.8.3.zip',
            'version' => '0.8.3',
            'files' => array(
                'dist/summernote.min.js',
                'dist/summernote.css'
            ),
            'dependencies' => array(
                'jquery' => '>= 1.9.0',
                'bootstrap' => '>= 3.0.1'
            )
        );
    }

    /**
     * Implements hook "route.list"
     * @param array $routes
     */
    public function hookRouteList(array &$routes)
    {
        $routes['admin/module/settings/summernote'] = array(
            'access' => 'module_edit',
            'handlers' => array(
                'controller' => array('gplcart\\modules\\summernote\\controllers\\Settings', 'editSettings')
            )
        );
    }

    /**
     * Implements hook "construct.controller.backend"
     * @param \gplcart\core\controllers\backend\Controller $controller
     */
    public function hookConstructControllerBackend($controller)
    {
        $this->setModuleAssets($controller);
    }

    /**
     * Sets module specific assets
     * @param \gplcart\core\controllers\backend\Controller $controller
     * @return bool
     */
    protected function setModuleAssets($controller)
    {
        if (!$controller->isInternalRoute()) {

            $settings = $this->module->getSettings('summernote');

            if (!empty($settings['selector']) && is_array($settings['selector'])) {
                $controller->setJsSettings('summernote', $settings);
                $controller->addAssetLibrary('summernote');
                $controller->setJs('system/modules/summernote/js/common.js');
            }
        }
    }

}
