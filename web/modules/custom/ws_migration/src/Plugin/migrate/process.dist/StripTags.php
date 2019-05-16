<?php

namespace Drupal\pametnaroda_migration\Plugin\migrate\process;

use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Uses the strip_tags() method on a source string.
 *
 * @MigrateProcessPlugin(
 *   id = "strip_tags"
 * )
 *
 * To do a simple strip_tags use the following:
 *
 * @code
 * field_text:
 *   plugin: strip_tags
 *   source: text
 *
 * field_text:
 *   plugin: strip_tags
 *   source: text
 *   allowable_tags: p,strong
 * @endcode
 */
class StripTags extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    $this->configuration += [
      'allowable_tags' => NULL,
    ];
    return strip_tags($value, $this->configuration['allowable_tags']);
  }

}
