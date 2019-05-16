<?php

namespace Drupal\ws_migration\Plugin\migrate\source;

use Drupal\migrate\Row;

/**
 * User migration plugin.
 *
 * @MigrateSource(
 *   id = "source_article",
 *   source_module = "ws_migration",
 * )
 */
class ArticleMigration extends MigrationSourceBase {

  /**
   * Returns available fields on the source.
   *
   * @return array
   *   Available fields in the source, keys are the field machine names as used
   *   in field mappings, values are descriptions.
   */
  public function fields() {
    return [
      'id' => 'id',
      'title' => 'name_en',
      'body' => 'body',
      'category_id' => 'category_id',
      'published' => 'published',
    ];
  }

  /**
   * Defines the source fields uniquely identifying a source row.
   */
  public function getIds() {
    return [
      'id' => [
        'type' => 'integer',
        'alias' => 'a',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('article', 'a')
      ->fields('a');
    return $query;
  }

}
