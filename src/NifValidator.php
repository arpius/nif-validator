<?php

namespace Arpius\NifValidator;


class NifValidator
{
    const NIF_PATTERN = '/^[0-9]{8}[a-z]$/i';
    const NIF_LETTERS = [
        't', 'r', 'w', 'a', 'g', 'm', 'y', 'f', 'p', 'd', 'x', 'b',
        'n', 'j', 'z', 's', 'q', 'v', 'h', 'l', 'c', 'k', 'e'
    ];
    const DIVISOR = 23;

    public function validate(string $nif): bool
    {
        if (!$this->nifHasTheRightFormat($nif)) {
            return false;
        }

        if (!$this->controlDigitIsCorrect($nif)) {
            return false;
        }

        return true;
    }

    private function nifHasTheRightFormat(string $nif): bool
    {
        if (!preg_match(self::NIF_PATTERN, $nif)) {
            return false;
        }

        return true;
    }

    private function controlDigitIsCorrect(string $nif): bool
    {
        $modulus = $this->calculateModulusOfNumericalPart($nif);
        $letter = strtolower(substr($nif, -1));

        if ($letter !== self::NIF_LETTERS[$modulus]) {
            return false;
        }

        return true;
    }

    private function calculateModulusOfNumericalPart(string $nif): int
    {
        $number = (int)substr($nif, 0, 8);
        $modulus = $number % self::DIVISOR;

        return $modulus;
    }
}