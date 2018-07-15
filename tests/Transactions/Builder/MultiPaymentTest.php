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

namespace ArkEcosystem\Tests\Crypto\Transactions\Builder;

use ArkEcosystem\Crypto\Transactions\Builder\MultiPayment;
use ArkEcosystem\Crypto\Utils\Crypto;
use ArkEcosystem\Tests\Crypto\TestCase;

/**
 * This is the multi payment builder test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class MultiPaymentTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_transaction()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');

        $transaction = MultiPayment::new()
            ->add('AXoXnFi4z1Z6aFvjEYkDVCtBGW2PaRiM25', 100000000)
            ->sign('This is a top secret passphrase');

        $this->assertTrue($transaction->verify());
    }
}