<?php

    namespace App\Shop\Models\Mail_Class;

    //(7)修正ファイル
    //shop_form_done.php, shop_kantan_done.php
    class Rokumaru_Mail {

        public $email;
        public $title;
        public $header;
        public $honbun;
        public $footer;


        //新規メールを作る(メールクラス生成)時に自動的に処理する関数。
        //新規メールに重要な、ヘッダーとフッターを用意する役割を担当する。
        function __construct($header) {
            $this->header = $header;
            
            $footer = "□□□□□□□□□□□<br>";
            $footer .= "～安心やさいのろくまる農園～<br>";
            $footer .= "<br>";
            $footer .= "〇〇県六丸群六丸村 123-4<br>";
            $footer .= "電話 090-6060-xxxx<br>";
            $footer .= "メール info@rokumarunouen.co.jp<br>";
            $footer .= "□□□□□□□□□□□<br>";
            $this->footer = $footer;
        }

        //引数で与えられたデータを元に、メールの本文を作るや役割の関数。
        function makeMail($title,$onamae,$mailData,$chumon = null) {
            $this->title = $title;
            $this->onamae = $onamae;
            $this->mailData = $mailData;

            $honbun = '';
            $honbun .=  $onamae."様<br /><br />この度はご注文ありがとうございました。<br />";
            $honbun .= "<br />";
            $honbun .= "ご注文商品<br />";
            $honbun .= "---------<br />";

            foreach($mailData as $value) {
                $honbun .= $value[0];
                $honbun .= $value[1]."円 x";
                $honbun .= $value[2]."個 =";
                $honbun .= $value[3]."円<br />";
            }



            //会員登録した人だけ表示
            if($chumon == 'chumontouroku') {
                $honbun .= '<br>会員登録が完了しました。<br />';
                $honbun .= '次回からメールアドレスとパスワードでログインしてください。<br />';
                $honbun .= 'ご注文が簡単にできるようになります。<br />';
                $honbun .= '<br />';
            }

            $honbun .= "送料は無料です。<br />";
            $honbun .= "----------<br />";
            $honbun .= "<br />";
            $honbun .= "代金は以下の口座にお振込みください。<br />";
            $honbun .= "ろくまる銀行　やさい支店　普通口座1234567<br />";
            $honbun .= "入金確認が取れ次第、梱包、発送させていただきます。<br />";
            $honbun .= "<br />";

            //会員登録した人だけ表示
            if($chumon == 'chumontouroku') {
                $honbun .= "会員登録が完了しました。<br />";
                $honbun .= "次回からメールアドレスとパスワードでログインしてください。<br />";
                $honbun .= "ご注文が簡単にできるようになります。<br />";
                $honbun .= "<br />";
            }
            $this->honbun = $honbun;
            $this->honbun .= "{$this->footer}";


        }

        //引数で与えられた送り先に、用意した内容のメールを送信する役割の関数。
        function sendMail($email) {
            $title = $this->title;
            $honbun = $this->honbun;
            $header = $this->header;
            html_entity_decode($honbun,ENT_QUOTES,'UTF-8');
            mb_language("ja");
            mb_internal_encoding('UTF-8');
            // print '<br />';
            // print nl2br($email);
            // print '<br />';
            // print nl2br($this->title);
            // print '<br />';
            // print nl2br($this->honbun);
            // print '<br />';
            // print nl2br($this->header);
            
            //エラーになるためコメントアウト
            // mb_send_mail($email, $title, $honbun, $header);

        }

    }


?>