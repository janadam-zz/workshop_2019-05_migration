<?php

namespace Drupal\pametnaroda_migration\Plugin\migrate\process;

use Drupal\migrate\MigrateSkipProcessException;
use Drupal\migrate\Plugin\migrate\process\MigrationLookup;

/**
 * Class ZeroMigrationLookup.
 *
 * Not skip if value is zero.
 *
 * @package Drupal\pametnaroda_migration\Plugin\migrate\process
 *
 * @MigrateProcessPlugin(
 *   id = "zero_migration_lookup"
 * )
 */
class ZeroMigrationLookup extends MigrationLookup {

  /**
   * Skips the migration process entirely if the value is empty or FALSE.
   *
   * Not skip if value is zero.
   *
   * @param array $value
   *   The incoming value to transform.
   *
   * @throws \Drupal\migrate\MigrateSkipProcessException
   */
  protected function skipOnEmpty(array $value) {
    if (count($value) == 0) {
      throw new MigrateSkipProcessException();
    }
    foreach ($value as $item) {
      if ($item === FALSE || $item == '') {
        throw new MigrateSkipProcessException();
      }
    }
  }

}
