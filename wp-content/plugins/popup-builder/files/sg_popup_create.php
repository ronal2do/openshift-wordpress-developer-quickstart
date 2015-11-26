<h2>Add New Popup</h2>
<div class="popups-wrapper">
	<a class="create-popup-link" href="<?php echo SG_APP_POPUP_ADMIN_URL?>admin.php?page=edit-popup&type=image">
		<div class="popups-div image-popup">
		</div>
	</a>
	<a class="create-popup-link" href="<?php echo SG_APP_POPUP_ADMIN_URL?>admin.php?page=edit-popup&type=html">
		<div class="popups-div html-popup">
		</div>
	</a>
	<?php if(SG_POPUP_PRO): ?>
		<a class="create-popup-link" href="<?php echo SG_APP_POPUP_ADMIN_URL?>admin.php?page=edit-popup&type=iframe">
			<div class="popups-div iframe-popup">
			</div>
		</a>
		<a class="create-popup-link" href="<?php echo SG_APP_POPUP_ADMIN_URL?>admin.php?page=edit-popup&type=shortcode">
			<div class="popups-div shortcode-popup">
			</div>
		</a>
		<a class="create-popup-link" href="<?php echo SG_APP_POPUP_ADMIN_URL?>admin.php?page=edit-popup&type=video">
			<div class="popups-div video-popup">
			</div>
		</a>
	<?php endif; ?>
	<?php if (SG_POPUP_PRO == 0): ?>
			<a class="create-popup-link" href="<?php echo SG_POPUP_PRO_URL;?>" target="_blank">
			<div class="popups-div iframe-popup-pro">
			</div>
		</a>
		<a class="create-popup-link" href="<?php echo SG_POPUP_PRO_URL;?>" target="_blank">
			<div class="popups-div shortcode-popup-pro">
			</div>
		</a>
		<a class="create-popup-link" href="<?php echo SG_POPUP_PRO_URL;?>" target="_blank">
			<div class="popups-div video-popup-pro">
			</div>
		</a>
		<a class="create-popup-link" href="<?php echo SG_POPUP_PRO_URL;?>" target="_blank">
			<div class="popups-div age-restriction-pro">
			</div>
		</a>
		<a class="create-popup-link" href="<?php echo SG_POPUP_PRO_URL;?>" target="_blank">
			<div class="popups-div social-pro">
			</div>
		</a>
	<?php endif; ?>
</div>
