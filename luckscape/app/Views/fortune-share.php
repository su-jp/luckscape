<style>
    .fortune-share-card {
        width: 1080px;
        height: 1920px;
        background: linear-gradient(180deg, #2e1e4d 0%, #3e2d6d 100%);
        color: #fff;
        font-family: 'Apple SD Gothic Neo', 'Noto Sans KR', sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 80px 60px;
        box-sizing: border-box;
        text-align: center;
        position: relative;
    }

    .fortune-share-logo {
        position: absolute;
        top: 24px;
        left: 50%;
        transform: translateX(-50%);
        font-family: 'Pacifico', cursive;
        font-size: 48px;
        color: #fff;
    }

    .share-date {
        font-size: 36px;
        color: #cdbdff;
        margin-bottom: 20px;
    }

    .share-title {
        font-size: 48px;
        font-weight: bold;
        color: #e0d4ff;
        margin-bottom: 40px;
    }

    .share-text {
        font-size: 36px;
        line-height: 1.6;
        margin-bottom: 60px;
        padding: 0 40px;
    }

    .share-tip {
        font-size: 32px;
        background: rgba(255, 255, 255, 0.15);
        padding: 8px 30px 32px 30px;
        border-radius: 20px;
        margin-bottom: 100px;
        color: #e4f0ff;
    }

    .share-footer {
        position: absolute;
        bottom: 60px;
        font-size: 28px;
        color: #b0a0e0;
    }
</style>
<!-- 운세 공유용 이미지 영역 -->
<div class="fortune-share-card">
    <div class="fortune-share-logo">LuckScape</div>
    <div class="share-date"><?= $date ?? '선택된 날짜 없음' ?></div>
    <div class="share-title"><?= $ilju ?? '일주 정보 없음' ?>일주 운세</div>
    <div class="share-text"><?= $fortune ?? '운세 데이터 없음' ?></div>
    <div class="share-tip">🌟 <?= $tip ?? '팁 데이터 없음' ?></div>
    <div class="share-footer">powered by LuckScape 🍀</div>
</div>