<?extend ('template/base_template.php')?>

<? startblock('menu_tab') ?>
<li><?=anchor('', 'home', array('title' => 'home', 'class' => 'nav'))?></li>
<li><?=anchor('report/index', 'report', array('title' => 'report', 'class' => 'nav'))?></li>
<li><?=anchor('coms/logout', 'logout', array('title' => 'logout', 'class' => 'nav'))?></li>
<? endblock() ?>

<? startblock('left_menu') ?>
<li><?=anchor('report/topitem', 'top item', array('title' => 'top item'))?></li>
<li><?=anchor('report/topsize', 'top size', array('title' => 'top size'))?></li>
<? endblock() ?>

<? startblock('page_title') ?>
Report
<? endblock() ?>

<?end_extend()?>