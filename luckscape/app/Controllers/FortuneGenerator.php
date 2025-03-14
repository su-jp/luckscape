<?php

namespace App\Controllers;

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
            $targetDate = date('Y-m-d', strtotime('+1 day')); // TODO: 일주일 후 날짜로 추후 수정

            $prompt = "사주 명리학의 '일주'를 기반으로 {$targetDate}의 운세를 생성해주세요. 
                       60개의 일주(갑자, 을축, 병인, 정묘 ...)에 대해 각각 간단한 운세를 2~3문장으로 작성해주세요.
                       또한 {$targetDate}의 운세 상승을 위한 팁을 각 일주마다 1문장 작성해주세요.
                       ";

            $response = $this->callChatGPT($prompt, $targetDate);

            log_message('info', 'callChatGPT $response');
            log_message('info', $response ?? 'Null');

            if ($response) {
                file_put_contents(WRITEPATH . "data/{$targetDate}.json", $response);
                return $this->respond(['message' => '운세 데이터가 생성되었습니다.']);
            } else {
                log_message('error', '$response is null');
            }

            return $this->fail('운세 데이터를 생성하는데 실패했습니다.');
        } catch (\Exception $e) {
            log_message('error', $e);
            return $this->fail('운세 데이터를 생성하는데 실패했습니다.');
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
                        "content" => "요청에 따라 사주명리학 기반으로 운세를 제공하세요. 운세를 작성할 때에는 천간과 지지의 특성을 모두 고려하며, 제공된 날짜와 일주의 천간/지지와 합을 고려하여 충합형을 같이 반영하세요.
                                       내용에서 부정적인 표현은 피하고, 긍정적이거나 중립적으로 표현하세요. 운세 내용에 동일한 문장이 단 한 문장도 없어야 합니다. 60개의 일주 모두에 대해 응답하세요. 빠뜨리는 일주가 없어야 합니다."
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
            return null;
        }
    }
}
