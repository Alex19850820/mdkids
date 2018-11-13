<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 14.03.2018
 * Time: 14:10
 */
if (!defined( 'FW' )) die('Forbidden');

$options = array(
	'main' => array(
		'type' => 'box',
		'title' => __('Тексты для записи', '{domain}'),
		'options' => array(
//			'body-color' => array(
//				'type' => 'color-picker',
//				'label' => __('Body Color', '{domain}'),
//				'value' => '#ADFF2F',
//			),
			'price_old' => [
				'type' => 'text',
				'label' => __('Цена старая', '{domain}'),
				'value' => '',
			],
			'price_new' => [
				'type' => 'text',
				'label' => __('Цена новая', '{domain}'),
				'value' => '',
			],
			'description' => [
				'type' => 'textarea',
				'label' => __('Описание', '{domain}'),
				'value' => '',
			],
			'description2' => [
				'type' => 'textarea',
				'label' => __('Описание2', '{domain}'),
				'value' => '',
			],
			'img' => [
				'type' => 'upload',
				'label' => __('Картинка новости 2', '{domain}'),
				'value' => '',
				'images_only' => true,
			],
			'article' => [
				'type' => 'text',
				'label' => __('Артикул', '{domain}'),
				'value' => '',
			],
			'metal' => [
				'type' => 'text',
				'label' => __('Метал', '{domain}'),
				'value' => '',
			],
			'weight' => [
				'type' => 'text',
				'label' => __('Вес', '{domain}'),
				'value' => '',
			],
			'color' => [
				'type' => 'addable-popup',
				'label' => __('Добавить цвет', '{domain}'),
				'template' => '{{- text }}',
				'size' => 'large', // small, medium, large
				'limit' => 0, // limit the number of popup`s that can be added
				'add-button-text' => __('добавить', '{domain}'),
				'sortable' => true,
				'popup-options' => [
					'text' => [
						'type' => 'text',
						'label' => __('Цвет', '{domain}'),
						'value' => '',
					],
				],
			],
			'size' => [
				'type' => 'text',
				'label' => __('Размер', '{domain}'),
				'value' => '',
			],
			'img_slider' => [
				'type' => 'multi-upload',
				'label' => __('Слайдер продукта', '{domain}'),
				'value' => [],
				'images_only' => true,
			],
			
		),
	),
);