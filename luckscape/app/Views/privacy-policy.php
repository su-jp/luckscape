<?php include(APPPATH . 'Views/layout/header.php'); ?>
    <section class="space-y-4 mt-4">
        <section class="mt-6 mb-4 text-center">
            <div class="bg-white/80 backdrop-blur-md rounded-lg p-5 shadow-lg">
                <h2 class="text-xl font-bold text-primary mb-4">🔒 개인정보 처리방침</h2>
                <p>
                    LuckScape(이하 "회사" 또는 "운세 서비스")는 사용자의 개인정보를 중요하게 생각하며, 다음과 같이 개인정보 처리 방침을 안내드립니다.
                </p>
            </div>
        </section>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-lg font-bold text-primary mb-3">1. 수집하는 개인정보 항목 및 수집 방법</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <p>- 본 서비스는 사용자의 생년월일을 입력받아 운세(일주)를 계산하는 용도로만 활용하며, 별도로 저장하지 않습니다.</p>
                <p>- 사용자가 입력한 생년월일 정보는 단순히 운세 제공을 위한 즉시 처리 후 폐기됩니다.</p>
            </div>
        </div>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-lg font-bold text-primary mb-3">2. 개인정보의 이용 목적</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <p>- 생년월일 정보를 기반으로 운세(일주) 분석을 제공하는 기능을 수행합니다.</p>
                <p>- 입력된 정보는 서비스 제공을 위한 일회성 처리에만 사용되며, 어떠한 형태로도 저장되지 않습니다.</p>
            </div>
        </div>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-lg font-bold text-primary mb-3">3. 개인정보의 보관 및 삭제</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <p>- 본 서비스는 개인정보를 저장하지 않으므로, 이용 종료 시 사용자의 정보는 즉시 삭제됩니다.</p>
                <p>- 따라서, 개인정보의 열람·정정·삭제 등의 요청이 필요하지 않습니다.</p>
            </div>
        </div>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-lg font-bold text-primary mb-3">4. 개인정보의 제3자 제공</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <p>- 본 서비스는 사용자의 개인정보를 어떠한 제3자에게도 제공하지 않습니다.</p>
                <p>- 단, 법령에 따라 수사기관, 정부 기관의 요청이 있을 경우 관련 법률에 따라 제공될 수 있습니다.</p>
            </div>
        </div>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-lg font-bold text-primary mb-3">5. 개인정보 보호를 위한 기술적·관리적 조치</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <p>- 사용자의 개인정보를 저장하지 않으므로, 데이터 유출 등의 보안 이슈가 발생하지 않도록 설계되었습니다.</p>
                <p>- 사이트 운영에 필요한 최소한의 정보만을 처리하며, 보안 강화를 위해 정기적으로 보안 점검을 실시합니다.</p>
            </div>
        </div>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-lg font-bold text-primary mb-3">6. 쿠키 및 광고 정책</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <p>- 본 사이트는 Google AdSense 등의 광고 서비스를 이용할 수 있으며, 이를 위해 쿠키를 사용할 수 있습니다.</p>
                <p>- 사용자는 웹 브라우저 설정을 통해 쿠키 사용을 거부할 수 있습니다.</p>
            </div>
        </div>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-lg font-bold text-primary mb-3">7. 개인정보 보호책임자 및 문의처</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <p>- 본 서비스 운영자는 개인정보 보호 관련 문의를 받을 수 있습니다.</p>
                <p>- 이메일: <?= getenv('CONTACT_EMAIL') ?> (문의 가능 시간: 평일 09:00~18:00)</p>
            </div>
        </div>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <p>본 개인정보처리방침은 2025년 4월 1일부터 시행됩니다.</p>
        </div>
    </section>
<?php include(APPPATH . 'Views/layout/footer.php'); ?>