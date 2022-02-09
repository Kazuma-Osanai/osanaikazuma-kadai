$(function() {
    $('#calendar').datepicker({
        numberOfMonths:2,
        duration: 250,  // 指定ミリ秒の時間をかける
        showAnim: 'slideDown', // スライドダウンで表示する
        showButtonPanel: true     // 「今日」と「閉じる」のボタン
    });
  });