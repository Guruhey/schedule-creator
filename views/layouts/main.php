<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
  <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?= Html::csrfMetaTags() ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head> 
<body>
<?php $this->beginBody() ?>
<div class="wrapper">
  <header>
    <div class="top">
      <div class="menubar">
        <ul class="menu">
            <?
            $object =  new \app\models\LayoutModel();
            $object->displayTabs();
            ?>
        </ul>
            <?php echo Yii::$app->auth->display(); #$form;  ?>
      </div>

    </div>
            
  </header>
  
  <div class="content">
    <?=$content?>
  </div>
        
  <div class="footer">
    <div class="footer_content">
      <div class="logos">
        <div class="guru">
          <a href="#" class="logo">
            <div></div>
          </a>
          <span>Guru team</span>
        </div>

        <div class="kait">
          <a href="#" class="logo_kait">
            <div></div>
          </a>
          <span>KAIT 20</span>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
