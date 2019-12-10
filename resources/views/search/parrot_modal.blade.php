@foreach ($overviews as $overview)
<div id="{{ $overview->parrotname }}" class="modal">
  <h4>{{ $overview->parrotname }}</h4>
  <div class="modal-inner">
    <div class="left">
      <div class="modal-content">
        <blockquote cite="https://ja.wikipedia.org/wiki/{{ $overview->parrotname }}">
          <p>{{ $overview->overview }}</p>
          <cite><a href="https://ja.wikipedia.org/wiki/{{ $overview->parrotname }}" target="_blank">引用：Wikipedia</a></cite>
        </blockquote>
      </div>
    </div>
    <div class="right">
      <div class="right-inner">
        <img class="col m10 s12 modal-img" src="{{ asset('/storage/img/'.$overview->parrotname.'.jpg') }}">
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- ↓ないやつ↓ -->
<!-- <div id="アオメキバタン" class="modal">
  <h4>アオメキバタン</h4>
  <div class="modal-inner">
    <div class="left">
      <div class="modal-content">
        <blockquote cite="https://www5.city.kyoto.jp/zoo/animals/birds/c_galerita">
          <p>森林や耕作地に生息する。様々な種類の種子や果実を食べる。非常に長命で，野生では20年から40年程度であるが、飼育下では50年以上生きることもある。また，目の色でオスとメスを見分けることができる。オスの目の色はほぼ真っ黒で，メスはオスに比べて薄い色をしている。</p>
          <cite><a href="https://www5.city.kyoto.jp/zoo/animals/birds/c_galerita" target="_blank">引用：京都市動物園</a></cite>
        </blockquote>
      </div>
    </div>
    <div class="right">
      <div class="right-inner">
        <img class="col m10 s12 modal-img" src="{{ asset('/storage/img/アオメキバタン.jpg') }}">
      </div>
    </div>
  </div>
</div>

<div id="アカオクロオウム" class="modal">
  <h4>アカオクロオウム</h4>
  <div class="modal-inner">
    <div class="left">
      <div class="modal-content">
        <blockquote cite="https://yacho-nomori.kosi-kanri.com/animal/201603/137.html">
          <p>オウム目　オウム科。英名 Red-tailed Black Cockatoo。生息地域 オーストラリアの北部・南東部および南西部。名前のとおり赤い尾羽を持っている黒い大型のオウム。オス・メスいずれにもあるヘルメットのような冠羽はこの鳥の特徴で、驚いたり興奮している時、着地する時などに逆立てる。サバンナでは１００羽ほどの大群で放浪するが、森林地帯ではつがいか家族単位でくらす。オスと未成熟個体は黄色の斑点を持っている。</p>
          <cite><a href="https://yacho-nomori.kosi-kanri.com/animal/201603/137.html" target="_blank">引用：キャンベルタウン　野鳥の森</a></cite>
        </blockquote>
      </div>
    </div>
    <div class="right">
      <div class="right-inner">
        <img class="col m10 s12 modal-img" src="{{ asset('/storage/img/アカオクロオウム.jpg') }}">
      </div>
    </div>
  </div>
</div>

<div id="アカコンゴウインコ" class="modal">
  <h4>アカコンゴウインコ</h4>
  <div class="modal-inner">
    <div class="left">
      <div class="modal-content">
        <blockquote cite="https://ja.wikipedia.org/wiki/%E3%82%B3%E3%83%B3%E3%82%B4%E3%82%A6%E3%82%A4%E3%83%B3%E3%82%B3_(%E7%A8%AE%E5%90%8D)">
          <p>コンゴウインコ（金剛鸚哥、学名：Ara macao、英名：Scarlet Macaw）は大型のカラフルなインコである。別名アカコンゴウインコ。<br>
            アメリカ大陸のメキシコ最東端の一部からペルーとブラジルのアマゾン川流域にいたる湿潤な熱帯常緑樹林の500m以下の低地（かつては少なくとも1,000m以下）に生息する。ペット売買のための捕獲と居住地の破壊により広範囲にわたって絶滅に追いやられつつある。かつては北はタマウリパス州南部にまで分布していた。現在でもコイバ島で見ることができる。ホンジュラスの国鳥でもある。</p>
          <cite><a href="https://ja.wikipedia.org/wiki/%E3%82%B3%E3%83%B3%E3%82%B4%E3%82%A6%E3%82%A4%E3%83%B3%E3%82%B3_(%E7%A8%AE%E5%90%8D)
