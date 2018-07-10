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

namespace ArkEcosystem\Tests\Crypto\Deserialisers;

use ArkEcosystem\Crypto\Deserialiser;
use ArkEcosystem\Crypto\Serialiser;
use ArkEcosystem\Tests\Crypto\TestCase;

/**
 * This is the delegate registration deserialiser test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class DelegateRegistrationTest extends TestCase
{
    /** @test */
    public function it_should_deserialise_the_transaction()
    {
        $transaction = $this->getTransactionFixture(2);

        $actual = Deserialiser::new($transaction->serialized)->deserialise();

        $this->assertSame($transaction->version, $actual->version);
        $this->assertSame($transaction->network, $actual->network);
        $this->assertSame($transaction->type, $actual->type);
        $this->assertSame($transaction->timestamp, $actual->timestamp);
        $this->assertSame($transaction->senderPublicKey, $actual->senderPublicKey);
        $this->assertSame($transaction->fee, $actual->fee);
        $this->assertSame($transaction->asset->delegate->username, $actual->asset->delegate->username);
        $this->assertSame($transaction->signature, $actual->signature);
        $this->assertSame($transaction->amount, $actual->amount);
        $this->assertSame($transaction->id, $actual->id);
        $this->assertSame($transaction->serialized, Serialiser::new($actual)->serialise()->getHex());
    }
}