<?php
/**
 * Short description for namespaceTest.php
 *
 * @package namespaceTest
 * @author Ryan Vlaming <ryanvlaming@icloud.com>
 * @version 0.1
 * @copyright (C) 2017 Ryan Vlaming <ryanvlaming@icloud.com>
 * @license MIT
 */
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use lists\Collection;

final class NamespaceTest extends TestCase {
    public function testsClassExistance() {
        $app = virp::init();
        $testNamespace = $app::virpspace('ducks');
        $testNamespace->doSomething((function ($a){
            printf("%sc",$a[0]);
        }));
        $copyNamespace = $app::virpspace('ducks');
        $this->assertThat(
            $app::virpspace('ducks'),
            $this->equalTo($copyNamespace)
        );
    }
}

?>
