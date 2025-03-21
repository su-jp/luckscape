<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Controllers\FortuneGenerator;

class FortuneCommand extends BaseCommand
{
    protected $group       = 'custom';
    protected $name        = 'fortune:generate';
    protected $description = '매일 자정에 운세 데이터를 생성합니다.';

    public function run(array $params)
    {
        $controller = new FortuneGenerator();
        $result = $controller->generate();
        CLI::write($result['success'].' >> '.$result['message'], $result['foreground']);
    }
}