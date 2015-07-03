<?php include_once('header.php'); ?>
	<section class="l-contents">
		<section class="l-page-plan">
			<img src="assets/img/page/contact/contact_headline.png" width="600" height="151" alt="お問い合わせ・資料請求">
			<p class="form-title">お問い合わせフォーム</p>
			<form action="https://24auto.biz/alljapan01/responder.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="mcode" value="UTF-8">
			<input type="hidden" name="tno" value="178">
			<table class="contact-table">
			<tbody><tr><th>お名前<span class="kome">＊</span><br></th>
			<td>
			  <input type="text" placeholder="（例）塗装太郎">
			</td>
			</tr><tr>
			<th>ふりがな<span class="kome">＊</span></th>
			<td>
			  <input type="text" placeholder="（例）とそうたろう">
			</td>
			</tr>
			<tr>
			<th>ご住所<span class="kome">＊</span></th>
			<td>
			<input type="text" placeholder="（例）彦根市南川瀬川町１４００－１１">
			</td>
			</tr>
			<tr>
			<th>メール<br>アドレス<span class="kome">＊</span></th>
			<td>
			  <input type="text" placeholder="（例）info@okakenreform.com">
			</td>
			</tr>
			<tr>
			<th>お電話番号<span class="kome">＊</span></th>
			<td>
			  <input type="text" placeholder="（例）0749-xx-xxxx">
			</td>
			</tr>
			<tr>
			<th>お問合せ内容</th>
			<td>
			  <textarea placeholder="（今のお住まいの状況や気になっていることなどありましたら、お教えください）"></textarea>
			</td>
			</tr>
			</tbody>
			</table>
			<table class="otoiawase_label">
			<tbody><tr>
			<td><p class="contact-btn"><input type="submit" name="sbm" value=""></p></td>
			</tr>
			</tbody></table>
			</form>
			
			<p class="form-title">資料請求フォーム</p>
			
			<form action="https://24auto.biz/alljapan01/responder.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="mcode" value="UTF-8">
			<input type="hidden" name="tno" value="177">
			<table class="contact-table">
			<tbody><tr>
			<th>請求資料</th>
			<td>
			  <input type="checkbox" value="塗り替えリフォームで失敗しない３つの方法"> 塗り替えリフォームで失敗しない３つの方法  <br> <input type="checkbox" name="fld1[]" value="あなたも塗り替え リフォームで幸せに なれる方法"> あなたも塗り替え リフォームで幸せに なれる方法   <br> <input type="checkbox" name="fld1[]" value="幸せリフォーム通信"> 幸せリフォーム通信  
			</td>
			</tr>
			<tr>
			<th>お名前<span class="kome">*</span></th>
			<td>
			  <input type="text" placeholder="（例）塗装太郎">
			</td>
			</tr>
			<tr>
			<th>ふりがな<span class="kome">*</span></th>
			<td>
			  <input type="text" placeholder="（例）とそうたろう">
			</td>
			</tr>
			<tr>
			<th>ご住所<span class="kome">*</span></th>
			<td>
			  <input type="text" placeholder="（例）彦根市南川瀬川町１４００－１１">
			</td>
			</tr>
			<tr>
			<th>メール<br>アドレス<span class="kome">*</span></th>
			<td>
			  <input type="text" placeholder="（例）info@okakenreform.com">
			</td>
			</tr>
			<tr>
			<th>お電話番号<span class="kome">*</span></th>
			<td>
			  <input type="text" placeholder="（例）0749-xx-xxxx">
			</td>
			</tr>
			<tr>
			<th>任意コメント</th>
			<td>
			<textarea name="fld4" placeholder="（気になることや親方に伝えたいことなどご記入ください）"></textarea>
			</td>
			</tr>
			</tbody></table>
			<table class="otoiawase_label">
			<tbody><tr>
			<td><p class="contact-btn"><input type="submit" name="sbm" value=""></p></td>
			</tr>
			</tbody></table>
			</form>
			
		</section>
<?php include_once('footer.php'); ?>
