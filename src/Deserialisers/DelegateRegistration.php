<?php

declare(strict_types=1);

/*
 * This file is part of Ark PHP Crypto.
 *
 * (c) Ark Ecosystem <info@ark.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ArkEcosystem\Crypto\Deserialisers;

use BrianFaust\Binary\UnsignedInteger\Reader as UnsignedInteger;
use stdClass;

/**
 * This is the deserialiser class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class DelegateRegistration extends AbstractDeserialiser
{
    /**
     * Handle the deserialisation of "vote" data.
     *
     * @return object
     */
    public function deserialise(): object
    {
        $usernameLength = UnsignedInteger::bit8($this->binary, $this->assetOffset / 2) & 0xff;

        $this->transaction->asset                     = new stdClass();
        $this->transaction->asset->delegate           = new stdClass();
        $this->transaction->asset->delegate->username = hex2bin(substr($this->hex, $this->assetOffset + 2, $usernameLength * 2));

        return $this->parseSignatures($this->assetOffset + ($usernameLength + 1) * 2);
    }
}