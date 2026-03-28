<?php
// スタイル読み込み
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('lightning-child-style', get_stylesheet_uri(), ['lightning-style']);
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@700&display=swap', [], null);
    // ScrollReveal
    wp_enqueue_script('scrollreveal', 'https://unpkg.com/scrollreveal@4/dist/scrollreveal.min.js', [], null, true);
    wp_enqueue_script('lightning-child-main', get_stylesheet_directory_uri() . '/js/main.js', ['scrollreveal'], '1.0.0', true);
});

// ============================================
// カスタム投稿タイプ：実績
// ============================================
add_action('init', function() {
    register_post_type('works', [
        'labels' => [
            'name'          => '実績',
            'singular_name' => '実績',
            'add_new'       => '新規追加',
            'add_new_item'  => '実績を追加',
            'edit_item'     => '実績を編集',
            'menu_name'     => '実績',
        ],
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-portfolio',
        'menu_position' => 5,
        'supports'      => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite'       => ['slug' => 'works'],
        'show_in_rest'  => true,
    ]);

    // ============================================
    // カスタム投稿タイプ：スタッフ
    // ============================================
    register_post_type('staff', [
        'labels' => [
            'name'          => 'スタッフ',
            'singular_name' => 'スタッフ',
            'add_new'       => '新規追加',
            'add_new_item'  => 'スタッフを追加',
            'edit_item'     => 'スタッフを編集',
            'menu_name'     => 'スタッフ',
        ],
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-groups',
        'menu_position' => 6,
        'supports'      => ['title', 'editor', 'thumbnail'],
        'rewrite'       => ['slug' => 'staff'],
        'show_in_rest'  => true,
    ]);
});

// ============================================
// ACFカスタムフィールド定義
// ============================================
add_action('acf/init', function() {
    if (!function_exists('acf_add_local_field_group')) return;

    // 実績フィールド
    acf_add_local_field_group([
        'key'      => 'group_works',
        'title'    => '実績詳細',
        'fields'   => [
            ['key' => 'field_works_client',   'label' => 'クライアント名', 'name' => 'works_client',   'type' => 'text'],
            ['key' => 'field_works_category', 'label' => '業種・カテゴリ', 'name' => 'works_category', 'type' => 'text'],
            ['key' => 'field_works_url',      'label' => 'サイトURL',     'name' => 'works_url',      'type' => 'url'],
            ['key' => 'field_works_year',     'label' => '制作年',        'name' => 'works_year',     'type' => 'number'],
            ['key' => 'field_works_tags',     'label' => '使用技術',      'name' => 'works_tags',     'type' => 'text', 'instructions' => 'カンマ区切りで入力（例：WordPress, Lightning, ACF）'],
        ],
        'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => 'works']]],
    ]);

    // スタッフフィールド
    acf_add_local_field_group([
        'key'      => 'group_staff',
        'title'    => 'スタッフ情報',
        'fields'   => [
            ['key' => 'field_staff_position', 'label' => '役職',     'name' => 'staff_position', 'type' => 'text'],
            ['key' => 'field_staff_message',  'label' => 'ひとこと', 'name' => 'staff_message',  'type' => 'textarea'],
        ],
        'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => 'staff']]],
    ]);
});

// Tailwind CSS
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('tailwind', get_stylesheet_directory_uri() . '/tailwind.css', [], '1.0.0');
});

// カスタムブロック登録
add_action('init', function() {
    register_block_type(get_stylesheet_directory() . '/blocks/hero');
});
