<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/*
 * Настройки сайта (телефоны, соц-сети и пр.)
 * Список всех возможных опицй http://manual.unyson.io/en/latest/options/built-in/introduction.html
 */
$options = [
	'panel_contacts' => [
		'title'   => __( 'Контакты', '{domain}' ),
		'options' => [
			'phone' => [
				'type'  => 'text',
				'label' => __( 'Телефон', '{domain}' ),
				'value' => '8 (831) 123-45-67',
			],
			'email' => [
				'type'  => 'text',
				'label' => __( 'E-mail', '{domain}' ),
				'value' => 'info@matthewdanielkidsjewellery.ru',
			],
			'vk' => [
				'type'  => 'text',
				'label' => __( 'VK', '{domain}' ),
				'value' => '',
			],
			'facebook' => [
				'type'  => 'text',
				'label' => __( 'Facebook', '{domain}' ),
				'value' => '',
			],
			'telegram' => [
			'type'  => 'text',
				'label' => __( 'Telegram', '{domain}' ),
				'value' => '',
			],
			'instagram' => [
				'type'  => 'text',
				'label' => __( 'Instagram', '{domain}' ),
				'value' => '',
			],
			'google_plus' => [
				'type'  => 'text',
				'label' => __( 'Google +', '{domain}' ),
				'value' => '',
			],
			'youtube' => [
				'type'  => 'text',
				'label' => __( 'Youtube', '{domain}' ),
				'value' => '',
			],
			'twitter' => [
				'type'  => 'text',
				'label' => __( 'Twitter', '{domain}' ),
				'value' => '',
			],
		],
	],
	'footer' => [
		'title'   => __( 'Футер', '{domain}' ),
		'options' => [
			'more' => [
				'type'  => 'text',
				'label' => __( 'Текст', '{domain}' ),
				'value' => '',
			],
			'order' => [
				'type'  => 'text',
				'label' => __( 'Текст', '{domain}' ),
				'value' => '',
			],
			'horder' => [
				'type'  => 'text',
				'label' => __( 'Ссылка', '{domain}' ),
				'value' => '#',
			],
			'new_build' => [
				'type' => 'addable-popup',
				'label' => __('Добавить информацию', '{domain}'),
				'template' => '{{- text }}',
				'size' => 'large', // small, medium, large
				'limit' => 0, // limit the number of popup`s that can be added
				'add-button-text' => __('добавить', '{domain}'),
				'sortable' => true,
				'popup-options' => [
					'text' => [
						'type'  => 'text',
						'label' => __( 'Заголовок блока', '{domain}' ),
						'value' => '',
					],
					'new_build' => [
						'type' => 'addable-popup',
						'label' => __('Добавить информацию блока', '{domain}'),
						'template' => '{{- text }}',
						'size' => 'large', // small, medium, large
						'limit' => 0, // limit the number of popup`s that can be added
						'add-button-text' => __('добавить', '{domain}'),
						'sortable' => true,
						'popup-options' => [
							'text' => [
								'type'  => 'text',
								'label' => __( 'Текст', '{domain}' ),
								'value' => '',
							],
							'href' => [
									'type'  => 'text',
									'label' => __( 'Ссылка', '{domain}' ),
									'value' => '#',
							],
						],
					],
				],
			],
		],
	],
];


