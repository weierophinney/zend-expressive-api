<?php
namespace App\Exception;

use DomainException;
use Zend\ProblemDetails\Exception\CommonProblemDetailsExceptionTrait;
use Zend\ProblemDetails\Exception\ProblemDetailsExceptionInterface;

class InvalidParameterException extends DomainException implements ProblemDetailsExceptionInterface
{
    use CommonProblemDetailsExceptionTrait;

    public static function create(string $message, array $additionalData = []) : self
    {
        $e = new self($message);
        $e->status = 400;
        $e->detail = $message;
        $e->type = 'https://example.com/api/doc/invalid-parameter';
        $e->title = 'Invalid parameter';
        $e->additional['parameters'] = $additionalData;
        return $e;
    }
}
