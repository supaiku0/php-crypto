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

namespace ArkEcosystem\Crypto\Serializers;

/**
 * This is the serializer class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class SecondSignatureRegistration extends AbstractSerializer
{
    /**
     * Handle the serialisation of "delegate registration" data.
     *
     * @return string
     */
    public function serialize(): string
    {
        $this->bytes .= hex2bin($this->transaction->asset->signature->publicKey);

        return $this->bytes;
    }
}