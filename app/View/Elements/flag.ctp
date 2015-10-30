<?php
	if($status['Status']['flag']==1) {
		echo '<div class="btn btn-small" flag="30">一次面接予約</div><!--<div class="btn btn-small" flag="33">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==3) {
		echo '<div class="btn btn-small" flag="4">一次面接結果待ち</div><!--<div class="btn btn-small" flag="30">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==4) {
		echo '<div class="btn btn-small" flag="5">一次面接合格</div><div class="btn btn-small" flag="6">一次面接不合格</div><div class="btn btn-small" flag="18">内定</div><div class="btn btn-small" flag="16">辞退</div><!--<div class="btn btn-small" flag="3">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==5) {
		echo '<div class="btn btn-small" flag="34">二次面接予約</div><!--<div class="btn btn-small" flag="4">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==6) {
		echo '<div class="btn btn-small" flag="19">求職者へNG連絡</div><!--<div class="btn btn-small" flag="4">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==7) {
		echo '<div class="btn btn-small" flag="8">二次面接結果待ち</div><!--<div class="btn btn-small" flag="34">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==8) {
		echo '<div class="btn btn-small" flag="9">二次面接合格</div><div class="btn btn-small" flag="10">二次面接不合格</div><div class="btn btn-small" flag="18">内定</div><div class="btn btn-small" flag="16">辞退</div><!--<div class="btn btn-small" flag="7">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==9) {
		echo '<div class="btn btn-small" flag="35">三次面接予約</div><!--<div class="btn btn-small" flag="8">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==10) {
		echo '<div class="btn btn-small" flag="19">求職者へNG連絡</div><!--<div class="btn btn-small" flag="8">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==11) {
		echo '<div class="btn btn-small" flag="12">三次面接結果待ち</div><!--<div class="btn btn-small" flag="35">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==12) {
		echo '<div class="btn btn-small" flag="14">三次面接不合格</div><div class="btn btn-small" flag="18">内定</div><div class="btn btn-small" flag="16">辞退</div><!--<div class="btn btn-small" flag="11">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==13) {
		echo '<div class="btn btn-small" flag="18">内定</div><div class="btn btn-small" flag="16">辞退</div>';
	}else if($status['Status']['flag']==14) {
		echo '<div class="btn btn-small" flag="19">求職者へNG連絡</div>';
	}else if($status['Status']['flag']==15) { // Not show
		//echo '<div class="btn btn-small" flag="">終了</div>';
	}else if($status['Status']['flag']==16) {
		echo '<div class="btn btn-small" flag="17">企業へNG連絡</div>';
	}else if($status['Status']['flag']==17) {
		echo '<div class="btn btn-small" flag="15">終了</div>';
	}else if($status['Status']['flag']==18) {
		echo '<div class="btn btn-small" flag="20">入社意思確認</div><!--<div class="btn btn-small" flag="13">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==19) {
		echo '<div class="btn btn-small" flag="15">終了</div>';
	}else if($status['Status']['flag']==20) {
		echo '<div class="btn btn-small" flag="21">入社OK</div><div class="btn btn-small" flag="16">辞退</div><!--<div class="btn btn-small" flag="18">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==21) {
		/*
		*	Add Modal for input price
		*/
		//echo '<div class="btn btn-small" flag="22">入社確認待ち</div><!--<div class="btn btn-small" flag="20">進捗一個前に戻す</div>-->';
		echo isset($status['Status']['price'])?'<div class="btn btn-small" flag="22">入社確認待ち</div>':'<a href="#myModalStatus' .$status['Status']['id'] .'" role="button" class="btn btn-mini btn-warning" data-toggle="modal">' .__("Set Sale Price") .'</a>';
	}else if($status['Status']['flag']==22) {
		echo '<div class="btn btn-small" flag="23">入社完了</div><!--<div class="btn btn-small" flag="21">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==23) {
		echo '<div class="btn btn-small" flag="24">請求処理</div><!--<div class="btn btn-small" flag="22">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==24) {
		//echo '<div class="btn btn-small" flag="25">請求処理完了</div><!--<div class="btn btn-small" flag="23">進捗一個前に戻す</div>-->';
		/*
		*	Add Modal for input price
		*/
		//echo isset($status['Status']['price'])?'<div class="btn btn-small" flag="25">請求処理完了</div>':'<a href="#myModalStatus' .$status['Status']['id'] .'" role="button" class="btn-mini btn-warning" data-toggle="modal">' .__("Set Sale Price") .'</a>';
		echo '<div class="btn btn-small" flag="25">請求処理完了</div>';
	}else if($status['Status']['flag']==25) { 
		echo '<div class="btn btn-small" flag="26">完了</div><!--<div class="btn btn-small" flag="24">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==26) { // Not show
		echo '<span class="label">完了</span>';
	}else if($status['Status']['flag']==27) {
		echo '<div class="btn btn-small" flag="31">面談OK</div><div class="btn btn-small" flag="32">面談NG</div>';
	}else if($status['Status']['flag']==28) {
		//echo '<div class="btn btn-small" flag="0">完了</div>';
	}else if($status['Status']['flag']==29) {
		//echo '<div class="btn btn-small" flag="0">完了</div>';
	}else if($status['Status']['flag']==30) {
		echo '<div class="btn btn-small" flag="3">一次面接</div><div class="btn btn-small" flag="16">辞退</div><!--<div class="btn btn-small" flag="1">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==31) {
		echo '<div class="btn btn-small" flag="33">応募準備中</div><div class="btn btn-small" flag="36">辞退</div><!--<div class="btn btn-small" flag="27">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==32) {
		echo '<div class="btn btn-small" flag="33">応募準備中</div><div class="btn btn-small" flag="16">辞退</div><!--<div class="btn btn-small" flag="27">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==33) {
		echo '<div class="btn btn-small" flag="1">応募OK</div><div class="btn btn-small" flag="16">辞退</div><!--<div class="btn btn-small" flag="31">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==34) {
		echo '<div class="btn btn-small" flag="7">二次面接</div><div class="btn btn-small" flag="16">辞退</div><!--<div class="btn btn-small" flag="5">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==35) {
		echo '<div class="btn btn-small" flag="11">三次面接</div><div class="btn btn-small" flag="16">辞退</div><!--<div class="btn btn-small" flag="9">進捗一個前に戻す</div>-->';
	}else if($status['Status']['flag']==36) {
		echo '<div class="btn btn-small" flag="15">終了</div>';
	}
?>