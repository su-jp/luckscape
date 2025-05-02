<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class FortuneController extends ResourceController
{
    /**
     * @return RedirectResponse|string
     * @throws Exception
     */
    public function showFortune(): string|RedirectResponse
    {
        log_message('info', 'showFortune 시작');
        $request = \Config\Services::request();
        $date = $request->getPost('date') ?? null;
        $ilju = $request->getPost('ilju') ?? null;

        if (!$date || !$ilju) {
            log_message('error', '필수값 부족');
            return redirect()->back()->withInput()->with('error', '필수값이 부족합니다.');
        }

        $response = $this->getFortune($date, $ilju);

        if (!$response['success']) {
            return redirect()->back()->withInput()->with('error', $response['message']);
        }

        $dateTime = new \DateTime($date);
        $content = $response['data']['운세'] ?? null;
        $content = $content = preg_replace("/([.?!])\s*/", "$1<br>", $content);
        
        log_message('info', 'showFortune 종료');

        return view('fortune', [
            'date' => $dateTime->format('Y년 n월 j일'),
            'ilju' => $ilju,
            'fortune' => $content,
            'tip' => $response['data']['팁'] ?? null
        ]);
    }

    /**
     * @param $date string 날짜 (YYYY-MM-DD)
     * @param $ilju string 일주
     * @return array
     */
    public function getFortune(string $date, string $ilju): array
    {
        try {
            log_message('info', "getFortune >> $date, $ilju");

            $ilju = urldecode($ilju);
            $filePath = WRITEPATH . "data/{$date}.json";

            if (!file_exists($filePath)) {
                $msg = '해당 날짜의 운세가 없습니다.';
                log_message('error', "getFortune error: $msg");
                return ['success' => false, 'message' => $msg];
            }

            $json = file_get_contents($filePath);
            $data = json_decode($json, true);

            if (!isset($data['운세'])) {
                $msg = '운세 데이터 형식에 오류가 있습니다.';
                log_message('error', "getFortune error: $msg");
                return ['success' => false, 'message' => $msg];
            }

            // 일주에 해당하는 데이터 찾기
            $match = array_filter($data['운세'], fn($item) => $item['일주'] === $ilju);
            $match = array_values($match); // index 재정렬

            if (empty($match)) {
                $msg = '해당 일주의 운세를 찾을 수 없습니다.';
                log_message('error', "getFortune error: $msg");
                return ['success' => false, 'message' => $msg];
            }

            return ['success' => true, 'data' => $match[0]];
        } catch (Exception $e) {
            log_message('error', $e);
            return ['success' => false, 'message' => '운세를 조회하던 중 오류가 발생했습니다.'];
        }
    }

}
