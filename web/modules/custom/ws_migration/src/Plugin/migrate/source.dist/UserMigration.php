<?php

namespace Drupal\ws_migration\Plugin\migrate\source;

use Drupal\migrate\Row;

/**
 * User migration plugin.
 *
 * @MigrateSource(
 *   id = "source_user",
 *   source_module = "ws_migration",
 * )
 */
class UserMigration extends MigrationSourceBase {

  /**
   * Returns available fields on the source.
   *
   * @return array
   *   Available fields in the source, keys are the field machine names as used
   *   in field mappings, values are descriptions.
   */
  public function fields() {
    return [
      'id' => 'user id',
      'username' => 'username - login name',
      'mail' => 'registration mail',
      'since' => 'membership start date',
    ];
  }

  /**
   * Defines the source fields uniquely identifying a source row.
   */
  public function getIds() {
    return [
      'id' => [
        'type' => 'integer',
        'alias' => 'u',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('user', 'u')
      ->fields('u', []);
    return $query;
  }

  public function prepareRow(Row $row) {
    // Convert Datetime column to Drupal UNIX timestamp.
    $this->convertToTimestamp($row, 'since');
    return parent::prepareRow($row);
  }

}
