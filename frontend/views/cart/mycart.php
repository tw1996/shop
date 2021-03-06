<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>购物车页面</title>
	<link rel="stylesheet" href="style/cart.css" type="text/css">
    <script type="text/javascript" src="js/config.js"></script>
	<script type="text/javascript" src="js/cart1.js"></script>
	
</head>
<body>
<!-- 页面头部 start -->
<div class="header w990 bc mt15">
    <div class="logo w990">
        <h2 class="fl"><a href="index.html"><img src="images/logo.png" alt="京西商城"></a></h2>
        <div class="flow fr">
            <ul>
                <li class="cur">1.我的购物车</li>
                <li>2.填写核对订单信息</li>
                <li>3.成功提交订单</li>
            </ul>
        </div>
    </div>
</div>
<!-- 页面头部 end -->
	<!-- 主体部分 start -->
	<div class="mycart w990 mt10 bc">
		<h2><span>我的购物车</span></h2>
		<table>
			<thead>
				<tr>
					<th class="col1">商品名称</th>
					<th class="col2">商品信息</th>
					<th class="col3">单价</th>
					<th class="col4">数量</th>
					<th class="col5">小计</th>
					<th class="col6">操作</th>
				</tr>
			</thead>
			<tbody>
            <?php
              use \yii\helpers\Url;
              use common\help\MyHelper;
            ?>
            <?php $total = 0.00; ?>
            <?php foreach ($list as $k => $v):  ?>
				<tr>
					<td class="col1"><a href="<?= Url::toRoute(['goods/detail', 'id' => $v['goodsid']] ) ?>"><img src="<?= Yii::$app->params['admin'].MyHelper::DS().$v['logo'] ?>" alt="" /></a>  <strong><a href="<?= Url::toRoute(['goods/detail', 'id' => $v['goodsid']] ) ?>"><?= $v['goods_name']; ?></a></strong></td>
					<td class="col2"> <?= $v['attr']; ?> </td>
					<td class="col3">￥<span><?= $v['price']; ?></span></td>
					<td class="col4">
						<a href="javascript:;" attrstr = "<?= $v['attrstr']; ?>" goodsid="<?= $v['goodsid'] ?>" class="reduce_num"></a>
						<input type="text"  count="<?= $v['count']; ?>" attrstr = "<?= $v['attrstr']; ?>" goodsid="<?= $v['goodsid'] ?>" name="amount" value="<?= $v['goodsnum'] ?>" class="amount"/>
						<a href="javascript:;" count="<?= $v['count']; ?>" attrstr = "<?= $v['attrstr']; ?>" goodsid="<?= $v['goodsid'] ?>" class="add_num"></a>
					</td>
                    <?php  $price = bcmul($v['price'] , $v['goodsnum'], 2) ?>
					<td class="col5">￥<span class="cur"><?= $price ?></span></td>
					<td class="col6">
                        <a style="cursor:pointer;" attrstr = "<?= $v['attrstr']; ?>" class="del" goodsid="<?= $v['goodsid'] ?>" href="javascript:void(0)">删除</a>
                    </td>
				</tr>
                <?php $total = bcadd($total, $price, 2) ; ?>
            <?php endforeach;  ?>

			</tbody>
			<tfoot>
				<tr>
					<td colspan="6">购物金额总计： <strong>￥ <span id="total"><?= $total; ?></span></strong></td>
				</tr>
			</tfoot>
		</table>
		<div class="cart_btn w990 bc mt10">
			<a href="<?= $front ?>" class="continue">继续购物</a>
			<a href="<?= Url::toRoute(['order/checkorder']) ?>" class="checkout">结 算</a>
		</div>
	</div>
	<!-- 主体部分 end -->

</body>
</html>
