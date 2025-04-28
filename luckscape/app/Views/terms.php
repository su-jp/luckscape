<?php include(APPPATH . 'Views/layout/header.php'); ?>
    <section class="space-y-4 mt-4">
        <section class="mt-6 mb-4 text-center">
            <div class="bg-white/80 backdrop-blur-md rounded-lg p-5 shadow-lg">
                <h2 class="text-xl font-bold text-primary mb-4">📜 이용약관</h2>
                <p>LuckScape(이하 "회사" 또는 "운세 서비스")를 이용해 주셔서 감사합니다. 본 서비스 이용과 관련하여 다음 사항을 숙지해 주세요.</p>
            </div>
        </section>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-lg font-bold text-primary mb-3">1. 서비스 제공 및 목적</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <p>- 본 서비스는 사용자의 생년월일을 입력받아 일주를 기반으로 운세를 제공하는 웹사이트입니다.</p>
                <p>- 사용자는 본 서비스를 개인적인 용도로 이용할 수 있으며, 상업적 목적의 재판매, 복사, 배포는 금지됩니다.</p>
            </div>
        </div>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-lg font-bold text-primary mb-3">2. 개인정보 보호</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <p>- 본 서비스는 사용자의 생년월일을 운세 계산에만 활용하며, 별도로 저장하지 않습니다.</p>
                <p>- 입력된 개인정보는 서비스 제공이 끝난 후 즉시 폐기됩니다.</p>
            </div>
        </div>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-lg font-bold text-primary mb-3">3. 서비스 이용 제한</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <p>- 사용자는 본 서비스를 비정상적인 방법(스크래핑, 자동화 봇 등)으로 이용할 수 없습니다.</p>
                <p>- 서비스 운영을 방해하거나 타인의 권리를 침해하는 행위는 금지됩니다.</p>
            </div>
        </div>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-lg font-bold text-primary mb-3">4. 면책 조항</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <p>- 본 서비스에서 제공하는 운세 정보는 참고용이며, 이를 기반으로 한 법적, 재정적, 의학적 결정은 사용자 본인의 책임입니다.</p>
                <p>- 서비스 오류, 데이터 누락, 기타 기술적 문제로 인해 발생한 손해에 대해 회사는 책임을 지지 않습니다.</p>
            </div>
        </div>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-lg font-bold text-primary mb-3">5. 광고 및 제휴 프로그램</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <p>- 본 사이트는 Google AdSense 및 제휴 마케팅 프로그램을 활용하여 광고를 제공할 수 있습니다.</p>
                <p>- 광고 콘텐츠는 본 서비스의 관리 범위를 벗어날 수 있으며, 광고 클릭 및 이용은 사용자의 책임입니다.</p>
            </div>
        </div>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-lg font-bold text-primary mb-3">6. 서비스 변경 및 종료</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <p>- 회사는 필요에 따라 서비스 내용을 변경하거나 종료할 수 있으며, 중대한 변경 사항은 사전 공지합니다.</p>
                <p>- 사용자는 언제든지 서비스를 자유롭게 이용 또는 중단할 수 있습니다.</p>
            </div>
        </div>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-lg font-bold text-primary mb-3">7. 약관 개정 및 공지</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <p>- 본 이용약관은 필요 시 변경될 수 있으며, 변경 시 공지사항을 통해 알립니다.</p>
                <p>- 변경된 이용약관은 공지 후 즉시 효력이 발생합니다.</p>
            </div>
        </div>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-lg font-bold text-primary mb-3">8. 문의 사항</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <p>- 본 이용약관과 관련하여 궁금한 점이 있다면 아래 이메일로 문의 바랍니다.</p>
                <p>- 이메일: <?= getenv('CONTACT_EMAIL') ?></p>
            </div>
        </div>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <p>본 이용약관은 2025년 4월 1일부터 시행됩니다.</p>
        </div>
    </section>
<?php include(APPPATH . 'Views/layout/footer.php'); ?>