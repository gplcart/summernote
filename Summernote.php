<?php

/**
 * @package Summernote
 * @author Iurii Makukh
 * @copyright Copyright (c) 2017, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\summernote;

use gplcart\core\Module,
    gplcart\core\Library;

/**
 * Main class for Summernote module
 */
class Summernote extends Module
{

    /**
     * Library class instance
     * @var \gplcart\core\Library $library
     */
    protected $library;

    /**
     * @param Library $library
     */
    public function __construct(Library $library)
    {
        parent::__construct();

        $this->library = $library;
    }

    /**
     * Implements hook "library.list"
     * @param array $libraries
     */
    public function hookLibraryList(array &$libraries)
    {
        $libraries['summernote'] = array(
            'name' => 'Summernote',
            'description' => 'Super simple WYSIWYG Editor',
            'type' => 'asset',
            'module' => 'summernote',
            'url' => 'https://github.com/summernote/summernote',
            'download' => 'https://github.com/summernote/summernote/archive/v0.8.3.zip',
            'version_source' => array(
                'file' => 'vendor/summernote/summernote/dist/summernote.min.js',
                'pattern' => '/v(\\d+\\.+\\d+\\.+\\d+)/'
            ),
            'files' => array(
                'vendor/summernote/summernote/dist/summernote.min.js',
                'vendor/summernote/summernote/dist/summernote.css'
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
        $settings = $this->config->module('summernote');

        if (!empty($settings['selector']) && is_array($settings['selector'])) {
            $options = array('aggregate' => false);
            $controller->setJsSettings('summernote', $settings);
            $controller->addAssetLibrary('summernote', $options);
            $controller->setJs('system/modules/summernote/js/common.js', $options);
        }
    }

    /**
     * Implements hook "module.enable.after"
     */
    public function hookModuleEnableAfter()
    {
        $this->library->clearCache();
    }

    /**
     * Implements hook "module.disable.after"
     */
    public function hookModuleDisableAfter()
    {
        $this->library->clearCache();
    }

    /**
     * Implements hook "module.install.after"
     */
    public function hookModuleInstallAfter()
    {
        $this->library->clearCache();
    }

    /**
     * Implements hook "module.uninstall.after"
     */
    public function hookModuleUninstallAfter()
    {
        $this->library->clearCache();
    }

}