" target="_blank">引用：Wikipedia</a></cite>
        </blockquote>
      </div>
    </div>
    <div class="right">
      <div class="right-inner">
        <img class="col m10 s12 modal-img" src="{{ asset('/storage/img/アカコンゴウインコ.jpg') }}">
      </div>
    </div>
  </div>
</div>

<div id="キエリヒメコンゴウインコ" class="modal">
  <h4>キエリヒメコンゴウインコ</h4>
  <div class="modal-inner">
    <div class="left">
      <div class="modal-content">
        <blockquote cite="https://www.city.komoro.lg.jp/citypromotion/index.html">
          <p>分布：ブラジル ボリビア パラグアイ～アルゼンチン北西部。食べ物：種子や果物など。温厚でおとなしく人に慣れやすく、丈夫。明るく陽気な性格でおしゃべりが上手。遊ぶのが大好き。日本名「キエリヒメコンゴウインコ」英名「キエリコンゴウ」と呼ばれている。</p>
          <cite><a href="https://www.city.komoro.lg.jp/citypromotion/index.html" target="_blank">引用：小諸市役所</a></cite>
        </blockquote>
      </div>
    </div>
    <div class="right">
      <div class="right-inner">
        <img class="col m10 s12 modal-img" src="{{ asset('/storage/img/キエリヒメコンゴウインコ.jpg') }}">
      </div>
    </div>
  </div>
</div>

<div id="キエリボウシインコ" class="modal">
  <h4>キエリボウシインコ</h4>
  <div class="modal-inner">
    <div class="left">
      <div class="modal-content">
        <blockquote cite="https://www.city.komoro.lg.jp/citypromotion/index.html">
          <p>分布：南アメリカのベネズエラ及びその付近の島々。食べ物：ひまわりの種や果物など。ひまわりの種・麻の実などの脂肪餌や、リンゴ・バナナなどの果物を食べます。物まねがとても上手です。色彩が美しく、人に慣れやすい鳥です。</p>
          <cite><a href="https://www.city.komoro.lg.jp/citypromotion/index.html" target="_blank">引用：小諸市役所</a></cite>
        </blockquote>
      </div>
    </div>
    <div class="right">
      <div class="right-inner">
        <img class="col m10 s12 modal-img" src="{{ asset('/storage/img/キエリボウシインコ.jpg') }}">
      </div>
    </div>
  </div>
</div>

<div id="キンショウジョウインコ" class="modal">
  <h4>キンショウジョウインコ</h4>
  <div class="modal-inner">
    <div class="left">
      <div class="modal-content">
        <blockquote cite="https://yacho-nomori.kosi-kanri.com/animal/201603/181.html">
          <p>オウム目　インコ科。英名 Australian King Parrot。生息地域 オーストラリア東部（タスマニアを除く）。体格や羽色から「king　Prrot（キングパロット）」の名にふさわしい鳥。他のインコに比べれば静かで、金切り音のように甲高く、間延びしたように鳴く。オスは頭部から腹部にかけて鮮やかな紅色、メスは腹部以外は緑色をしている。</p>
          <cite><a href="https://yacho-nomori.kosi-kanri.com/animal/201603/181.html" target="_blank">引用：キャンベルタウン　野鳥の森</a></cite>
        </blockquote>
      </div>
    </div>
    <div class="right">
      <div class="right-inner">
        <img class="col m10 s12 modal-img" src="{{ asset('/storage/img/キンショウジョウインコ.jpg') }}">
      </div>
    </div>
  </div>
</div>

