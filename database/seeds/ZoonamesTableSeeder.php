<?php

use Illuminate\Database\Seeder;

class ZoonamesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table("zoonames")->insert(
			[
				"id" => "1",
				"prefucture_id" => "北海道",
				"zooname" => "おびひろ動物園",
			],
			[
				"id" => "2",
				"prefucture_id" => "北海道",
				"zooname" => "釧路市動物園",
			],
			[
				"id" => "3",
				"prefucture_id" => "北海道",
				"zooname" => "札幌市円山動物園",
			],
			[
				"id" => "4",
				"prefucture_id" => "北海道",
				"zooname" => "ノースサファリサッポロ",
			],
			[
				"id" => "5",
				"prefucture_id" => "岩手",
				"zooname" => "岩手サファリパーク",
			],
			[
				"id" => "6",
				"prefucture_id" => "宮城",
				"zooname" => "八木山動物公園",
			],
			[
				"id" => "7",
				"prefucture_id" => "秋田",
				"zooname" => "秋田市大森山動物園",
			],
			[
				"id" => "8",
				"prefucture_id" => "茨城",
				"zooname" => "日立市かみね動物園",
			],
			[
				"id" => "9",
				"prefucture_id" => "栃木",
				"zooname" => "那須ワールドモンキーパーク",
			],
			[
				"id" => "10",
				"prefucture_id" => "群馬",
				"zooname" => "桐生が岡動物園",
			],
			[
				"id" => "11",
				"prefucture_id" => "群馬",
				"zooname" => "草津熱帯圏",
			],
			[
				"id" => "12",
				"prefucture_id" => "群馬",
				"zooname" => "群馬サファリパーク",
			],
			[
				"id" => "13",
				"prefucture_id" => "埼玉",
				"zooname" => "大宮公園小動物園",
			],
			[
				"id" => "14",
				"prefucture_id" => "埼玉",
				"zooname" => "キャンベルタウン野鳥の森",
			],
			[
				"id" => "15",
				"prefucture_id" => "埼玉",
				"zooname" => "埼玉県こども動物自然公園",
			],
			[
				"id" => "16",
				"prefucture_id" => "埼玉",
				"zooname" => "狭山市立智光山公園こども動物園",
			],
			[
				"id" => "17",
				"prefucture_id" => "千葉",
				"zooname" => "市原ぞうの国",
			],
			[
				"id" => "18",
				"prefucture_id" => "千葉",
				"zooname" => "Sayuri World",
			],
			[
				"id" => "19",
				"prefucture_id" => "千葉",
				"zooname" => "千葉市動物公園",
			],
			[
				"id" => "20",
				"prefucture_id" => "東京",
				"zooname" => "足立区生物園",
			],
			[
				"id" => "21",
				"prefucture_id" => "東京",
				"zooname" => "恩賜上野動物園",
			],
			[
				"id" => "22",
				"prefucture_id" => "東京",
				"zooname" => "多摩動物公園",
			],
			[
				"id" => "23",
				"prefucture_id" => "東京",
				"zooname" => "羽村市動物公園",
			],
			[
				"id" => "24",
				"prefucture_id" => "東京",
				"zooname" => "町田リス園",
			],
			[
				"id" => "25",
				"prefucture_id" => "神奈川",
				"zooname" => "相模原麻溝公園ふれあい動物広場",
			],
			[
				"id" => "26",
				"prefucture_id" => "神奈川",
				"zooname" => "夢見ケ崎動物公園",
			],
			[
				"id" => "27",
				"prefucture_id" => "神奈川",
				"zooname" => "横浜市立野毛山動物園",
			],
			[
				"id" => "28",
				"prefucture_id" => "神奈川",
				"zooname" => "よこはま動物園ズーラシア",
			],
			[
				"id" => "29",
				"prefucture_id" => "富山",
				"zooname" => "高岡古城公園動物園",
			],
			[
				"id" => "30",
				"prefucture_id" => "富山",
				"zooname" => "富山市ファミリーパーク",
			],
			[
				"id" => "31",
				"prefucture_id" => "石川",
				"zooname" => "いしかわ動物園",
			],
			[
				"id" => "32",
				"prefucture_id" => "長野",
				"zooname" => "小諸市動物園",
			],
			[
				"id" => "33",
				"prefucture_id" => "長野",
				"zooname" => "須坂市動物園",
			],
			[
				"id" => "34",
				"prefucture_id" => "長野",
				"zooname" => "茶臼山動物園",
			],
			[
				"id" => "35",
				"prefucture_id" => "静岡",
				"zooname" => "伊豆シャボテン公園",
			],
			[
				"id" => "36",
				"prefucture_id" => "静岡",
				"zooname" => "静岡市立日本平動物園",
			],
			[
				"id" => "37",
				"prefucture_id" => "静岡",
				"zooname" => "浜松市動物園",
			],
			[
				"id" => "38",
				"prefucture_id" => "愛知",
				"zooname" => "岡崎市東公園動物園",
			],
			[
				"id" => "39",
				"prefucture_id" => "三重",
				"zooname" => "大内山動物園",
			],
			[
				"id" => "40",
				"prefucture_id" => "京都",
				"zooname" => "京都市動物園",
			],
			[
				"id" => "41",
				"prefucture_id" => "兵庫",
				"zooname" => "赤穂海浜公園 動物ふれあい村",
			],
			[
				"id" => "42",
				"prefucture_id" => "兵庫",
				"zooname" => "淡路ファームパーク イングランドの丘",
			],
			[
				"id" => "43",
				"prefucture_id" => "兵庫",
				"zooname" => "神戸市立王子動物園",
			],
			[
				"id" => "44",
				"prefucture_id" => "兵庫",
				"zooname" => "神戸どうぶつ王国",
			],
			[
				"id" => "45",
				"prefucture_id" => "兵庫",
				"zooname" => "姫路市立動物園",
			],
			[
				"id" => "46",
				"prefucture_id" => "和歌山",
				"zooname" => "和歌山公園動物園",
			],
			[
				"id" => "47",
				"prefucture_id" => "岡山",
				"zooname" => "池田動物園",
			],
			[
				"id" => "48",
				"prefucture_id" => "岡山",
				"zooname" => "渋川動物公園",
			],
			[
				"id" => "49",
				"prefucture_id" => "広島",
				"zooname" => "広島市安佐動物公園",
			],
			[
				"id" => "50",
				"prefucture_id" => "広島",
				"zooname" => "福山市立動物園",
			],
			[
				"id" => "51",
				"prefucture_id" => "山口",
				"zooname" => "宇部市ときわ動物園",
			],
			[
				"id" => "52",
				"prefucture_id" => "山口",
				"zooname" => "周南市徳山動物園",
			],
			[
				"id" => "53",
				"prefucture_id" => "愛知",
				"zooname" => "愛媛県立とべ動物園",
			],
			[
				"id" => "54",
				"prefucture_id" => "高知",
				"zooname" => "高知県立のいち動物公園",
			],
			[
				"id" => "55",
				"prefucture_id" => "高知",
				"zooname" => "わんぱーくこうちアニマルランド",
			],
			[
				"id" => "56",
				"prefucture_id" => "福岡",
				"zooname" => "到津の森公園",
			],
			[
				"id" => "57",
				"prefucture_id" => "福岡",
				"zooname" => "大牟田市動物園",
			],
			[
				"id" => "58",
				"prefucture_id" => "福岡",
				"zooname" => "久留米市鳥類センター",
			],
			[
				"id" => "59",
				"prefucture_id" => "福岡",
				"zooname" => "ピクニカ共和国",
			],
			[
				"id" => "60",
				"prefucture_id" => "福岡",
				"zooname" => "福岡市動物園",
			],
			[
				"id" => "61",
				"prefucture_id" => "長崎",
				"zooname" => "長崎バイオパーク",
			],
			[
				"id" => "62",
				"prefucture_id" => "熊本",
				"zooname" => "阿蘇カドリー・ドミニオン",
			],
			[
				"id" => "63",
				"prefucture_id" => "宮崎",
				"zooname" => "宮崎市フェニックス自然動物園",
			],
			[
				"id" => "64",
				"prefucture_id" => "鹿児島",
				"zooname" => "鹿児島市平川動物公園",
			],
			[
				"id" => "65",
				"prefucture_id" => "沖縄",
				"zooname" => "ネオパークオキナワ",
			],
		);
	}
}
