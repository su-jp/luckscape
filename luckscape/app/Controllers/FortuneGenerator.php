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
            // TODO: 일주일 후 데이터를 생성하도록 추후 수정
            $prompt = "사주 명리학의 '일주'를 기반으로 내일의 운세를 생성해주세요. 
                       각 일주(甲子, 乙丑, 丙寅, ... 癸亥)에 대해 간단한 운세를 2~3줄로 작성해주세요.
                       반환 형식은 JSON이어야 합니다.";

            $response = $this->callChatGPT($prompt);

            logger()->info('callChatGPT $response');
            logger()->info($response);

            if ($response) {
                $fileName = date('Y-m-d', strtotime('+1 day')); // TODO: 일주일 후 날짜로 추후 수정
                file_put_contents(WRITEPATH . "data/{$fileName}.json", $response);
                return $this->respond(['message' => '운세 데이터가 생성되었습니다.']);
            }

            return $this->fail('운세 데이터를 생성하는데 실패했습니다.');
        } catch (\Exception $e) {
            logger()->error($e);
            return $this->fail('운세 데이터를 생성하는데 실패했습니다.');
        }
    }

    /**
     * ChatCPT 호출
     * @param $prompt
     * @return mixed|null
     */
    private function callChatGPT($prompt)
    {
        try {

            $url = "https://api.openai.com/v1/chat/completions";
            $headers = [
                "Authorization: Bearer {$this->apiKey}",
                "Content-Type: application/json"
            ];
            $data = [
                "model" => "gpt-4",
                "messages" => [["role" => "user", "content" => $prompt]],
                "temperature" => 0.7
            ];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            $result = curl_exec($ch);
            curl_close($ch);

            return $result ? json_decode($result, true)["choices"][0]["message"]["content"] : null;
        } catch (\Exception $e) {
            logger()->error($e);
            return null;
        }
    }
}
