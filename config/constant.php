<?php
/**
 * This is the file use to create any available have not change
 */
return [
	"main" => [
		"app_name" => "shop Noha",
	],

	"status" => [
		"default" => [
			"title" => "Trạng Thái",
			"attribute" => [
				[
					'id' => 1,
					'name' => "Hiện Thị"
				],
				[
					'id' => 2,
					'name' => "Không Hiện Thị"
				]
			]
		],
		"custom" => [
			"title" => "Trạng Thái",
			"attribute" => [
				1 => "Hiện Thị",
				2 => "Ẩn Tin",
				3 => "Đợi Duyệt",
				4 => "Từ Chối",
			]
		]
		
	],
	"roles" => [
		"admin" => [1, 2, 3],
		"view" => [
			[
				'id' => 1,
				'name' => "Administrator"
			],
			[
				'id' => 2,
				'name' => "Editor Articles"
			],
			[
				'id' => 3,
				'name' => "Editor Products"
			],
			[
				'id' => 4,
				'name' => "Member"
			]
		]
	]
];