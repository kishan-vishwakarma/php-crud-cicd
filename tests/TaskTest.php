<?php
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase {
    public function testDatabaseConnection() {
        require __DIR__ . '/../db.php';
        $this->assertNotNull($pdo);
    }
}