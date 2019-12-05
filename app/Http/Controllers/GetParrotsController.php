<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class GetParrotsController extends Controller
{
	private function findParrot($html, $pref_id, $zoo_name, $before_word, $after_word)
	{
		\App\Zooname::insert(['prefecture_id' => $pref_id, 'zooname' => $zoo_name]);
		$parrot_types = ['インコ', 'オウム', 'ヨウム', 'バタン'];
		$parrot_name = '';
		foreach ($parrot_types as $parrot_type) {
			$html_copy = $html;
			for ($i = 0;; $i++) {
				if (mb_strpos($html_copy, $parrot_type) === false) {
					break;
				}
				//インコの名前
				for ($j = -1; mb_substr($html_copy, mb_strpos($html_copy, $parrot_type) + $j, 1) != $before_word; $j--) {
					$parrot_name = mb_substr($html_copy, mb_strpos($html_copy, $parrot_type) + $j, 1) . $parrot_name;
				}
				$parrot_name = $parrot_name . $parrot_type;
				//画像パス
				if (File::exists("storage/img/" . $parrot_name . ".jpg")) {
					$imagePath = "storage/img/" . $parrot_name . ".jpg";
				} else {
					$imagePath = "storage/img/noimage.png";
				}
				if ($parrot_name == 'ヨウム') {
					$this->insertParrotName($parrot_name);
					$this->insertParrotDB($zoo_name, $parrot_name, $imagePath);
					$this->insertOverview($parrot_name);
				} else {
					if (
						$parrot_name != $parrot_type &&
						preg_match("/^[ァ-ヾ]+$/u", $parrot_name)
					) {
						$this->insertParrotName($parrot_name);
						$this->insertParrotDB($zoo_name, $parrot_name, $imagePath);
						$this->insertOverview($parrot_name);
					}
				}
				$parrot_name = '';
				$html_copy = mb_substr($html_copy, mb_strpos($html_copy, $parrot_type));
				$html_copy = mb_substr($html_copy, mb_strpos($html_copy, $after_word) + 1);
			}
		}
	}
	private function insertParrotName($parrot_name)
	{
		if (!\App\Parrotname::where('parrotname', $parrot_name)->exists()) {
			\App\Parrotname::insert([
				'parrotname' => $parrot_name,
			]);
		}
	}
	private function insertParrotDB($zoo_name, $parrot_name, $imagePath)
	{
		\App\Parrot::insert([
			'zooname_id' => \App\Zooname::where('zooname', $zoo_name)->value('id'),
			'parrotname_id' => \App\Parrotname::where('parrotname', $parrot_name)->value('parrotname'),
			'path' => $imagePath,
		]);
	}
	private function insertOverview($parrot_name)
	{
		if (!\App\Overview::where('parrotname', $parrot_name)->exists()) {
			if ($html = @file_get_contents("https://ja.wikipedia.org/wiki/" . $parrot_name)) {
				if (strpos($html, '概要')) {
					$html = mb_substr($html, mb_strpos($html, "概要"));
					$html = mb_substr($html, mb_strpos($html, "<p>") + 3);
					$html = mb_substr($html, 0, mb_strpos($html, '<h'));
					$html = strip_tags($html);
					\App\Overview::insert(['parrotname' => $parrot_name, 'overview' => $html]);
				} elseif (strpos($html, '<div id="toc')) {
					$html = mb_substr($html, mb_strpos($html, "mw-content-text"));
					$html = mb_substr($html, mb_strpos($html, "/table"));
					$html = mb_substr($html, mb_strpos($html, "<p>") + 3);
					$html = mb_substr($html, 0, mb_strpos($html, '<div id="toc'));
					$html = strip_tags($html);
					\App\Overview::insert(['parrotname' => $parrot_name, 'overview' => $html]);
				} else {
					$html = mb_substr($html, mb_strpos($html, "mw-content-text"));
					$html = mb_substr($html, mb_strpos($html, "/table"));
					$html = mb_substr($html, mb_strpos($html, "<p>") + 3);
					$html = mb_substr($html, 0, mb_strpos($html, '<h'));
					$html = strip_tags($html);
					\App\Overview::insert(['parrotname' => $parrot_name, 'overview' => $html]);
				}
			}
		}
	}
	public function getParrotsDelete()
	{
		// DB初期化
		\App\Parrot::truncate();
		\App\Parrotname::truncate();
		\App\Zooname::truncate();
		\App\Overview::truncate();
		return redirect('/');
	}
	/* ----- 北海道・東北 ----- */
	public function getParrotsTohoku()
	{
		/*---------- おびひろ動物園 ----------*/
		$html = file_get_contents("https://www.city.obihiro.hokkaido.jp/zoo/animal/bird_list.html");
		$pref_id = \App\Prefecture::where('prefecturename', '北海道')->value('id');
		$zoo_name = 'おびひろ動物園';
		$before_word = '>';
		$after_word = 'li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 釧路市動物園 ----------*/
		$html = file_get_contents("https://www.city.kushiro.lg.jp/zoo/shoukai/0001.html");
		$pref_id = \App\Prefecture::where('prefecturename', '北海道')->value('id');
		$zoo_name = '釧路市動物園';
		$before_word = '"';
		$after_word = 'の';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 札幌市円山動物園 ----------*/
		$html = file_get_contents("https://www.city.sapporo.jp/zoo/doubutsu/index50.html");
		$pref_id = \App\Prefecture::where('prefecturename', '北海道')->value('id');
		$zoo_name = '札幌市円山動物園';
		$before_word = '>';
		$after_word = '<';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- ノースサファリサッポロ ----------*/
		$html = file_get_contents("https://www.north-safari.com/animals/animal_nss");
		$pref_id = \App\Prefecture::where('prefecturename', '北海道')->value('id');
		$zoo_name = 'ノースサファリサッポロ';
		$before_word = '"';
		$after_word = '"';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 岩手サファリパーク ----------*/
		$html = file_get_contents("https://www.iwate-safari.jp/animal");
		$pref_id = \App\Prefecture::where('prefecturename', '岩手県')->value('id');
		$zoo_name = '岩手サファリパーク';
		$before_word = '"';
		$after_word = '"';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 八木山動物公園 現在いない2019/9/24 ----------*/
		// $html = file_get_contents("https://www.city.sendai.jp/zoo/dobutsu/chorui/omu.html");
		// $pref_id = \App\Prefecture::where('prefecturename', '宮城県')->value('id');
		// $zoo_name = '八木山動物公園';
		// $before_word = '>';
		// $after_word = '<';
		// $this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 秋田市大森山動物園 ----------*/
		$html = file_get_contents("https://www.city.akita.lg.jp/zoo/information/1003682/1005303/index.html");
		$pref_id = \App\Prefecture::where('prefecturename', '秋田県')->value('id');
		$zoo_name = '秋田市大森山動物園';
		$before_word = '>';
		$after_word = '<';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		return redirect('/');
	}
	// /* ----- 関東 ----- */
	public function getParrotsKanto()
	{
		/*---------- 那須ワールドモンキーパーク ----------*/
		$html = file_get_contents("https://www.nasumonkey.com/book/");
		$pref_id = \App\Prefecture::where('prefecturename', '栃木県')->value('id');
		$zoo_name = '那須ワールドモンキーパーク';
		$before_word = '>';
		$after_word = '<';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 桐生が岡動物園 ----------*/
		$html = file_get_contents("http://www.city.kiryu.lg.jp/zoo/ninki/chorui/index.html");
		$pref_id = \App\Prefecture::where('prefecturename', '群馬県')->value('id');
		$zoo_name = '桐生が岡動物園';
		$before_word = '（';
		$after_word = '）';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 草津熱帯圏 ----------*/
		$html = file_get_contents("http://animalchain.site/zoo/293");
		$pref_id = \App\Prefecture::where('prefecturename', '群馬県')->value('id');
		$zoo_name = '草津熱帯圏';
		$before_word = '>';
		$after_word = 'li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 群馬サファリパーク ----------*/
		$html = file_get_contents("http://www.safari.co.jp/animal/");
		$pref_id = \App\Prefecture::where('prefecturename', '群馬県')->value('id');
		$zoo_name = '群馬サファリパーク';
		$before_word = '>';
		$after_word = '<';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 大宮公園小動物園 ----------*/
		$html = file_get_contents("http://animalchain.site/zoo/23");
		$pref_id = \App\Prefecture::where('prefecturename', '埼玉県')->value('id');
		$zoo_name = '大宮公園小動物園';
		$before_word = '>';
		$after_word = 'li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- キャンベルタウン野鳥の森 ----------*/
		$html = file_get_contents("https://yacho-nomori.kosi-kanri.com/animal.html");
		$pref_id = \App\Prefecture::where('prefecturename', '埼玉県')->value('id');
		$zoo_name = 'キャンベルタウン野鳥の森';
		$before_word = '>';
		$after_word = '<';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 埼玉県こども動物自然公園 ----------*/
		$html = file_get_contents("https://ja.wikipedia.org/wiki/%E5%9F%BC%E7%8E%89%E7%9C%8C%E3%81%93%E3%81%A9%E3%82%82%E5%8B%95%E7%89%A9%E8%87%AA%E7%84%B6%E5%85%AC%E5%9C%92#%E5%8B%95%E7%89%A9%E5%9C%92%E6%96%BD%E8%A8%AD%E3%83%BB%E4%B8%BB%E3%81%AA%E9%A3%BC%E8%82%B2%E5%8B%95%E7%89%A9");
		$pref_id = \App\Prefecture::where('prefecturename', '埼玉県')->value('id');
		$zoo_name = '埼玉県こども動物自然公園';
		$before_word = '"';
		$after_word = '</a>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 狭山市立智光山公園こども動物園 ----------*/
		$html = file_get_contents("http://www.parks.or.jp/chikozan/zoo/animal/aves.html");
		$pref_id = \App\Prefecture::where('prefecturename', '埼玉県')->value('id');
		$zoo_name = '智光山公園こども動物園';
		$before_word = '>';
		$after_word = '<';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 千葉市動物公園 ----------*/
		$html = file_get_contents("http://www.city.chiba.jp/zoo/zone/animal-top.html");
		$pref_id = \App\Prefecture::where('prefecturename', '千葉県')->value('id');
		$zoo_name = '千葉市動物公園';
		$before_word = '・';
		$after_word = '<';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 足立区生物園 ----------*/
		$html = file_get_contents("http://animalchain.site/zoo/34");
		$pref_id = \App\Prefecture::where('prefecturename', '東京都')->value('id');
		$zoo_name = '足立区生物園';
		$before_word = '>';
		$after_word = 'li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 恩賜上野動物園 ----------*/
		$html = file_get_contents("http://animalchain.site/zoo/29");
		$pref_id = \App\Prefecture::where('prefecturename', '東京都')->value('id');
		$zoo_name = '恩賜上野動物園';
		$before_word = '>';
		$after_word = 'li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 江戸川区自然動物園 ----------*/
		$html = file_get_contents("https://www.edogawa-kankyozaidan.jp/zoo/introduction/");
		$pref_id = \App\Prefecture::where('prefecturename', '東京都')->value('id');
		$zoo_name = '江戸川区自然動物園';
		$before_word = '"';
		$after_word = 'iv>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 多摩動物公園 ----------*/
		$html = file_get_contents("http://animalchain.site/zoo/13");
		$pref_id = \App\Prefecture::where('prefecturename', '東京都')->value('id');
		$zoo_name = '多摩動物公園';
		$before_word = '>';
		$after_word = 'li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 羽村市動物公園 ----------*/
		$html = file_get_contents("http://www.t-net.ne.jp/~hamura-z/html/animal.html");
		$pref_id = \App\Prefecture::where('prefecturename', '東京都')->value('id');
		$zoo_name = '羽村市動物公園';
		$before_word = '"';
		$after_word = '</td>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 相模原麻溝公園ふれあい動物広場 ----------*/
		$html = file_get_contents("http://animalchain.site/zoo/234");
		$pref_id = \App\Prefecture::where('prefecturename', '神奈川県')->value('id');
		$zoo_name = '相模原麻溝公園ふれあい動物広場';
		$before_word = '>';
		$after_word = 'li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 夢見ケ崎動物公園 ----------*/
		$html = file_get_contents("http://www.city.kawasaki.jp/shisetsu/category/30-26-3-3-0-0-0-0-0-0.html");
		$pref_id = \App\Prefecture::where('prefecturename', '神奈川県')->value('id');
		$zoo_name = '夢見ケ崎動物公園';
		$before_word = '>';
		$after_word = '</li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 野毛山動物園 ----------*/
		$html = file_get_contents("http://www.hama-midorinokyokai.or.jp/zoo/nogeyama/animal/");
		$pref_id = \App\Prefecture::where('prefecturename', '神奈川県')->value('id');
		$zoo_name = '野毛山動物園';
		$before_word = '>';
		$after_word = '</li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- よこはま動物園ズーラシア ----------*/
		$html = file_get_contents("http://www.hama-midorinokyokai.or.jp/zoo/zoorasia/animal/");
		$pref_id = \App\Prefecture::where('prefecturename', '神奈川県')->value('id');
		$zoo_name = 'よこはま動物園ズーラシア';
		$before_word = '>';
		$after_word = '</li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		return redirect('/');
	}
	/* ----- 中部 ----- */
	public function getParrotsChubu()
	{
		/*---------- 富山市ファミリーパーク ----------*/
		$html = file_get_contents("https://www.toyama-familypark.jp/animal/ind_index.php?id=place_kodomozoo");
		$pref_id = \App\Prefecture::where('prefecturename', '富山県')->value('id');
		$zoo_name = '富山市ファミリーパーク';
		$before_word = '"';
		$after_word = '</h3>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- いしかわ動物園 ----------*/
		$html = file_get_contents("http://animalchain.site/zoo/45");
		$pref_id = \App\Prefecture::where('prefecturename', '富山県')->value('id');
		$zoo_name = 'いしかわ動物園';
		$before_word = '>';
		$after_word = 'li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 小諸市動物園 ----------*/
		$html = file_get_contents("https://www.city.komoro.lg.jp/citypromotion/places/doubutuen/7009.html");
		$pref_id = \App\Prefecture::where('prefecturename', '長野県')->value('id');
		$zoo_name = '小諸市動物園';
		$before_word = '>';
		$after_word = '</tr>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 須坂市動物園 ----------*/
		$html = file_get_contents("https://www.city.suzaka.nagano.jp/suzaka_zoo/animal/#birds");
		$pref_id = \App\Prefecture::where('prefecturename', '長野県')->value('id');
		$zoo_name = '須坂市動物園';
		$before_word = '\'';
		$after_word = 'trim';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 伊豆シャボテン公園 ----------*/
		$html = file_get_contents("http://animalchain.site/zoo/57");
		$pref_id = \App\Prefecture::where('prefecturename', '静岡県')->value('id');
		$zoo_name = '伊豆シャボテン公園';
		$before_word = '>';
		$after_word = 'li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 浜松市動物園 ----------*/
		$html = file_get_contents("http://animalchain.site/zoo/60");
		$pref_id = \App\Prefecture::where('prefecturename', '静岡県')->value('id');
		$zoo_name = '浜松市動物園';
		$before_word = '>';
		$after_word = 'li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 岡崎市東公園動物園 ----------*/
		$html = file_get_contents("https://www.city.okazaki.lg.jp/1100/1107/1149/p012775.html");
		$pref_id = \App\Prefecture::where('prefecturename', '愛知県')->value('id');
		$zoo_name = '岡崎市東公園動物園';
		$before_word = '"';
		$after_word = '</div>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		return redirect('/');
	}
	/* ----- 近畿 ----- */
	public function getParrotsKinki()
	{
		/*---------- 大内山動物園 ----------*/
		$html = file_get_contents("http://www.oouchiyama-zoo.com/animals/");
		$pref_id = \App\Prefecture::where('prefecturename', '三重県')->value('id');
		$zoo_name = '大内山動物園';
		$before_word = '>';
		$after_word = '</span>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 京都市動物園 ----------*/
		$html = file_get_contents("https://www5.city.kyoto.jp/zoo/animals");
		$pref_id = \App\Prefecture::where('prefecturename', '京都府')->value('id');
		$zoo_name = '京都市動物園';
		$before_word = '>';
		$after_word = '</dd>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 赤穂海浜公園 動物ふれあい村 ----------*/
		$html = file_get_contents("http://aes-akoufureaimura.co.jp/NewFiles/animals.html");
		$pref_id = \App\Prefecture::where('prefecturename', '兵庫県')->value('id');
		$zoo_name = '赤穂海浜公園 動物ふれあい村';
		$before_word = '"';
		$after_word = '</div>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 淡路ファームパーク イングランドの丘 ----------*/
		$html = file_get_contents("https://www.england-hill.com/animal-irotoridori/");
		$pref_id = \App\Prefecture::where('prefecturename', '兵庫県')->value('id');
		$zoo_name = '淡路ファームパーク イングランドの丘';
		$before_word = '/';
		$after_word = '</a>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 神戸市立王子動物園 ----------*/
		$html = file_get_contents("http://www.kobe-ojizoo.jp/animal/pictorial/category.php?c=2");
		$pref_id = \App\Prefecture::where('prefecturename', '兵庫県')->value('id');
		$zoo_name = '神戸市立王子動物園';
		$before_word = '>';
		$after_word = '</a>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 神戸どうぶつ王国 ----------*/
		$html = file_get_contents("https://www.kobe-oukoku.com/friend/");
		$pref_id = \App\Prefecture::where('prefecturename', '兵庫県')->value('id');
		$zoo_name = '神戸どうぶつ王国';
		$before_word = '"';
		$after_word = '</h4>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 姫路市立動物園 ----------*/
		$html = file_get_contents("http://animalchain.site/zoo/72");
		$pref_id = \App\Prefecture::where('prefecturename', '兵庫県')->value('id');
		$zoo_name = '姫路市立動物園';
		$before_word = '>';
		$after_word = 'li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 和歌山公園動物園 ----------*/
		$html = file_get_contents("http://animalchain.site/zoo/70");
		$pref_id = \App\Prefecture::where('prefecturename', '和歌山県')->value('id');
		$zoo_name = '和歌山公園動物園';
		$before_word = '>';
		$after_word = 'li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);

		return redirect('/');
	}
	/* ----- 中国 ----- */
	public function getParrotsChugoku()
	{
		/*---------- 渋川動物公園 ----------*/
		$html = file_get_contents("http://animalchain.site/zoo/202");
		$pref_id = \App\Prefecture::where('prefecturename', '岡山県')->value('id');
		$zoo_name = '渋川動物公園';
		$before_word = '>';
		$after_word = '</li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 広島市安佐動物公園 ----------*/
		$html = file_get_contents("http://www.asazoo.jp/animal/");
		$pref_id = \App\Prefecture::where('prefecturename', '広島県')->value('id');
		$zoo_name = '広島市安佐動物公園';
		$before_word = '>';
		$after_word = '</li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 福山市立動物園 ----------*/
		$html = file_get_contents("http://www.fukuyamazoo.jp/animals.php");
		$pref_id = \App\Prefecture::where('prefecturename', '広島県')->value('id');
		$zoo_name = '福山市立動物園';
		$before_word = '>';
		$after_word = '</table>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 宇部市ときわ動物園 ----------*/
		$html = file_get_contents("https://www.tokiwapark.jp/zoo/animal/");
		$pref_id = \App\Prefecture::where('prefecturename', '山口県')->value('id');
		$zoo_name = '宇部市ときわ動物園';
		$before_word = '>';
		$after_word = '</li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 周南市徳山動物園 ----------*/
		$html = file_get_contents("http://www.city.shunan.lg.jp/site/zoo/list167-585.html");
		$pref_id = \App\Prefecture::where('prefecturename', '山口県')->value('id');
		$zoo_name = '周南市徳山動物園';
		$before_word = '"';
		$after_word = '</a>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 愛媛県立とべ動物園 ----------*/
		$html = file_get_contents("https://www.tobezoo.com/animals/library/kind/ki18/");
		$pref_id = \App\Prefecture::where('prefecturename', '愛知県')->value('id');
		$zoo_name = '愛媛県立とべ動物園';
		$before_word = '"';
		$after_word = '</li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 高知県立のいち動物公園 ----------*/
		$html = file_get_contents("http://www.noichizoo.or.jp/park/animal_intro.html");
		$pref_id = \App\Prefecture::where('prefecturename', '高知県')->value('id');
		$zoo_name = '高知県立のいち動物公園';
		$before_word = '>';
		$after_word = '</a>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- わんぱーくこうちアニマルランド ----------*/
		$html = file_get_contents("http://animalchain.site/zoo/82");
		$pref_id = \App\Prefecture::where('prefecturename', '高知県')->value('id');
		$zoo_name = 'わんぱーくこうちアニマルランド';
		$before_word = '>';
		$after_word = '</li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);

		return redirect('/');
	}
	/* ----- 九州 ----- */
	public function getParrotsKyushu()
	{
		/*---------- 到津の森公園 ----------*/
		$html = file_get_contents("http://animalchain.site/zoo/84");
		$pref_id = \App\Prefecture::where('prefecturename', '福岡県')->value('id');
		$zoo_name = '到津の森公園';
		$before_word = '>';
		$after_word = '</li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 大牟田市動物園 ----------*/
		$html = file_get_contents("http://animalchain.site/zoo/86");
		$pref_id = \App\Prefecture::where('prefecturename', '福岡県')->value('id');
		$zoo_name = '大牟田市動物園';
		$before_word = '>';
		$after_word = '</li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 久留米市鳥類センター ----------*/
		$html = file_get_contents("https://kurumekoen.org/birdc/birdc_animals/");
		$pref_id = \App\Prefecture::where('prefecturename', '福岡県')->value('id');
		$zoo_name = '久留米市鳥類センター';
		$before_word = '>';
		$after_word = '</td>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- ピクニカ共和国 ----------*/
		$html = file_get_contents("http://piknica.com/introduction/introductioncat/%e3%81%9d%e3%81%ae%e4%bb%96%e7%a8%ae%e9%a1%9e/");
		$pref_id = \App\Prefecture::where('prefecturename', '福岡県')->value('id');
		$zoo_name = 'ピクニカ共和国';
		$before_word = '>';
		$after_word = '</li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*---------- 福岡市動物園 ----------*/
		$html = file_get_contents("http://animalchain.site/zoo/85");
		$pref_id = \App\Prefecture::where('prefecturename', '福岡県')->value('id');
		$zoo_name = '福岡市動物園';
		$before_word = '>';
		$after_word = '</li>';
		$this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*----------  ----------*/
		// $html = file_get_contents("https://www.itozu-zoo.jp/friends/");
		// $pref_id = \App\Prefecture::where('prefecturename', '福岡県')->value('id');
		// $zoo_name = '';
		// $before_word = '>';
		// $after_word = '</td>';
		// $this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);
		/*----------  ----------*/
		// $html = file_get_contents("https://www.itozu-zoo.jp/friends/");
		// $pref_id = \App\Prefecture::where('prefecturename', '福岡県')->value('id');
		// $zoo_name = '';
		// $before_word = '>';
		// $after_word = '</td>';
		// $this->findParrot($html, $pref_id, $zoo_name, $before_word, $after_word);


		return redirect('/');
	}
}
