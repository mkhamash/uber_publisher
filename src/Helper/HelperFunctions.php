<?php

namespace Drupal\uber_publisher\Helper;

/**
 * Defines some helpers functions that we may use in profile.
 */
class HelperFunctions {

  /**
   * Check if module folder exists at modules directory and it's all sub Directories.
   *
   * @param string $profile_name
   *   Profile name.
   * @param string $module_name
   *   The module name that we need to check is exists or no.
   *
   * @return bool
   */
  public static function module_path_exists($root_search = DRUPAL_ROOT, $module_name) {
    $iterators = new \RecursiveIteratorIterator(
        new \RecursiveDirectoryIterator($root_search, \  RecursiveDirectoryIterator::SKIP_DOTS),
        \RecursiveIteratorIterator::SELF_FIRST,
    // Ignore "Permission denied".
        \RecursiveIteratorIterator::CATCH_GET_CHILD
    );

    // Loop through all iterators.
    foreach ($iterators as $module_directory) {
      // If module is directory.
      if ($module_directory->isDir()) {
        // Check if any of modules directories endsWith $module_name and .info.yml file is exists.
        if (preg_match('/' . $module_name . '$/', $module_directory) && file_exists($module_directory . '/' . $module_name . '.info.yml')) {
          return TRUE;
        }
      }
    }
    return FALSE;
  }

}
