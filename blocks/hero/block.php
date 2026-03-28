<?php
$title    = isset($attributes['title']) ? $attributes['title'] : 'タイトルを入力';
$subtitle = isset($attributes['subtitle']) ? $attributes['subtitle'] : 'サブタイトルを入力';
$btn_text = isset($attributes['btnText']) ? $attributes['btnText'] : 'ボタン';
$btn_url  = isset($attributes['btnUrl']) ? $attributes['btnUrl'] : '#';
?>
<section class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-24 text-center">
  <div class="max-w-4xl mx-auto px-6">
    <h1 class="text-5xl font-bold mb-6"><?php echo esc_html($title); ?></h1>
    <p class="text-xl mb-10 opacity-90"><?php echo esc_html($subtitle); ?></p>
    <?php if($btn_text && $btn_url): ?>
    <a href="<?php echo esc_url($btn_url); ?>" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 px-12 rounded-full text-lg transition">
      <?php echo esc_html($btn_text); ?>
    </a>
    <?php endif; ?>
  </div>
</section>
