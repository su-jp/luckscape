<?php include(APPPATH . 'Views/layout/header.php'); ?>
    <h2 class="mb-4">오늘의 운세</h2>

    <div class="card text-center">
        <h4>🗓️ <?= $date ?? '선택된 날짜 없음' ?></h4>
        <h5><?= $fortune ?? '운세 데이터 없음' ?></h5>
        <h5><?= $tip ?? '팁 데이터 없음' ?></h5>
    </div>

    <script>
    </script>
<?php include(APPPATH . 'Views/layout/footer.php'); ?>