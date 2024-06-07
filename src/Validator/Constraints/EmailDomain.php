<?php

namespace App\Validator\Constraints;

use App\Validator\EmailDomainValidator;
use Doctrine\ORM\Mapping\MappingAttribute;
use Symfony\Component\Validator\Constraint;

#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class EmailDomain extends Constraint
{
    /*
     * Mensaje de error
     */
    public $message = 'El email "{{ value }}" no es válido.';

    /**
     * El dominio que no puede tener el email
     */
    public string $domain = '';

    /**
     * EmailDomain constructor.
     * @param string|null $domain El dominio contra el que se valida, el email no acepta este dominio
     * @param mixed|null $options
     * @param array|null $groups
     * @param mixed|null $payload
     */
    public function __construct(
        ?string $domain,
        mixed $options = null,
        ?array $groups = null,
        mixed $payload = null)
    {
        $domain ??= $options['domain'] ?? 'example.com';

        parent::__construct($options, $groups, $payload);

        $this->domain = $domain;
    }

    /**
     * @return string Defini la clase del validador a usar
     */
    public function validatedBy(): string
    {
        return EmailDomainValidator::class;
    }
}
