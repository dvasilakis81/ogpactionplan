<?php
/**
 * @package     mod_action_plan
 * @copyright   (C) 2026 Rinenweb
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * Removes the pre-1.1.0 sub-templates (tmpl/code/...), which the
 * installer would otherwise leave behind on update.
 */
class mod_action_planInstallerScript
{
    public function postflight($type, $parent)
    {
        if ($type !== 'update') {
            return true;
        }

        $this->removeFolder(JPATH_SITE . '/modules/mod_action_plan/tmpl/code');

        return true;
    }

    private function removeFolder($dir)
    {
        if (!is_dir($dir)) {
            return;
        }

        foreach (scandir($dir) as $entry) {
            if ($entry === '.' || $entry === '..') {
                continue;
            }

            $path = $dir . '/' . $entry;

            if (is_dir($path) && !is_link($path)) {
                $this->removeFolder($path);
            } else {
                @unlink($path);
            }
        }

        @rmdir($dir);
    }
}
