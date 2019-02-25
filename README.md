lether shop  初めてのプログラミングの授業の一環で作成した、自作した革製品を販売するECサイトです。  商品をカートに追加、カートの中身を確認、注文するという流れになっています。  トップページに「受注データ」と表記していますが、受注データを確認するために載せています。  また、決して_ブラウザバッグしないでください_

phpで作成しました。ライブラリは使用していません。  phpを24時間程度学んだ後作成したもので、当時はhtml/cssについての知識がほぼ無かったためデザインに関してはなんとも言えません。

shop_top.phpがトップページになります。  商品をクリックするとshohin.phpへ  注文履歴をクリックするとinput_rireki_kensaku.phpへ  受注データをクリックするとorder_yomu.phpへ 下にいくと「サイトのトップへ」があります。  カートをクリックするとcart.phpへ飛び、商品を追加すると「購入」ボタンが表示されます。  「購入」ボタンを押すとinput_jusho.phpへ （お名前、住所はなんでも構いません。）「送信」ボタンを押すとorder_kakunin.phpへ  「注文確定」ボタンをクリックするとorder_kiroku.phpへ  shop_top → shohin  shop_top → cart  shop_top → input_rireki_kensaku  shop_top → order_yomu  cart → input_jusho → order_kakunin → oreder_kiroku