<div id="コミドリコンゴウインコ" class="modal">
  <h4>コミドリコンゴウインコ</h4>
  <div class="modal-inner">
    <div class="left">
      <div class="modal-content">
        <blockquote cite="http://www.macaw.or.jp/club/photo/hahns.html">
          <p>コンゴウ族の中で一番小型の種類です
            大きさは小さいですが、性格は大コンゴウに非常に似ており、非常に図太く、大胆な性格です。
            かなり食い意地がはっており、食べ物にたいする心配は皆無です。
            鳴き声もそこそこの大きさなので集合住宅でも飼いやすく、手ごろなサイズでコンゴウを味わえます。</p>
          <cite><a href="http://www.macaw.or.jp/club/index.html" target="_blank">引用：コンゴウインコクラブ</a></cite>
        </blockquote>
      </div>
    </div>
    <div class="right">
      <div class="right-inner">
        <img class="col m10 s12 modal-img" src="{{ asset('/storage/img/コミドリコンゴウインコ.jpg') }}">
      </div>
    </div>
  </div>
</div>

<div id="シロビタイムジオウム" class="modal">
  <h4>シロビタイムジオウム</h4>
  <div class="modal-inner">
    <div class="left">
      <div class="modal-content">
        <blockquote cite="https://edogawa-kankyozaidan.jp/zoo/introduction/230/">
          <p>インドネシアにあるタンニバル諸島のマングローブ林や森林に生息しています。漢字では白額無地鸚鵡と書き、その名の通り白く模様の無い体をしています。非常に強力なくちばしをもっており、展示場の中の木をよく見るといろいろなところがかじられています。普段は折りたたまれていてわかり辛いのですが、興奮するとこの写真のように頭の羽（冠羽：かんう）が立ち上がります。また、叫び声のような非常に大きな声で鳴くこともあります。</p>
          <cite><a href="https://edogawa-kankyozaidan.jp/zoo/introduction/230/" target="_blank">引用：江戸川区自然動物園</a></cite>
        </blockquote>
      </div>
    </div>
    <div class="right">
      <div class="right-inner">
        <img class="col m10 s12 modal-img" src="{{ asset('/storage/img/シロビタイムジオウム.jpg') }}">
      </div>
    </div>
  </div>
</div>

<div id="ズアカハネナガインコ" class="modal">
  <h4>ズアカハネナガインコ</h4>
  <div class="modal-inner">
    <div class="left">
      <div class="modal-content">
        <blockquote cite="http://www.hama-midorinokyokai.or.jp/zoo/zoorasia/animal/savanna/JardinesParrot/">
          <p>体全体は緑色ですが、名前のとおり成長になるにつれ、頭部が赤色になっていくことが特徴的です。尾羽が短く、翼が長いため飛行も得意です。また、知能も高く、人の声の真似などもできると言われています。</p>
          <cite><a href="http://www.hama-midorinokyokai.or.jp/zoo/zoorasia/animal/savanna/JardinesParrot/" target="_blank">引用：よこはま動物園ズーラシア</a></cite>
        </blockquote>
      </div>
    </div>
    <div class="right">
      <div class="right-inner">
        <img class="col m10 s12 modal-img" src="{{ asset('/storage/img/ズアカハネナガインコ.jpg') }}">
      </div>
    </div>
  </div>
</div>

<div id="ミカヅキインコ" class="modal">
  <h4>ミカヅキインコ</h4>
  <div class="modal-inner">
    <div class="left">
      <div class="modal-content">
        <blockquote cite="https://yacho-nomori.kosi-kanri.com/animal/201603/170.html">
          <p>オウム目　インコ科。英名 Superb Parrot。生息地域 オーストラリアの南東部。川沿いや森林地帯に生息する。和名のとおり、オスの胸元に赤い「三日月模様」があり、メスにはこの模様はない。体の色もオスに比べて全体的にぼやけている。飛んでる姿がとても美しい。</p>
          <cite><a href="https://yacho-nomori.kosi-kanri.com/animal/201603/170.html" target="_blank">引用：キャンベルタウン　野鳥の森</a></cite>
        </blockquote>
      </div>
    </div>
    <div class="right">
      <div class="right-inner">
        <img class="col m10 s12 modal-img" src="{{ asset('/storage/img/ミカヅキインコ.jpg') }}">
      </div>
    </div>
  </div>
</div> -->
