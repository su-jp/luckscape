<?php include(APPPATH . 'Views/layout/header.php'); ?>
    <section class="space-y-4 mt-4">
        <section class="mt-6 mb-4 text-center">
            <div class="bg-white/80 backdrop-blur-md rounded-lg p-5 shadow-lg">
                <h2 class="text-xl font-bold text-primary mb-4">📩 Contact Us</h2>
                <p>문의사항이 있으시면 아래로 연락 주세요.</p>
            </div>
        </section>
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-lg font-bold text-primary mb-3">EMAIL</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <p>📧 <?= getenv('CONTACT_EMAIL') ?></p>
            </div>
        </div>
    </section>
<?php include(APPPATH . 'Views/layout/footer.php'); ?>