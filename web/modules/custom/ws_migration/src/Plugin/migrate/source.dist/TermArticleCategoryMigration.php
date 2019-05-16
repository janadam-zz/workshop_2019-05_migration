<?php

namespace Drupal\ws_migration\Plugin\migrate\source;

/**
 * Article category taxonomy term migration plugin.
 *
 * @MigrateSource(
 *   id = "source_term_article_category",
 *   source_module = "ws_migration",
 * )
 */
class TermArticleCategoryMigration extends MigrationSourceBase {

  /**
   * Returns available fields on the source.
   *
   * @return array
   *   Available fields in the source, keys are the field machine names as used
   *   in field mappings, values are descriptions.
   */
  public function fields() {
    return [
      'category_id' => 'category_id',
      'category_name' => 'category_name',
    ];
  }

  /**
   * Defines the source fields uniquely identifying a source row.
   */
  public function getIds() {
    return [
      'category_id' => [
        'type' => 'integer',
        'alias' => 'c',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function query() {
    // Eliminate empty names.
    $query = $this->select('category', 'c')
      ->fields('c');
    return $query;
  }

}
