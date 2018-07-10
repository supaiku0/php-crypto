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

namespace ArkEcosystem\Crypto\Identity;

use ArkEcosystem\Crypto\Configuration\Network as NetworkConfiguration;
use ArkEcosystem\Crypto\Contracts\Network;
use BitWasp\Bitcoin\Base58;
use BitWasp\Bitcoin\Crypto\Hash;
use BitWasp\Buffertools\Buffer;
use BrianFaust\Binary\UnsignedInteger\Writer;

/**
 * This is the wif class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class WIF
{
    /**
     * Derive the WIF from the given secret.
     *
     * @param string                                      $secret
     * @param \ArkEcosystem\Crypto\Contracts\Network|null $network
     *
     * @return string
     */
    public static function fromSecret(string $secret, Network $network = null): string
    {
        $network = $network ?? NetworkConfiguration::get();

        return PrivateKey::fromSecret($secret)->toWif($network->getFactory());
    }
}
