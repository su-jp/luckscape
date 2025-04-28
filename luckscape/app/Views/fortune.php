<?php include(APPPATH . 'Views/layout/header.php'); ?>
    <section class="mt-6 mb-8 text-center">
        <div class="bg-white/80 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-xl font-bold text-primary mb-2">오늘의 운세</h2>
            <p class="text-sm text-gray-700">
                <?= $ilju ?? '일주 정보 없음' ?> 일주의 🗓️ <?= $date ?? '선택된 날짜 없음' ?> 운세
            </p>
        </div>
    </section>
    <section class="mb-8 text-center">
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h3 class="text-lg font-medium text-primary mb-3">
                <?= $fortune ?? '운세 데이터 없음' ?>
            </h3>
            <p class="text-sm text-gray-700 mb-4">
                💡 <?= $tip ?? '팁 데이터 없음' ?>
            </p>
        </div>
    </section>
    <script>
    </script>
<?php include(APPPATH . 'Views/layout/footer.php'); ?>