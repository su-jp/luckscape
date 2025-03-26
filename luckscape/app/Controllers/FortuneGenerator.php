<?php

namespace App\Controllers;

use CodeIgniter\CLI\CLI;
use CodeIgniter\RESTful\ResourceController;

class FortuneGenerator extends ResourceController
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = getenv('OPENAI_API_KEY'); // .env 파일에서 API 키 가져오기
    }

    /**
     * ChatGPT를 통해 생성한 운세 데이터를 JSON 형태로 저장
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function generate()
    {
        try {
            date_default_timezone_set('Asia/Seoul');
            $targetDate = date('Y-m-d', strtotime('+7 day'));
            $filePath = WRITEPATH . "data/{$targetDate}.json";

            // 이미 데이터 생성된 경우 중복 호출 방지
            if (file_exists($filePath)) {
                $message = '이미 생성된 운세 데이터가 있습니다.';
                log_message('warning', "filePath: $filePath :: $message");
                return ['success' => false, 'message' => "filePath: $filePath :: $message", 'foreground' => 'yellow'];
            }

            $prompt = "사주 명리학의 '일주'를 기반으로 {$targetDate}의 운세를 생성해주세요. 
                       먼저 60개의 일주를 배열로 생성하세요.
                       일주 목록 = ['갑자','을축','병인','정묘','무진','기사','경오','신미','임신','계유','갑술','을해','병자','정축','무인','기묘','경진','신사','임오','계미','갑신','을유','병술','정해','무자','기축','경인','신묘','임진','계사','갑오','을미','병신','정유','무술','기해','경자','신축','임인','계묘','갑진','을사','병오','정미','무신','기유','경술','신해','임자','계축','갑인','을묘','병진','정사','무오','기미','경신','신유','임술','계해']
                       그리고 각 일주에 대해 {$targetDate}의 운세를 2문장, {$targetDate}의 운세 상승을 위한 팁을 1문장 **한글로** 작성해주세요.
                       각각의 일주에 제공된 운세와 팁에는 **유사한 내용으로 해석되는 문장이 없어야합니다.** 모든 일주가 서로 다른 내용을 가져야합니다.
                       파일을 제공하기 전에 최종적으로 문장 유사도를 검사하고, 유사한 문장이 있으면 운세와 팁을 다시 작성하여 유사도가 낮아지도록 하세요.
                       ";

            $response = $this->callChatGPT($prompt, $targetDate);

            if (empty($response)) {
                log_message('error', '$response is null');
                return ['success' => false, 'message' => "response is null", 'foreground' => 'red'];
            }

            if (file_put_contents($filePath, $response) === false) {
                log_message('error', "$filePath 저장 실패");
                return ['success' => false, 'message' => "$filePath 저장 실패", 'foreground' => 'red'];
            }

            log_message('info', "$filePath 생성 성공");
            return ['success' => true, 'message' => "$filePath 생성 성공", 'foreground' => 'green'];
            
        } catch (\Exception $e) {
            log_message('error', $e);
            return ['success' => false, 'message' => "Error 발생 >> $e", 'foreground' => 'red'];
        }
    }

    /**
     * ChatCPT 호출
     * @param $prompt
     * @return mixed|null
     */
    private function callChatGPT($prompt, $targetDate)
    {
        try {

            $url = "https://api.openai.com/v1/chat/completions";
            $headers = [
                "Authorization: Bearer {$this->apiKey}",
                "Content-Type: application/json"
            ];
            $data = [
                "model" => "gpt-4o-mini",
                "response_format" => [
                    "type" => "json_schema",
                    "json_schema" => [
                        "name" => "{$targetDate}",
                        "schema" => [
                            "type" => "object",
                            "properties" => [
                                "운세" => [
                                    "type" => "array",
                                    "items" => [
                                        "type" => "object",
                                        "properties" => [
                                            "일주" => ["type" => "string"],
                                            "운세" => ["type" => "string"],
                                            "팁" => ["type" => "string"]
                                        ],
                                        "required" => ["일주", "운세", "팁"]
                                    ]
                                ]
                            ],
                            "required" => ["운세"]
                        ]
                    ]
                ],
                "messages" => [
                    [
                        "role" => "system",
                        "content" => "당신은 한국의 사주 명리학 전문가입니다. 사용자가 제공한 날짜를 기반으로 요청에 따라 사주명리학 기반으로 운세를 제공하세요.
                                      운세를 작성할 때에는 천간과 지지의 특성을 모두 고려하며, 제공된 날짜와 일주의 천간/지지와 합을 고려하여 충합형을 같이 반영하세요.
                                      지정된 날짜에 해당하는 하루치 운세만 작성해 주세요. 전체 해(2025년)의 운세나 주간/월간 운세는 작성하지 마세요. 각 일주별로 그 날 하루에만 해당하는 운세와 팁을 생성해 주세요.
                                      각 일주 별 운세 내용에 **표현이 겹치거나 비슷한 흐름이 있으면 안 됩니다.** 60개의 일주의 운세와 팁에 각각 다르게 해석되어야 합니다.
                                      내용에서 부정적인 표현은 피하고, 긍정적이거나 중립적으로 표현하세요."
                    ],
                    ["role" => "user", "content" => $prompt]
                ],
                "temperature" => 0.7
            ];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            $result = curl_exec($ch);
            curl_close($ch);

            log_message('debug', $result);

            $decodedResult = $result ? json_decode($result, true) : null;
            $success = !isset($decodedResult['error']);

            if (!$success) {
                log_message('error', 'success is false!');
                log_message('error', json_encode($decodedResult['error']));
                throw new \Exception(json_encode($decodedResult['error']));
            }

            return $result ? json_decode($result, true)["choices"][0]["message"]["content"] : null;

        } catch (\Exception $e) {
            log_message('error', "ChatGPT API 호출 에러 발생");
            log_message('error', $e);
            CLI::write('ChatGPT API 호출 에러 발생', 'red');
            CLI::write($e, 'red');
            return null;
        }
    }
}
