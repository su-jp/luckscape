<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class FortuneController extends ResourceController
{
    /**
     * 운세 데이터 표출
     * @param $date
     * @return string
     */
    public function showFortune()
    {
        return view('fortune', [
            'date' => '0000-00-00',
            'fortune' => '운세 내용',
            'tip' => '팁 내용'
        ]);
    }
}
