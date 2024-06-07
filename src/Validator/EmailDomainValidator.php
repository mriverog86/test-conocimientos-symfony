<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class EmailDomainValidator extends ConstraintValidator
{
    /** Valida el dominio de un email contra un valor no permitido
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        // Obteniendo el dominio del email
        $email = explode('@', $value);
        $domain = $email[1];

        // Verifica si el dominio es válido, no puede ser el que se especifica en la restricción
        if ($domain === $constraint->domain) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        }
    }
}
