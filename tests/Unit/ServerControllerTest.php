<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 24.03.18
 * Time: 2:02
 */

namespace Tests\Unit;


use Tests\TestCase;

class ServerControllerTest extends TestCase
{
    public function testIndex() {
        $this->get("/");
    }

    public function testDetail() {
        $this->get("/services/vng");
    }
}