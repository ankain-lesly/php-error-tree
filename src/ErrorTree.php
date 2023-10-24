<?php

/**
 * User: Dev_Lee
 * Date: 10/23/2023 - Time: 7:00 PM
 */


namespace Devlee\ErrorTree;

use Devlee\PHPRouter\Exceptions\RouterBaseException;
use Throwable;

/**
 * @author  Ankain Lesly <leeleslyank@gmail.com>
 * @package  php-router-core
 */

class ErrorTree
{
  private static function extractContext(\Throwable $e, bool $min)
  {
    if ($min) {
      // Minimum Display Details
      $ExcData = array(
        'title' => method_exists($e, 'getTitle') ? $e->getTitle() : 'Application Runtime Error',
        'message' => $e->getMessage(),
        'code' => $e->getLine(),
      );
    } else {
      // Maximun Display Details
      $ExcData = array(
        'title' => "Application Error",
        'code' => $e->getCode(),
        'message' => $e->getMessage(),
        'line' => $e->getLine(),
        'file' => $e->getFile(),
      );
    }

    self::renderError($ExcData);
  }
  /**
   * Display exception errors
   * 
   * @param array|Throwable|string $context error content
   * 
   * @return void
   */
  public static function RenderError(array|\Throwable|string $context, bool $min = false, array $resources = [])
  {
    if ($context instanceof Throwable) {
      $context = self::extractContext($context, $min);
    }

    include_once __DIR__ . '/static/pages/tree-template.php';
    exit;
  }
}
