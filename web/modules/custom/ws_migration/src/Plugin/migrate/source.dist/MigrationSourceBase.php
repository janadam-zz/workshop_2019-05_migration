<?php

namespace Drupal\ws_migration\Plugin\migrate\source;

use Drupal\Component\Utility\Unicode;
use Drupal\migrate\MigrateException;
use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Class MigrationSourceBase.
 *
 * Stores shared methods.
 *
 * @package Drupal\ws_migration\Plugin\migrate\source
 */
abstract class MigrationSourceBase extends SqlBase {

  /**
   * Convert string in given field to UNIX timestamp.
   *
   * @param \Drupal\migrate\Row $row
   *   Migration row.
   * @param string $field
   *   DB column name.
   */
  protected function convertToTimestamp(Row $row, $field) {
    $date = $row->getSourceProperty($field);
    $timestamp = strtotime($date);
    if ($timestamp > 0) {
      try {
        $row->setSourceProperty($field, $timestamp);
      }
      catch (\Exception $e) {
      }
    }
  }

  /**
   * Generate title from source field as truncated text.
   *
   * @param \Drupal\migrate\Row $row
   *   Migration row.
   * @param string $sourceProperty
   *   Name of property (source table field).
   *
   * @throws \Exception
   */
  protected function generateTitleFromSourceProperty(Row $row,
                                                     $sourceProperty) {
    $data = $row->getSourceProperty($sourceProperty);
    $title = Unicode::truncate($data, 120, TRUE);
    $row->setSourceProperty('title', $title);
  }

}
