<?php


namespace Jar\Pugtemplate\ContentObjects;

/*
 * This file is part of the Jar/Pugtemplate project.
 */


use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Frontend\ContentObject\AbstractContentObject;
use TYPO3\CMS\Frontend\ContentObject\ContentDataProcessor;
use Jar\Pugtemplate\Services\PugService;
use Jar\Utilities\Utilities\TypoScriptUtility;

/**
 *
 * @author Isaac "DaPedro" Hintenjubel <ih@jcdn.de>
 * @package J77Template
 * @subpackage Services
 */

class PugContentObject extends AbstractContentObject {
    
    /**
     * Rendering the cObject, PUGTEMPLATE
     *
     *
     * Example:
     * 10 = PUGTEMPLATE
     * 10.templatePath = EXT:j77_template/Resources/Public/Frontends/goldmaster/pug/header.pug
     * 10.variables {
     *   mylabel = TEXT
     *   mylabel.value = Label from TypoScript coming
     * }
     *
     * @param array $conf Array of TypoScript properties
     * @return string The HTML output
     */
    public function render($conf = [])
    {
        $settings = TypoScriptUtility::populateTypoScriptConfiguration($conf ?? [], $this->cObj);

        $variables = $settings['variables'] ?? [];
        $variables['data'] = $this->cObj->data;
        $variables['current'] = $this->cObj->data[$this->cObj->currentValKey ?? null] ?? null;

        // handle dataprocessors
        if (!empty($conf['dataProcessing.'])) {
            $contentDataProcessor = GeneralUtility::makeInstance(ContentDataProcessor::class);
            $variables = $contentDataProcessor->process($this->cObj, $conf, $variables);
        }

    	$content = PugService::compile($settings['templatePath'], $variables, $conf['debug']);
    	$content = $this->applyStandardWrapToRenderedContent($content, $conf);

    	return $content;
    }
    
    /**
     * Apply standard wrap to content
     *
     * @param string $content Rendered HTML content
     * @param array $conf Configuration array
     * @return string Standard wrapped content
     */
    protected function applyStandardWrapToRenderedContent($content, array $conf)
    {
        if (isset($conf['stdWrap.'])) {
            $content = $this->cObj->stdWrap($content, $conf['stdWrap.']);
        }
        return $content;
    }
    
}
